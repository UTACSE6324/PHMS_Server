<?php
  header('content-type:text/html;charset=utf-8');

  $name = $_GET['username'];
  $password = $_GET['password'];

  if($name == ''){
    header("Status-Code:-1");
    header("summary:Username cannot be empty");
  }else if(strlen($password) < 8){
    header("Status-Code:-1");
    header("summary:Password is too short");
  }else{
    $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $ins = $pdo -> exec("insert into user (name,password) values ('".$name."','".$password."');");
    
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      
      $res = $pdo -> query("select * from user");

      print($res);
    }else{
      header("Status-Code:-1");
      header("summary:Username exists");
    }
  }

?>
