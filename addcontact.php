<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $name = $_GET['name'];
  $phone = $_GET['phone'];
  $email = $_GET['email'];
  
  $arr = "";
  
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  
  if(!empty($res)){
    $ins = $pdo -> exec("insert into contact (uid, email, name, phone) values ('$uid','$name','$phone','$email');");
    
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      $arr = "Success";
    }else{
      header("Status-Code:-1");
      header("summary:Insert invalid");
      $arr = "Fail";
    }
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
    $arr = "Fail";
  }
  
  echo json_encode($arr);
?>
