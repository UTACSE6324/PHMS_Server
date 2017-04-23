<?php
  header('content-type:text/html;charset=utf-8');

  $uid = $_GET['uid'];
  $token = $_GET['token'];
  $key = $_GET['key'];

  
  $arr = array();
  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();

  if(!empty($res)){
    
    header("Status-Code:1");
    header("summary:Success");
    
    $med = $pdo -> query("select * from medicine where uid = '$uid' and name like '%$key%';") -> fetchAll();
    $medArray = array();
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
    
    $diet = $pdo -> query("select * from diethistory where uid = '$uid' and name like '%$key%';") -> fetchAll();
    $dietArray = array();
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
    
    
    $note = $pdo -> query("select * from note where uid = '$uid' and name like '%$key%';") -> fetchAll();
    $noteArray = array();
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
    
    $contact = $pdo -> query("select * from contact where uid = '$uid' and name like '%$key%';") -> fetchAll();
    $contactArray = array();
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
    
    $notice = $pdo -> query("select * from notice where uid = '$uid' and description like '%$key%';") -> fetchAll();
    $noticeArray = array();
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
      "note" => $noteArray,
      "contact" => $contactArray,
      "notice" => $noticeArray
    );
    
  }else{
    header("Status-Code:-1");
    header("summary:Token out of date");
  }
  
  echo json_encode($arr);
  
?>
