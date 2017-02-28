<?php 

$RequestId=$_GET["mid"];

$servername = "localhost";
$username = "root";
$password = "qgk112358";
$dbname = "medicine";

$con = mysqli_connect($servername , $username, $password, $dbname );

$query = "SELECT image from `medicine` WHERE mid=".$RequestId; 

$result = mysqli_query($con, $query) or die(mysqli_error()); 

$photo = mysqli_fetch_array($result);
 
header('Content-Type:image/jpeg'); 

echo $photo[0]; 

?>
