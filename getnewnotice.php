<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  
  if(!empty($res)){
    $ins = $pdo -> exec("select count(*) from notice where uid = '$uid' and isnew = 1;") -> fetch();
    $arr = $ins;
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
    $arr = "0";
  }
  
  echo $arr;
?>
