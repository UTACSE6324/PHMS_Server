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
            print("<tr>");
            print("<td>".array_column($row,"uid")."</td>");
            print("<td>".array_column($row,"name")."</td>");
            print("<td>".array_column($row,"password")."</td>");
            print("<td>".array_column($row,"gender")."</td>");
            print("<td>".array_column($row,"age")."</td>");
            print("<td>".array_column($row,"weight")."</td>");
            print("<td>".array_column($row,"height")."</td>");
            print("<td>".array_column($row,"bp")."</td>");
            print("<td>".array_column($row,"bsl")."</td>");
            print("<td>".array_column($row,"chol")."</td>");
            print("<td>".array_column($row,"token")."</td>");
            print("</tr>");
          }

      }catch(PDOException $e){
        print "ERROR!:".$e->getMessage()."</br>";
        die();
      }

    ?>
  
  </table>
  
</body>
</html>
