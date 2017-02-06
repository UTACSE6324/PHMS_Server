<?php
  header('content-type:text/html;charset=utf-8');

  $name = $_GET['username'];
  $password = $_GET['password'];

  echo($name." ".$password);

  if($name == ''){
    echo("if1");
    
    header("Status-Code:-1");
    header("summary:Username cannot be empty");
  }else if(strlen($password) < 8){
    echo("if2");
    
    header("Status-Code:-1");
    header("summary:Password is too short");
  }else{
    echo("if3");
    
    $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358');   
    
    $rs = $pdo -> query("select * from user where name = ".$name.";"); 
    
    if(sizeof($rs) > 0){
        header("Status-Code:-1");
        header("summary:Username exists");
    }else{
        header("Status-Code:1");
        header("summary:Success");
      
        $pdo -> exec("insert into user (name,password) values (".$name.",".$password.");");
        $rs = $pdo -> query("select * from user where name = ".$name.";"); 
      
        $strr = json_encode($rs);  
        echo($strr);
    }
  }

  echo("result");

?>
