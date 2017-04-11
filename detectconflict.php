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
    
    $num = count($conflictList);
    
    foreach ($conflictList as $listitem){
      foreach ($listitem['fullInteractionType'] as $conflict){
         $summary = $conflict['comment'];
         $description = "";
        
         foreach ($conflict['interactionPair'] as $pair){
            $description = $description.$pair['description']."\n";
         }
        
         $pdo -> query("insert into notice (uid,isnew,summary,description) values ('$uid','1','$conflict','$description')");
      }
    }
   
  }
?>
