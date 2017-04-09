<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $noteid = $_GET['noteid'];
  $date = $_GET['date'];
  $name = $_GET['name'];
  $summary = $_GET['summary'];
    
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){
 
    $ins = $pdo -> exec("update note set date = '$date', name = '$name', summary = '$summary' where noteId = '$noteid';");
    
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
