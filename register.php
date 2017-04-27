<?php
  header('content-type:text/html;charset=utf-8');

  $email = $_GET['email'];
  $name = $_GET['name'];
  $password = $_GET['password'];
  $sq = $_GET['sq'];
  $sqanswer = $_GET['sqanswer'];

  $token = time();

  if($email == ''||$name == ''||$password == ''||$sq == ''||$sqanswer == ''){
    
    header("Status-Code:-1");
    header("summary:Cannot be empty");
    
  }else if(strlen($password) < 8){
    
    header("Status-Code:-1");
    header("summary:Password is too short");
    
  }else{
  
    $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
    $ins = $pdo -> exec("insert into user (email,name,password,sq,sqanswer,token) values ('$email','$name','$password','$sq','$sqanswer','$token');");
  
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      
      $res = $pdo -> query("select * from user where email = '$email';") -> fetch();
     
      $arr = array(
        'uid' => $res['uid'],
        'email' => $res['email'],
        'name' => $res['name'],
        'password' => $res['password'],
        'sq' => $res['sq'],
        'sqanswer' => $res['sqanswer'],
        'token' => $res['token'],
        'notify' => '1'
      );
      echo json_encode($arr);
    }else{
      header("Status-Code:-1");
      header("summary:Email exists");
    }
    
  }

?>
