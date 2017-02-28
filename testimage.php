<?php 

$RequestId=$_GET["mid"];

$pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 

$query = "SELECT image from `medicine` WHERE mid=".$RequestId; 

$result = $pdo -> query($query) -> fetch();

$photo = mysqli_fetch_array($result);
 
header('Content-Type:image/jpeg'); 

echo $photo[0]; 

?>
