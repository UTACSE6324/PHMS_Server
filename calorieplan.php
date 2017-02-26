<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $calorie = $_GET['calorie'];
  
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  
  if(!empty($res)){
    $ins = $pdo -> exec("update user set calorie = '$calorie' where uid = '$uid'");
    
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      
      echo 'Success';
    }else{
      header("Status-Code:-1");
      header("summary:Insert invalid");
      
      echo 'Fail';
    }
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
    
    echo 'Fail';
  }
  
?>
