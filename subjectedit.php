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
$sql = "SELECT  `course`,`subject` FROM `crud`.`class` Where subject_id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    if(isset($_POST['update'])) // when click on Update button
{
    $course = $_POST["course"];
    $subject = $_POST["subject"];
	
    $sql = mysqli_query($conn,"update `crud`.`class` set course='$course',subject='$subject' where subject_id='$id'");
    header('Location: subject.php');
}

?>
<form method="POST">
  <input type="text" name="course" value="<?php echo $row['course'] ?>" placeholder="Enter New course name" Required>
  <input type="text" name="subject" value="<?php echo $row['subject'] ?>" placeholder="Enter New subject name" Required>
  <input type="submit" name="update" value="Update">
</form>
  <?php }}

  ?>