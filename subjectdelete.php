<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create connection
$conn = new mysqli($servername,$username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['subject_id'];
$sql = mysqli_query($conn,"DELETE FROM  `crud`.`class`  where subject_id='$id'");
header('Location: subject.php');
$conn->close();
echo "alert('Delete Successfull !')";
  
?>