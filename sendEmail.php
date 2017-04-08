<?php
  header('content-type:text/html;charset=utf-8');

  $to = "zhangjw.uta@gmail.com";
  $subject = "Test mail";
  $message = "Hello! This is a simple email message.";
  $from = "phms@example.com";
  $headers = "From: $from";
  mail($to,$subject,$message,$headers);
  echo "Mail Sent.";
?>
