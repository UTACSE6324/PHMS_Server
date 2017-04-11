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
    
    //var_dump($apiRes);
    
    $conflict = $apiRes['fullInteractionTypeGroup']['fullInteractionType']['comment'];
  
    //echo '<br>';
    echo $conflict;
    
    if($conflict!=null)
    $res = $pdo -> query("insert into notice (uid,isnew,summary) values ('1','1','$conflict')");
  }
?>
