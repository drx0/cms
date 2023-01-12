<?php

// permissions
if($c > 0){
    if($page['login'] === true && !$user){
        header('location: /'.$backend_slug.'/login');
        die;
    }
    if($page['login'] === false && $user){
        header('location: /'.$backend_slug.'/dashboard');
        die;
    }
}


// menu parents
$menu_parents = FDB_Get('backend/menu_parents', true);


// menu generate
function page_rev($path){
    $files = glob($path.'/*');
    foreach($files as $file){
        $bs = basename($file);
        if(is_dir($file)){
            page_rev($path.'/'.$bs);
        }elseif(is_file($file)){
            $page = json_decode(json_compress(file_get_contents($file)), true);
            if(!$page['show']){
                continue;
            }
            $page['slug'] = preg_replace('/\.json$/ui', '', $bs);
            if($page['slug'] == $GLOBALS['slug'][0] || $page['slug'] == '%slug%'){
                $active = ' class="active"';
            }else{
                $active = '';
            }
            if($GLOBALS['user']){
                if(!$page['login']){
                    continue;
                }
                if(!isset($page['permission']) || !isset($page['permission'][$GLOBALS['user']['group_account']]) || !$page['permission'][$GLOBALS['user']['group_account']]){
                    continue;
                }
            }else{
                if($page['login']){
                    continue;
                }
            }
            if($page['parent']){
                if(!isset($GLOBALS['menu'][$page['parent']])) $GLOBALS['menu'][$page['parent']] = ['type'=>'ul','active'=>''];
                $GLOBALS['menu'][$page['parent']]['items'][] = [
                    'slug'=>$page['slug'],
                    'title'=>$page['title'],
                    'active'=>$active
                ];
                if($active != ''){
                    $GLOBALS['menu'][$page['parent']]['active'] = $active;
                }
            }else{
                $GLOBALS['menu'][] = [
                    'type'=>'li',
                    'slug'=>$page['slug'],
                    'title'=>$page['title'],
                    'active'=>$active
                ];
            }
        }
    }
}
$menu = [];
page_rev($path['pages']);
