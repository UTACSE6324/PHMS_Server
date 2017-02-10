<?php
  header('content-type:text/html;charset=utf-8');
  
  $email = $_GET['email'];
  $password = $_GET['password'];
  $token = time();

  $arr = "";

  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where email = '$email';") -> fetch();

  if(strlen($res) > 0){
    header("Status-Code:1");
    header("summary:Success");
    
    $ins = $pdo -> exec("update user set token = '$token' where email = '$email'");
    
    $arr = array(
      'uid' => $res['uid'],
      'email' => $res['email'],
      'name' => $res['name'],
      'password' => $res['password'],
      'token' => $res['token'],
      'gender' => $res['gender'],
      'age' => $res['age'],
      'weight' => $res['weight'],
      'height' => $res['height'],
      'bp' => $res['bp'],
      'bsl' => $res['bsl'],
      'chol' => $res['chol']
    );
    
  }else{
    header("Status-Code:-1");
    header("summary:Login fail");
  }
  
  echo json_encode($arr);
?>
