<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  $email = $_GET['email'];
  $startdate = $_GET['startdate'];
  $enddate = $_GET['enddate'];
  
  $to = $email;
  $from = "usersupport@phms.jarviszhang.com";
  $headers = "From: $from\r\n";
  $headers .= "CC: $from\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $subject = "Medicine Conflicts Notice";
  
  $message = "Click to see the diet analysis from user : \n";
  $message .= "http://phms.jarviszhang.com/generatedietanalysis.php?uid='$uid'&startdate='$startdate'&enddate='$enddate'";

  mail($to,$subject,$message,$headers); 
?>
