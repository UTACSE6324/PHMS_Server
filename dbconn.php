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
            print("<td>".array_search("uid",$row)."</td>");
            print("<td>".array_search("name",$row)."</td>");
            print("<td>".array_search("password",$row)."</td>");
            print("<td>".array_search("gender",$row)."</td>");
            print("<td>".array_search("age",$row)."</td>");
            print("<td>".array_search("weight",$row)."</td>");
            print("<td>".array_search("height",$row)."</td>");
            print("<td>".array_search("bp",$row)."</td>");
            print("<td>".array_search("bsl",$row)."</td>");
            print("<td>".array_search("chol",$row)."</td>");
            print("<td>".array_search("token",$row)."</td>");
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
