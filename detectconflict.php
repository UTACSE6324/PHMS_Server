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
    
    $set = $pdo -> query("select name, cid from user where uid = '$uid'")-> fetch();
    $username = $set['name'];
    $cid = $set['cid'];
   
    $message  = '<html><body>';
    $message .= "<img width='100%' src='http://45.55.179.123/img/mail_head.png'/>";
      
    foreach ($conflictList as $listitem){
      foreach ($listitem['fullInteractionType'] as $conflict){
         $summary = $conflict['comment'];
         $description = "";
        
         foreach ($conflict['interactionPair'] as $pair){
            $description = $description.$pair['description']."\n";
         }
        
         $pdo -> query("insert into notice (uid,isnew,summary,description) values ('$uid','1','$summary','$description')");
         $message .= $summary."\n".$description."\n";
      }
    }
    
    $message .= '</body></html>';
   
    if($cid != 0){
      $email = $pdo -> query("select email from contact where cid = '$cid'")->fetch()['email'];
      
      $to = $email;
      $from = "phms@phms.jarviszhang.com";
      $headers = "From: $from\r\n";
      $headers .= "CC: $from\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      $subject = "Medicine Conflicts Notice";
     
      mail($to,$subject,$message,$headers);  
    }
    
  }
?>
