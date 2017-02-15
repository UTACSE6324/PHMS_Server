<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $arr = array();
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();

  if(!empty($res)){
    $ins = $pdo -> exec("select * from contact where uid = '$uid';");
     echo json_encode($ins);
    if(!empty($ins)){
      header("Status-Code:1");
      header("summary:Success");
      
      $num = count($ins);
      for ($i = 0; $i < $num; ++$i) {
          $col = $ins[$i];
          push_array($arr,
            array(
              "name" => $col['name'],
              "phone" => $col['phone'],
              "email" => $col['email']
            )
          );
      }
      
    }else{
      header("Status-Code:-1");
      header("summary:Insert invalid");
    }
    
  }else{
   
    header("Status-Code:-1");
    header("summary:Token out of date");
  }
  
  echo json_encode($arr);
?>
