<?php

$act = isset($_POST['act']) ? $_POST['act'] : die('{"result":"data"}');
$email = isset($_POST['email']) ? $_POST['email'] : die('{"result":"data"}');




require ROOT.'/includes/mail.php';

$email = 'juchkov.david@yandex.ru';

$dt = date("Y-m-d H:i:s", time());
$data_email = ['email'=>$email, 'login'=>'drx0', 'datetime'=>$dt];
$subject = 'Восстановление '.$str.' на сайте '.$_SERVER['HTTP_HOST'];

$result = Mail_Send('backend/user-send-reset-login', $data_email, $email, $subject);

if($result){
    die('{"result":"error-send"}');
}else{
    die('{"result":"success"}');
}

die;
























if(array_search($act, ['login', 'password']) === false){
	die('{"result":"data"}');
}

if(!preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,15}$/', $email)){
	die('{"result":"format-email"}');
}

$result = DB_Select($db_link, 'SELECT * FROM `cms_backed_users` WHERE email = :email', ['email'=>$email]);
if(!isset($result[0])){
	die('{"result":"not-email"}');
}

$t = (integer)$result[0]['reset_time_mail']+3600;
if($t > time()){
    $t = $t - time();
    $i = floor($t / 60);
    $s = $t - ($i*60);
    die('{"result":"error-time", "time":"'.$i.' минут '.$s.' секунд"}');
}

$dt = date("Y-m-d H:i:s", time());

if($act == 'login'){

    $str = 'логина';

    $tmpl = 'web51.user-send-reset-login';
    $data_email = ['email'=>$email,'login'=>$result[0]['login'],'datetime'=>$dt];
    $data_db = ['reset_time_mail'=>time()-3000];

}elseif($act == 'password'){

    $str = 'пароля';

    $tmpl = 'web51.user-send-reset-password';
    $reset_code = rand(1000,9999)."-".time()."-".rand(100,999);
    $link = $domain."/a/recovery-save?login=".urlencode($result[0]['login'])."&code=".urlencode($reset_code);

    $data_email = ['email'=>$email,'datetime'=>$dt,'link'=>$link];

    $data_db = ['reset_time_mail'=>time(), 'reset_code'=>$reset_code];

}

$data_db['reset_type'] = $act;

$result = Db::table('web51_breakout_users')->where('email', $email)->update($data_db);
if(!$result){
    die('{"result":"error-save"}');
}

require ROOT.'/includes/mail.php';

Mail::send($tmpl, $data_email, function($message) use ($email){
    $message->subject('Восстановление '.$str.' на сайте '.$_SERVER["HTTP_HOST"]);
    $result = $message->to($email);
    if(!$result){
        die('{"result":"error-send"}');
    }
});

die('{"result":"success"}');