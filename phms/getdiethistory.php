<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  $startdate = $_GET['startdate'];
  $enddate = $_GET['enddate'];

  $arr = array();
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){
    header("Status-Code:1");
    header("summary:Success");
    
    $ins = $pdo -> query("select * from diethistory where uid = '$uid' and date >= '$startdate' and date <= '$enddate';") -> fetchAll();
    
    if(!empty($ins)){
      $num = count($ins);
   
      for ($i = 0; $i < $num; ++$i) {
          $col = $ins[$i];
          
          array_push($arr,
            array(
              "dietid" => $col['dietid'],
              "date" => $col['date'],
              "type" => $col['type'],
              "name" => $col['name'],
              "quantity" => $col['quantity'],
              "unit" => $col['unit'],
              "calorie" => $col['calorie'],
              "protein" => $col['protein'],
              "fat" => $col['fat'],
              "carbohydrate" => $col['carbohydrate']
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
