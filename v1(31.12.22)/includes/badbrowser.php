<?php

// badbrowser
$useragent = $_SERVER['HTTP_USER_AGENT'];
$Trident = false;
if(str_replace('Trident/', '', $useragent) != $useragent){
	$Trident = true;
}
if($c == 2 && $slug[0] == 'redirekt'){

}else{
    if($Trident){
        if($c == 0 || $c != 1 || $slug[0] != 'badbrowser'){
            header('location: /badbrowser');
            die;
        }
    }else{
        if($c == 1 && $slug[0] == 'badbrowser'){
            header('location: /');
            die;
        }
    }
}