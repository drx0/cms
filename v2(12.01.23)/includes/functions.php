<?php

function view(){
    return $GLOBALS['path']['view'];
}
function partial($name){
    return $GLOBALS['path']['partials'].'/'.$name.'.php';
}
function asset($name){
    return $GLOBALS['path']['assets_url'].'/'.$name;
}
function v($name){
    $name = trim($name);
    if($name == ''){
        return '';
    }
    $ex = explode('/', $name);
    if(!isset($GLOBALS[$ex[0]])){
        return '';
    }
    $temp =& $GLOBALS[$ex[0]];
    for($i=1;$i<count($ex);$i++){
        if(!isset($temp[$ex[$i]])){
            return '';
        }
        $temp =& $temp[$ex[$i]];
    }
    return $temp;
}

function json_compress($json){
    $json = preg_replace(['/(\n\s*|\r|\t)/', '/\s*\:\s*/', '/\s*\"\s*/', '/\s*\}\s*/', '/\s*\{\s*/'], ['', ':', '"', '}', '{'], $json);
    preg_match_all('/\'[\w|\W]+?\'/ui', $json, $matches);
    foreach($matches[0] as $k=>$v){
        $v = trim($v, "' ");
        $json = str_replace("'".trim($v, "' ")."'", "'".urlencode($v)."'", $json);
    }
    unset($matches);
    return str_replace("'", '"', $json);
}