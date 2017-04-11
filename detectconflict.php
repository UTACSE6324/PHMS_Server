<?php
  
  $ins = $pdo -> query("select apiID from medicine where uid = '$uid';") -> fetchAll();
  
  $url='https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=';

  $num = count($ins);
  if($num > 1){
    for ($i = 0; $i < $num; ++$i) {
      $url = $url.$ins[$i]['apiID'].'+';
    }
    
    $apiRes = file_get_contents($url);
    echo $apiRes;
    
    $conflict = $apiRes['nlmDisclaimer'];
    $res = $pdo -> query("insert into notice (uid,isnew,summary) values ('1','1','$conflict')");
    
    echo $res;
  }
?>
