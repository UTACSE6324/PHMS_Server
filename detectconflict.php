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
         $list1  = explode(".",$summary);
        
         $list11 = explode(",",$list1[0]);
         $id1 = strstr($list11[0],'=');
         $name1 = strstr($list11[1],'=');
         
         $list12 = explode(".",$list1[1]);
         $id2 = strstr($list12[0],'=');
         $name2 = strstr($list12[1],'=');
        
         $message .= '<table rules="all" width= '100%' style="margin:10px; padding: 10px; border-color: #666;" cellpadding="10">';
         $message .= "<tr style='background: #eee;'>
                      <td colspan='2'> Drug1 </td>
                      </tr>";
         $message .= "<tr>
                      <td><strong>Id:</strong> </td>
                      <td>".$id1."</td>
                      </tr>";
         $message .= "<tr>
                      <td><strong>Name:</strong> </td>
                      <td>".$name1."</td>
                      </tr>";
         $message .= "<tr style='background: #eee;'>
                      <td colspan='2'> Drug2 </td>
                      </tr>";
         $message .= "<tr>
                      <td><strong>Id:</strong> </td>
                      <td>".$id2."</td>
                      </tr>";
         $message .= "<tr>
                      <td><strong>Name:</strong> </td>
                      <td>".$name2."</td>
                      </tr>";
         
        
         $description = "";        
         foreach ($conflict['interactionPair'] as $pair){
            $description = $description.$pair['description']."\n";
         }
        
         $message .= "<tr style='background: #eee;'>
                      <td colspan='2'>".$description."</td>
                      </tr>";
         $message .= "</table>";
        
         $pdo -> query("insert into notice (uid,isnew,summary,description) values ('$uid','1','$summary','$description')");
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
