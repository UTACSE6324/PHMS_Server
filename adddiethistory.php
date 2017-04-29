<?php
  header('content-type:text/html;charset=utf-8');
  
  $uid = $_GET['uid'];
  $token = $_GET['token'];
  
  $date = $_GET['date'];
  $type = $_GET['type'];
  $name = $_GET['name'];
  $quantity = $_GET['quantity'];
  $unit = $_GET['unit'];
  $calorie = $_GET['calorie'];

  $name = str_replace("'","\'",$name);
  $unit = str_replace("'","\'",$unit);

  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){
    $ins = $pdo -> exec("insert into diethistory (uid, date, type, name, quantity, unit, calorie) 
                          values ('$uid','$date','$type','$name','$quantity','$unit','$calorie');");
    if($ins == 1){
      header("Status-Code:1");
      header("summary:Success");
      echo $pdo->lastInsertId();
    }else{
      header("Status-Code:-1");
      header("summary:Insert invalid");
      echo $pdo->errorInfo();
    }
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
    echo "Token out of date";
  }

  try{
    $dietid = $pdo->lastInsertId();
    
    $apiID = $_GET['apiid'];
    $url='https://trackapi.nutritionix.com/v2/search/item?
            x-app-key=8aa879546b2064de87ebc15334754bab&x-app-id=b871bf7e&nix_item_id='.$apiID;
    $apiRes = file_get_contents($url);
    $apiRes = json_decode($apiRes, true);
    
    $fat = $apiRes['foods'][0]['nf_total_fat'];
    $protein = $apiRes['foods'][0]['nf_protein'];
    $carbohydrate = $apiRes['foods'][0]['nf_total_carbohydrate'];
    
    $pdo -> exec("update diethistory set apiId=$apiID, fat=$fat, protein=$protein, carbohydrate=$carbohydrate
                    where dietid=$dietid");
    
  }catch(Exception $e){}
  
?>
