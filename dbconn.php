<!DOCTYPE html>
<html>
<head>
  <title>PHMS Server DataBase Conn Test</title>
  <style type="text/css"> 
    th {padding-left:4px; padding-right:4px;}
    td {padding-left:4px; padding-right:4px;}
  </style>
</head>
<body>

  table user info:<br>
  
  <table border="1">
  
    <tr>
      <th>uid</th><th>name</th><th>gender</th><th>age</th><th>weight</th><th>height</th>
      <th>password</th><th>bp</th><th>bsl</th><th>chol</th><th>token</th>
    </tr>
    
    <?php
    
      try{
        $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358');
        $rs = $pdo -> query("select * from user"); 
          while($row = $rs -> fetch()){
            print("<tr>");
            for ($i= 0;$i< count($row); $i=$i+2){
              print("<td>".$row[$i]."</td>");
            }
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
