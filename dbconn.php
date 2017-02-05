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

  table user info:<br><br>
  
  <table border="1">
  
    <tr>
      <th>uid</th><th>name</th><th>password</th><th>gender</th><th>age</th>
      <th>weight</th><th>height</th><th>bp</th><th>bsl</th><th>chol</th><th>token</th>
    </tr>
    
    <?php
    
      header('content-type:text/html;charset=utf-8');
    
      try{
        $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358');
        $rs = $pdo -> query("select * from user"); 
          while($row = $rs -> fetch()){
            print("<tr>");
            print("<td>".$row['uid']."</td>");
            print("<td>".$row['name']."</td>");
            print("<td>".$row['password']."</td>");
            print("<td>".$row['gender']."</td>");
            print("<td>".$row['age']."</td>");
            print("<td>".$row['weight']."</td>");
            print("<td>".$row['height']."</td>");
            print("<td>".$row['bp']."</td>");
            print("<td>".$row['bsl']."</td>");
            print("<td>".$row['chol']."</td>");
            print("<td>".$row['token']."</td>");
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
