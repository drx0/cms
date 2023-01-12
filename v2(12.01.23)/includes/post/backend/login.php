<?php

// data
$login = isset($_POST['login']) ? $_POST['login'] : die('data');
$password = isset($_POST['password']) ? $_POST['password'] : die('data');

// DB
require ROOT.'/includes/db.php';
$db_link = DB_Link($db_settings);

// login
$result = DB_Select($db_link, 'SELECT * FROM `cms_backed_users` WHERE login = :login', ['login'=>$login]);

if(!isset($result[0])){
	die('access');
}
$password_cache = md5('cms_by_drx0'.md5($password.':'.$result[0]['email'].':'.$result[0]['login']));
if($result[0]['password'] != $password_cache){
	die('access');
}
$session_id = md5($login.':'.$password_cache.':cms_drx0:'.$ip);

if($result[0]['last_ip'] == $ip && $result[0]['session_id'] == $session_id){
    $result = true;
}else{
	$result = DB_Update($db_link, 'cms_backed_users', [
		'last_ip'=>$ip,
		'session_id'=>$session_id
	], [
		'login'=>$login
	]);
}

$result2 = setcookie('backend_auth', base64_encode($login.'|'.$user_agent.'|'.$session_id), time()+2592000, '/', $_SERVER['HTTP_HOST']);

if($result && $result2){
	die('success');
}
else{
	die('error-update');
}



// $result = Db::table('web51_breakout_users')->where('login', 'davidzhuchkov')->update(['password'=>'b2caef3a59ba5b83955ea2f54ff7fa02']);
// echo md5('SultBreakout51'.md5('OOOzorol2003'.'web51'));

