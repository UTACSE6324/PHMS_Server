<?php
  header('content-type:text/html;charset=utf-8');

  echo "????\n";

  $uid = $_GET['uid'];
  $token = $_GET['token'];
  $key = $_GET['key'];

  echo "????\n";

  
  $arr = array();
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();

  if(!empty($res)){
    
    header("Status-Code:1");
    header("summary:Success");
        
    $med = $pdo -> query("select * from medicine where uid = '$uid' and name like '$key';") -> fetchAll();
    $medArray = new Array();
    /*
    foreach($med as $col){
      array_push($medArray,
            array(
              "mid" => $col['mid'],
              "api_id" => $col['apiID'],
              "name" => $col['name'],
              "quantity" => $col['quantity'],
              "unit" => $col['unit'],
              "instructions" => $col['instructions'],
              "times" => $col['times'],
              "days" => $col['days'],
              "start_date" => $col['start_date'],
              "end_date" => $col['end_date']
            )
          );
    }
    
    $diet = $pdo -> query("select * from diethstory where uid = '$uid' and name like '$key';") -> fetchAll();
    $dietArray = new Array();
    foreach($diet as $col){
      array_push($dietArray,
            array(
              "dietid" => $col['dietid'],
              "date" => $col['date'],
              "type" => $col['type'],
              "name" => $col['name'],
              "quantity" => $col['quantity'],
              "unit" => $col['unit'],
              "calorie" => $col['calorie']
            )
          );
    }
    
    $note = $pdo -> query("select * from note where uid = '$uid' and name like '$key';") -> fetchAll();
    $noteArray = new Array();
    foreach($note as $col){
     array_push($noteArray,
            array(
              "noteid" => $col['noteId'],
              "type" => $col['type'],
              "name" => $col['name'],
              "date" => $col['date'],
              "summary" => $col['summary']
            )
          );
    }
    
    $contact = $pdo -> query("select * from contact where uid = '$uid' and name like '$key';") -> fetchAll();
    $contactArray = new Array();
    foreach($contact as $col){
      array_push($contactArray,
              array(
                "cid" => $col['cid'],
                "name" => $col['name'],
                "phone" => $col['phone'],
                "email" => $col['email']
              )
            );
    }
    
    $notice = $pdo -> query("select * from notice where uid = '$uid' and description like '$key';") -> fetchAll();
    $noticeArray = new Array();
    foreach($notice as $col){
     array_push($noticeArray,
            array(
              "nid" => $col['nid'],
              "isnew" => $col['isnew'],
              "summary" => $col['summary'],
              "description" => $col['description']
            )
          );
    }
    
    $arr = array(
      "medicine" => $medArray,
      "diet" => $dietArray,
      "note" => $dietArray,
      "contact" => $contactArray,
      "notice" => $noticeArray
    );
    
    }else{
      header("Status-Code:-1");
      header("summary:Insert invalid");
    }
    */
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
  }
  
  echo json_encode($arr);
  
?>