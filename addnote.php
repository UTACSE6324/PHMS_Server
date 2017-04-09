<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $date = $_GET['date'];
  $name = $_GET['name'];
  $summary = $_GET['summary'];
  
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  
  if(!empty($res)){
    $ins = $pdo -> exec("insert into note (uid, name, date, summary) values ('$uid','$name','$date','$summary');");
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      $arr = "Success";
    }else{
      header("Status-Code:-1");
      header("summary:Insert invalid");
      $arr = $pdo->errorInfo();
    }
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
    $arr = "Token out of date";
  }
  
  echo json_encode($arr);
?>
