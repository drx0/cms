<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
  die;
}

require $_SERVER['DOCUMENT_ROOT'].'/includes/config.php';

if(count($_POST) == 0){
  // data parse
  $content = file_get_contents('php://input');
  preg_match('/\-{6}WebKitFormBoundary[\w|\W]+?\n/', $content, $matches);
  if(!isset($matches[0])){
    preg_match('/\-{20,40}[0-9]{25,35}/', $content, $matches);
  }
  if(!isset($matches[0])){
    die;
  }
  $arr = explode(trim($matches[0]), $content);
  unset($content);
  $_POST = [];
  foreach($arr as $a){
    preg_match('/name\=\"([\w|\W]+?)\"/', $a, $matches);
    if(!isset($matches[1])){
      continue;
    }
    $key = trim($matches[1]);
    preg_match('/filename\=\"([\w|\W]+?)\"/', $a, $matches);
    if(isset($matches[1])){
      $filename = trim($matches[1]);
      $c = explode("\r\n\r\n", $a);
      unset($c[0]);
      $_POST[$key][$filename] = trim(implode("", $c));
    }else{
      $b = explode("\r\n", $a);
      $wi = 3;
      $d = '';
      while(true){
        if(!isset($b[$wi]) || ($wi == 3 && $b[$wi] == '')){
          break;
        }
        if($d != ''){
          $d .= "\r\n";
        }
        $d .= $b[$wi];
        $wi++;
      }
      $_POST[$key] = trim($d);
    }
  }
  unset($a, $b, $c, $d, $matches, $arr);
}