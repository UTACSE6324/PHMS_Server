<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  $arr = array();
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  
  if(!empty($res)){
    header("Status-Code:1");
    header("summary:Success");
    
    $ins = $pdo -> query("select * from note where uid = '$uid';") -> fetchAll();
    
    if(!empty($ins)){
      $num = count($ins);
   
      for ($i = 0; $i < $num; ++$i) {
          $col = $ins[$i];
          
          array_push($arr,
            array(
              "noteid" => $col['noteId'],
              "name" => $col['name'],
              "date" => $col['date'],
              "summary" => $col['summary']
            )
          );
       }
    }
  }else{
   
    header("Status-Code:-1");
    header("summary:Token out of date");
  }
  
  echo json_encode($arr);
?>
