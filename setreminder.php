<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $mid = $_GET['mid'];
  $times = $_GET['times'];
  $days = $_GET['days'];
  $start_date = $_GET['start_date'];
  $end_date = $_GET['end_date'];
    
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){
 
    $ins = $pdo -> exec("update medicine set times = '$times', days = '$days', start_date = '$start_date', end_date = '$end_date' 
                          where mid = '$mid';");
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      echo "Success";
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
