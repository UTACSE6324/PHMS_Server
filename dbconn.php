<!DOCTYPE html>
<html>
<head>
<title>PHMS Server DataBase Conn Test</title>
</head>
<body>

<?php
  header('content-type:text/html;charset=utf-8');
  
   print_r("table user info:");
  
  try{
    $db = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358');
    $rs = $pdo -> query("select * from user"); 
      while($row = $rs -> fetch())
        print_r($row); 
    
  }catch(PDOException $e){
    print "ERROR!:".$e->getMessage()."</br>";
    die();
  }
 
?>
</body>
</html>
