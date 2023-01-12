<?php

// Africa/Dakar
// Europe/Moscow
ini_set('date.timezone', 'Europe/Moscow');
date_default_timezone_set('Europe/Moscow');

set_time_limit(30);
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'RU_ru.utf8');

// mb_internal_encoding('utf-8');
// mb_regex_encoding('utf-8');
// mb_http_output('utf-8');
// mb_language('ru');

$db_settings = [
	'server'=>'127.0.0.1',
	'user'=>'root',
	'password'=>'OOOdavid777',
	'db'=>'cms',
	'charset'=>'utf8mb4'
];

define('ROOT', rtrim($_SERVER['DOCUMENT_ROOT'], '/'));

$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$backend_slug = 'admino4ka';

$image_none = ROOT.'/contents/backend/assets/images/image_none.jpg';