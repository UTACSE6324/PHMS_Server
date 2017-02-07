<?php
  $path = "/var/www/html";
  $branch = "master";
  $remote = "origin";
  $resetCommand = "git reset --hard $remote/$branch";

  chdir($path);
  echo "git fetch --all <br />";
  passthru("git fetch --all");
  echo "<br />$resetCommand<br />";
  passthru("$resetCommand");

  $wwwPath = "/var/www";
  chdir($wwwPath);
  $chmod = "chmod -R 777 xxxx/";
  echo "<br />$chmod</br>";
  passthru("$chmod");
  echo "<br />Done <br /><br />";
?>
