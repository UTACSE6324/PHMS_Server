<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];

  $api_id = $_GET['api_id'];
  $name = $_GET['name'];
  $quantity = $_GET['quantity'];
  $unit = $_GET['unit'];
  $instructions = $_GET['instructions'];
  
    
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();

  if(!empty($res)){
 
    $ins = $pdo -> exec("insert into medicine (uid, name, quantity, unit, instructions, apiID) 
                          values ('$uid','$name','$quantity','$unit','$instructions','$api_id');");

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
