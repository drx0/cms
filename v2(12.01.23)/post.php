<?php

require $_SERVER['DOCUMENT_ROOT'].'/includes/post.php';

$method = isset($_POST['method']) ? $_POST['method'] : die('data');
if(!preg_match('/[a-z-][a-z-\/]{1,62}[a-z-]/', $method)) die('data');

$file = ROOT.'/includes/post/'.$method.'.php';

if(!is_file($file)){
	die('data');
}

require $file;