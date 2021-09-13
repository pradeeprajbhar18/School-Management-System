<link rel="stylesheet" href="style.css">
<div style="color: white; background-color: tomato; padding: 30px;display: flex;justify-content: space-between;">
<span>
<a href="subject.php" style="text-decoration:none; color:white;">CLASS</a>
  <a href="student.php" style="text-decoration:none; color:white;padding :5px;">STUDENTS</a>
  <a href="result.php" style="text-decoration:none; color:white; padding :5px;">RESULTS</a>
</span>
<span>
    Update students for Subject
</span>
</div>
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

$subject_id = $_GET['subject_id'];
$sql = "SELECT  `course`,`subject` FROM `crud`.`class` Where subject_id = '$subject_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    

?>
<div style=" padding: 30px;display: flex;justify-content: center;">
<div style="border:1px solid; width:100vh; padding: 30px;" >
<span>CLASS :  </span> <?php echo $row['course']; ?>
  <?php echo $row['subject'] ?><br><br> <?php }}

?>
<table style=" width: 100%;"> 
    <tr style="background-color: #343a40; color: white; text-align: left;padding: 15px;">
<th style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; width: 10%;">
    Sr. No
</th>
<th style="width: 60%;">
    Student Name
</th>
<th>
  Add marks
  </th>
  </tr>
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
$sql = "SELECT student_id, studentname FROM `crud`.`students`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   

?>
<tr>
  <td><?php echo $row['student_id']; ?></td>
  <td><?php echo $row['studentname']; ?></td>
  <td><a href="updatemarksdb.php?student_id=<?php echo $row['student_id']; ?>&subject_id=<?php echo $subject_id = $_GET['subject_id'];  ?>"><button>Add</button></a>
</td>
  </tr>
  <?php }} ?>
  </div>
  </div>

  