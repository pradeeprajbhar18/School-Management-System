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

$id = $_GET['student_id'];
$sql = "SELECT  studentname FROM `crud`.`students` Where student_id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['name'];
	
    $sql = mysqli_query($conn,"update `crud`.`students` set studentname='$name' where student_id='$id'");
    header('Location: student.php');
}

?>
<form method="POST">
  <input type="text" name="name" value="<?php echo $row['studentname'] ?>" placeholder="Enter New Student name" Required>
  <input type="submit" name="update" value="Update">
</form>
  <?php }}

  ?>