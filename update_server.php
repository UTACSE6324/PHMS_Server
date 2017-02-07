<?php
  header("Content-type: text/html; charset=utf-8");
  
  exec('cd /var/www/html/  git pull origin master');//进入目录
  exec("git pull origin master");//进行git拉取，前提是使用了ssh
?>
