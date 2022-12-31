<?php

$ip = $_SERVER['REMOTE_ADDR'];

$dir = ROOT.'/DataBase/firewall/ddos';

$file = $dir.'/'.$ip;
$t = time();
$error_text = 'Вы запрашиваете страницу слишком часто. Перезагрузите страницу!';

if(is_file($file)){
	$ex = explode('|', file_get_contents($file));
	if($ex[0] > 30){
		file_put_contents($dir.'/ban/'.$ip, '', LOCK_EX);
		unlink($file);
		die('Ваш IP адрес находится в бане');
	}
	if($t > $ex[1]+1){
		file_put_contents($file, '0|'.$t, LOCK_EX);
	}
	elseif($ex[0] >= 3){
		file_put_contents($file, ($ex[0]+1).'|'.$t, LOCK_EX);
		echo $error_text;
		die;
	}
	else{
		file_put_contents($file, ($ex[0]+1).'|'.$t, LOCK_EX);
	}
}
else{
	file_put_contents($file, '0|'.$t, LOCK_EX);
}