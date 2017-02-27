<?php 
header('content-type:text/html;charset=utf-8');

$RequestId=$_GET["request_id"];

  $pdo = new PDO('mysql:host=localhost;dbname=phms','root','qgk112358'); 
  $res = $pdo -> query("select * from user where uid = '$uid' and token = '$token';") -> fetch();
  if(!empty($res)){

$query = "SELECT work_image from `tbl_appointment_details` WHERE request_id=".$RequestId; 

$result = mysqli_query($con, $query) or die(mysqli_error()); 

$photo = mysqli_fetch_array($result);
 
header('Content-Type:image/jpeg'); 

echo $photo[0]; 
}

?>
