<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $date = $_GET['date'];
  $type = $_GET['type'];
  $name = $_GET['name'];
  $quantity = $_GET['quantity'];
  $unit = $_GET['unit'];
  $calorie = $_GET['calorie'];

  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){
    $ins = $pdo -> exec("insert into diethistory (uid, date, type, name, quantity, unit, calorie) 
                          values ('$uid','$date','$type','$name','$quantity','$unit','$calorie');");
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      $arr = $pdo->lastInsertId();
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
