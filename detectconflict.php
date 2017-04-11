<?php
  
  $ins = $pdo -> query("select apiID from medicine where uid = '$uid';") -> fetchAll();
 
  $url='https://rxnav.nlm.nih.gov/REST/interaction/list.json?rxcuis=';
    
  $num = count($ins);
  if($num > 1){
    for ($i = 0; $i < $num; ++$i) {
      $url = $url.$ins[$i]['apiID'].'+';
    }
    
    $apiRes = file_get_contents($url);
    $apiRes = json_decode($apiRes, true);
    
    $conflictList = $apiRes['fullInteractionTypeGroup'];
    
    $set = $pdo -> query("select name, cid from user where uid = '$uid'");
    $username = $set['name'];
    $cid = $set['cid'];
    var_dump($set);
   
    $message = "Hello !\n There is a conflict in '$username''s medicine list. Please read the following details: \n";
    
    foreach ($conflictList as $listitem){
      foreach ($listitem['fullInteractionType'] as $conflict){
         $summary = $conflict['comment'];
         $description = "";
        
         foreach ($conflict['interactionPair'] as $pair){
            $description = $description.$pair['description']."\n";
         }
        
         $pdo -> query("insert into notice (uid,isnew,summary,description) values ('$uid','1','$summary','$description')");
         $message = $message.$summary."\n".$description."\n";
      }
    }
   
    if($cid != 0){
      $email = $pdo -> query("select email from contact where cid = '$cid'")['email'];
      
      $to = $email;
      $from = "phms@phms.jarviszhang.com";
      $headers = "From: $from";
      $subject = "Medicine Conflicts Notice";
      mail($to,$subject,$message,$headers);  
      
      echo $from."<br>";
      echo $to."<br>";
      echo $message;
    }
    
  }
?>