<?php
  header('content-type:text/html;charset=utf-8');

  $name = $_GET['username'];
  $password = $_GET['password'];
  $token = $name.time();

  if($name == ''){
    
    header("Status-Code:-1");
    header("summary:Username cannot be empty");
    
  }else if(strlen($password) < 8){
    
    header("Status-Code:-1");
    header("summary:Password is too short");
    
  }else{
    
    $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
    
    $ins = $pdo -> query("insert into user (name,password,token) values ('".$name."','".$password."','".$token."');");
    
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
