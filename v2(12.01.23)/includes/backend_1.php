<?php

// is user auth
$user = false;
if(array_key_exists('backend_auth', $_COOKIE)) {
    $cookie = explode('|', base64_decode($_COOKIE['backend_auth']));
    if(count($cookie) == 3){
        // сменился useragent
        if($cookie[1] == $_SERVER['HTTP_USER_AGENT']){
            $result = DB_Select($db_link, 'SELECT * FROM `cms_backed_users` WHERE login = :login', ['login'=>$cookie[0]]);
            // не найден пользователь по login
            if(array_key_exists(0, $result)) {
                // с другого ip
                if($ip == $result[0]['last_ip']) {
                    $session_id = md5($result[0]['login'].':'.$result[0]['password'].':cms_drx0:'.$ip);
                    // не совпадает session_id
                    if($session_id == $cookie[2]){
                        $user = $result[0];
                        unset($result);
                    }
                }
            }
        }
    }
}

// redirect
if($c == 0){
    if($user){
        header('location: /'.$backend_slug.'/dashboard');
        die;
    }else{
        header('location: /'.$backend_slug.'/login');
        die;
    }
}


// INSERT USER
// $data = [
//     'group_account'=>'admin',
//     'email'=>'zalogin_d@bk.ru',
//     'fio'=>'Цыпленок',
//     'power'=>true,
//     'login'=>'david_mefedron'
// ];
// $password_cache = md5("cms_by_drx0".md5('OOOdavid777'.':'.$data['email'].':'.$data['login']));
// $data['password'] = $password_cache;
// $result = DB_Insert($db_link, 'cms_backed_users', $data);
// echo $result;
// die;