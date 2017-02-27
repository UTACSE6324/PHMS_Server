<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  $date = $_GET['date'];
  
  echo "aasd";

  $arr = array();
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){
    header("Status-Code:1");
    header("summary:Success");
    
    $ins = $pdo -> query("select * from diethistory where uid = '$uid' and date = '$date';") -> fetchAll();
    
    if(!empty($ins)){
      $num = count($ins);
   
      for ($i = 0; $i < $num; ++$i) {
          $col = $ins[$i];
          
          array_push($arr,
            array(
              "dietid" => $col['dietid']
              "type" => $col['type'],
              "name" => $col['name'],
              "quantity" => $col['quantity'],
              "unit" => $col['unit'],
              "calorie" => $col['calorie'],
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
