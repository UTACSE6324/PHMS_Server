<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $age = $_GET['age'];
  $gender = $_GET['gender'];
  $weight = $_GET['weight'];
  $height = $_GET['height'];
  $bp = $_GET['bp'];
  $bsl = $_GET['bsl'];
  $chol = $_GET['chol'];
  
  $arr = "";
  
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  
  if(!empty($res)){
    $ins = $pdo -> exec("update user set age = $age,gender = $gender,weight = $weight,height=$height,
      bp = $bp,bsl = $bsl,chol = $chol where uid = '$uid'");
    
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      
      $arr = array(
        'uid' => $uid,
        'age' => $age,
        'gender' => $gender,
        'weight' => $weight,
        'height' => $height,
        'bp' => $bp,
        'bsl' => $bsl,
        'chol' => $chol
      );
      
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
