<?php
  header('content-type:text/html;charset=utf-8');

  try{
    $db = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358');
  }catch(PDOException $e){
    print "ERROR!:".$e->getMessage()."</br>";
    die();
  }
  
  print("database connected!");
?>
