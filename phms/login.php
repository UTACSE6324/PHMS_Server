<?php
  header('content-type:text/html;charset=utf-8');
  
  $email = $_GET['email'];
  $password = $_GET['password'];
  $token = time();

  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where email = '$email' and password = '$password';") -> fetch();

  if(!empty($res)){
    header("Status-Code:1");
    header("summary:Success");
    
    $arr = array(
      'uid' => $res['uid'],
      'email' => $res['email'],
      'name' => $res['name'],
      'password' => $res['password'],
      'token' => $token,
      'gender' => $res['gender'],
      'age' => $res['age'],
      'weight' => $res['weight'],
      'height' => $res['height'],
      'bp' => $res['bp'],
      'bsl' => $res['bsl'],
      'chol' => $res['chol'],
      'calorie' => $res['calorie'],
      'notify' => $res['notify']
    );
    
    $ins = $pdo -> exec("update user set token = '$token' where email = '$email'");
    echo json_encode($arr);
  }else{
    header("Status-Code:-1");
    header("summary:Login fail");
  }
  
?>
