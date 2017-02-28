<?php 

$RequestId=$_GET["row_id"];

  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){

$query = "SELECT image from `medicine` WHERE mid=".$RequestId; 

$result = mysqli_query($pdo, $query) or die(mysqli_error()); 

$photo = mysqli_fetch_array($result);
 
header('Content-Type:image/jpeg'); 

echo $photo[0]; 
}

?>
