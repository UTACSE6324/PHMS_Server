<?php

  $ins = $pdo -> query("select * from contact where uid = '$uid';") -> fetchAll();
?>
