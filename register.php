<?php
  header('content-type:text/html;charset=utf-8');

  $name = $_GET['name'];
  $password = $_GET['password'];
  $token = $name.time();
  $arr = "";

  if($name == ''){
    
    header("Status-Code:-1");
    header("summary:Username cannot be empty");
    
  }else if(strlen($password) < 8){
    
    header("Status-Code:-1");
    header("summary:Password is too short");
    
  }else{
    
    $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
    $ins = $pdo -> exec("insert into user (name,password,token) values ('".$name."','".$password."','".$token."');");
    
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      
      $res = $pdo -> query("select * from user where name = '".$name."';") -> fetch();
     
      $arr = array(
        'uid' => $res['uid'],
        'name' => $res['name'],
        'password' => $res['password'],
        'token' => $res['token']
      );
  
    }else{
      header("Status-Code:-1");
      header("summary:Username exists");
    }
    
  }

  echo json_encode($arr);
?>
