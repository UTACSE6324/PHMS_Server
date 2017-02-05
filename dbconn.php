<!DOCTYPE html>
<html>
<head>
<title>PHMS Server DataBase Conn Test</title>
</head>
<body>

  table user info:<br>
  
  <table border="1">
  
    <tr>
      <th>uid</th><th>name</th><th>password</th><th>gender</th><th>age</th><th>weight</th>
      <th>height</th><th>bp</th><th>bsl</th><th>chol</th><th>token</th>
    </tr>
    
    <?php
      header('content-type:text/html;charset=utf-8');

      try{
        $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358');
        $rs = $pdo -> query("select * from user"); 
        
          while($row = $rs -> fetch()){
            <tr>
              <th>print(array_search("uid",$row));</th>
              <th>print(array_search("name",$row));</th>
              <th>print(array_search("password",$row));</th>
              <th>print(array_search("gender",$row));</th>
              <th>print(array_search("age",$row));</th>
              <th>print(array_search("weight",$row));</th>
              <th>print(array_search("height",$row));</th>
              <th>print(array_search("bp",$row));</th>
              <th>print(array_search("bsl",$row));</th>
              <th>print(array_search("chol",$row));</th>
              <th>print(array_search("token",$row));</th>
            </tr>
          }

      }catch(PDOException $e){
        print "ERROR!:".$e->getMessage()."</br>";
        die();
      }

    ?>
  
  </table>
  
</body>
</html>
