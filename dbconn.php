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
        
          for($num = 0; $row = $rs -> fetch(); $num++){
            print("<tr>");
            print("<td>".array_column($row,"uid",$num)."</td>");
            print("<td>".array_column($row,"name",$num)."</td>");
            print("<td>".array_column($row,"password",$num)."</td>");
            print("<td>".array_column($row,"gender",$num)."</td>");
            print("<td>".array_column($row,"age",$num)."</td>");
            print("<td>".array_column($row,"weight",$num)."</td>");
            print("<td>".array_column($row,"height",$num)."</td>");
            print("<td>".array_column($row,"bp",$num)."</td>");
            print("<td>".array_column($row,"bsl",$num)."</td>");
            print("<td>".array_column($row,"chol",$num)."</td>");
            print("<td>".array_column($row,"token",$num)."</td>");
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
