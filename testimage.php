<?php 

$RequestId=$_GET["mid"];

$servername = "localhost";
$username = "root";
$password = "qgk112358";
$dbname = "phms";

$con = mysqli_connect($servername , $username, $password, $dbname );

if(!$con) {
 echo "<h3>Connection not Success!</h3>";
  die("Error in connection. " . mysqli_connect_error());
}
else {
  echo "<h3>Connection Success!</h3>";
}

$query = "SELECT image from `medicine` WHERE mid='234'"; 

$result = mysqli_query($con, $query) or die(mysqli_error()); 

$photo = mysqli_fetch_array($result);
 
header('Content-Type:image/jpeg'); 

echo $photo[0]; 

?>
