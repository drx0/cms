<?php
// die;
require __DIR__.'/includes/config.php';
require ROOT.'/includes/firewall.php';

$slug = array_values(array_diff(explode('/', trim(explode('?', $_SERVER['REQUEST_URI'])[0], '/')), ['']));
$domain = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];

require ROOT.'/includes/badbrowser.php';
require ROOT.'/includes/functions.php';
require ROOT.'/includes/db.php';
require ROOT.'/includes/db-files.php';

$c = count($slug);
$impl = implode('/', $slug);

$dir_name = 'theme';

if($c > 0 && $slug[0] == $backend_slug){
    $dir_name = 'backend';
    $c--;
    unset($slug[0]);
    $slug = array_values($slug);
    $impl = implode('/', $slug);
}

$path = [
    'layouts'=>ROOT.'/contents/'.$dir_name.'/layouts',
    'pages'=>ROOT.'/contents/'.$dir_name.'/pages',
    'partials'=>ROOT.'/contents/'.$dir_name.'/partials',
    'views'=>ROOT.'/contents/'.$dir_name.'/views',
    'assets'=>ROOT.'/contents/'.$dir_name.'/assets',
    'assets_url'=>$domain.'/contents/'.$dir_name.'/assets'
];

$db_link = DB_Link($db_settings);

if($dir_name == 'backend'){
    require ROOT.'/includes/backend_1.php';
}

// pages
if($c == 0){
    $path['slug'] = 'index';
}else{
    if($c == 1 && $slug[0] == 'index'){
        header('location: /');
        die;
    }
    $impl_search = $impl;
    for($i=$c;$i>=0;$i--){
        if($i < $c){
            $ex = explode('/', $impl_search);
            $ex[$i] = '%slug%';
            $impl_search = implode('/', $ex);
        }
        if(is_file($path['pages'].'/'.$impl_search.'.json')){
            break;
        }
    }
    $path['slug'] = $impl_search;
    unset($impl_search);
}

$path['page'] = $path['pages'].'/'.$path['slug'].'.json';

if(!is_file($path['page'])){
    if($c == 1 && $slug[0] == '404'){
        echo 'Тема: Ошибка, страница (page) не найдена.';
        die;
    }else{
        if($dir_name == 'backend'){
            header('location: /'.$backend_slug.'/404');
        }else{
            header('location: /404');
        }
        die;
    }
}

// page
$page = json_decode(json_compress(file_get_contents($path['page'])), true);

if(!is_array($page) || (isset($page['power']) && !$page['power'])){
    echo 'Тема: Ошибка, страница не в формате json.';
    die;
}

// settings
$settings = FDB_Get('settings', true);
if(!is_array($settings)){
    echo 'БД: Ошибка, файл (settings) поврежден.';
    die;
}

// layout
if(!isset($page['layout'])){
    echo 'Тема: Ошибка, шаблон (layout) не указан.';
    die;
}
$path['layout'] = $path['layouts'].'/'.$page['layout'].'.php';
// echo $path['layout'];
if(!is_file($path['layout'])){
    echo 'Тема: Ошибка, шаблон (layout) не найден.';
    die;
}

// view
$path['view'] = $path['views'].'/'.$path['slug'].'.php';
if(!is_file($path['view'])){
    echo 'Тема: Ошибка, вид (view) не найден.';
    die;
}

if($dir_name == 'backend'){
    require ROOT.'/includes/backend_2.php';
}



ob_start(function($code){
    // $code = str_replace("\t", ' ', $code);
    // $code = str_replace("\n", '', $code);
    // $code = str_replace("\r",' ', $code);
    // while(stristr($code, '  ')){
    //     $code = str_replace('  ', ' ',$code);
    // }
    // foreach(['a', 'abbr', 'address', 'area', 'article', 'aside', 'audio', 'b', 'base', 'bdi', 'bdo', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'cite', 'code', 'col', 'colgroup', 'datalist', 'dd', 'del', 'details', 'dfn', 'div', 'dl', 'dt', 'em', 'embed', 'fieldset', 'figcaption', 'figure', '', '', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hr', 'html', 'i', 'iframe', 'img', 'input', 'ins', 'kbd', 'keygen', 'label', 'legend', 'li', 'link', 'main', 'map', 'mark', 'meta', 'meter', 'nav', 'noscript', 'object', 'ol', 'optgroup', 'option', 'output', 'p', 'param', 'pre', 'progress', 'q', 'ruby', 'rb', 'rt', 'rtc', 'rp', 's', 'samp', 'script', 'section', 'select', 'small', 'source', 'span', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr', 'track', 'u', 'ul', 'var', 'video', 'wbr'] as $tag){
    //     $code = preg_replace("#> <$tag#", "><$tag", $code);
    // }
    return $code;
});
require $path['layout'];
ob_end_flush();