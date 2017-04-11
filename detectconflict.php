<?php
  echo "in";
  $ins = $pdo -> query("select apiID from medicine where uid = '$uid';") -> fetchAll();
  
  $url='https://rxnav.nlm.nih.gov/REST/interaction/interaction.json?rxcui=';

  $num = count($ins);
  if($num > 1){
    for ($i = 0; $i < $num; ++$i) {
      $url = $url.$ins[$i]['apiID'].'+';
    }
    
    $res = file_get_contents($url);
    
    $res = $pdo -> query("insert into notice (uid,isnew,summary) values ('1','1','$res')");
    
    echo $res;
  }
?>
