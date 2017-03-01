<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];

  $name = $_GET['name'];
  $reminder = $_GET['reminder'];
  $times = $_GET['times'];
  $days = $_GET['date'];
  $quantity = $_GET['quantity'];
  $unit = $_GET['unit'];
  $instructions = $_GET['instructions'];
  $notification = $_GET['notification'];
  $contacts = $_GET['contacts'];
    
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();

  if(!empty($res)){
 
    $ins = $pdo -> exec("insert into medicine (uid, name, reminder, times, date, 
                          quantity, unit, instructions, notification, contacts) 
                          values ('$uid','$name','$reminder','$times','$date',
                          '$quantity','$unit','$instructions','$notification','$contacts');");

    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      echo $pdo->lastInsertId();
    }else{
      header("Status-Code:-1");
      header("summary:Insert invalid");
      echo json_encode($pdo->errorInfo());
    }
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
    echo "Token out of date";
  }
  
?>
