<?php
  header('content-type:text/html;charset=utf-8');
  
  $query = $_GET['query'];
  
  //post方式
  $curlPost = "appId=b871bf7e&appKey=8aa879546b2064de87ebc15334754bab&fields=['item_name','Cnf_calories']&query='$query'"; 
  $ch=curl_init(); 
  curl_setopt($ch,CURLOPT_URL,'https://api.nutritionix.com/v1_1/search?'); 
  curl_setopt($ch,CURLOPT_HEADER,0); 
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,0); 
  //设置是通过post还是get方法
  curl_setopt($ch,CURLOPT_POST,1); 
  //传递的变量
  curl_setopt($ch,CURLOPT_POSTFIELDS,$curlPost); 
  $data = curl_exec($ch);
  curl_close($ch); 
  
  echo $data;
?>
