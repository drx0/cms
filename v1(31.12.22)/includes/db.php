<?php

function MySQLi_Link($settings){
	if(!isset($settings['server']) || !isset($settings['user']) || !isset($settings['password']) || !isset($settings['db']) || !isset($settings['charset'])){
		return false;
	}
	$link = mysqli_connect($settings['server'], $settings['user'], $settings['password'], $settings['db']);
	if(!$link){
		return false;
	}
	mysqli_set_charset($link, $settings['charset']);

	return $link;
}

function MySQLi_Select($link, $query, $data){
	// data
	foreach($data as $key=>$value){
		if(gettype($value) == 'string'){
			$s = "'";
		}else{
			$s = '';
		}
		$query = str_replace(':'.$key, $s.mysqli_real_escape_string($link, $value).$s, $query);
	}
	// exec
	$result = mysqli_query($link, $query);
	$new = [];
	while($row = mysqli_fetch_assoc($result)){
	    $new[] = $row;
	}
	unset($result, $row);
	return $new;
}

function MySQLi_Insert($link, $table_name, $paste){
	$keys = '(';
	$values = '(';
	foreach($paste as $key=>$value){
		$keys .= '`'.$key.'`, ';
		$t = gettype($value);
		if($t == 'string'){
			$values .= "'";
		}
		$values .= $value;
		if($t == 'string'){
			$values .= "'";
		}
		$values .= ', ';
	}
	$result = mysqli_query($link, ('INSERT INTO `'.$table_name.'` ' . rtrim($keys, ', ').')' . ' VALUES ' . rtrim($values, ', ').')') );
	if($result){
		return mysqli_insert_id($link);
	}else{
		return false;
	}
}

function MySQLi_Update($link, $table_name, $updates, $wheres){
	// updates
	$values = '';
	foreach($updates as $key=>$value){
		if(gettype($value) == 'string'){
			$s = "'";
		}else{
			$s = '';
		}
		$values .= "`".$key."` = ".$s.mysqli_real_escape_string($link, $value).$s.", ";
	}
	// where
	$where = '';
	foreach($wheres as $key=>$value){
		if(gettype($value) == 'string'){
			$s = "'";
		}else{
			$s = '';
		}
		$where .= "`".$key."` = ".$s.mysqli_real_escape_string($link, $value).$s.", ";
	}
	$query = 'UPDATE `' . $table_name . '` SET ' . rtrim($values, ', ') . ' WHERE ' . rtrim($where, ', ');
	return mysqli_query($link, $query);
}

// $result = MySQLi_Insert('frontendusers', [
// 	'name'=>'Давид Сергеевич',
// 	'power'=>true,
// 	'family'=>'Жучков',
// 	'registernumber'=>'733664299',
// 	'email'=>'juchkov.david@yandex.ru',
// 	'telegram'=>'juchkovdavid',
// 	'whatsapp'=>'89236235505',
// 	'viber'=>'89236235505',
// 	'password'=>'b8e80aebd4d77ca8f3b5b96754357c3b',
// 	'last_ip'=>'127.0.0.1',
// 	'bals'=>'0'
// ]);
// print_r($result);