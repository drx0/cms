<?php

function FDB_Get($path, $decode = false){
    $link = ROOT.'/DataBase/'.$path.'.data';
    if(!is_file($link)){
        if($decode){
            $content = '{}';
        }else{
            $content = '';
        }
        FDB_Update($path, $content, $decode);
        return FDB_Get($link, $decode);
    }
    $result = file_get_contents($link);
    if($decode){
        return json_decode(json_compress($result), true);
    }else{
        return $result;
    }
}

function FDB_Update($path, $content, $encode = false){
    if(file_put_contents(ROOT.'/DataBase/'.$path.'.data', ($encode ? json_encode($content) : $content), LOCK_EX) === false){
        return false;
    }else{
        return true;
    }
}