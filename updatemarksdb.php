<link rel="stylesheet" href="style.css">
<div style="color: white; background-color: tomato; padding: 30px;display: flex;justify-content: space-between;">
<span>
<a href="subject.php" style="text-decoration:none; color:white; ">CLASS</a>
  <a href="student.php" style="text-decoration:none; color:white;padding :5px;">STUDENTS</a>
  <a href="result.php" style="text-decoration:none; color:white; padding :5px;">RESULTS</a>
</span>
<span>
    Update marks of students
</span>
</div>
<table style=" width: 100%;"> 
    <tr style="background-color: #343a40; color: white; text-align: left;padding: 15px;">
<th style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; ">
course
</th>
<th>
   Subject 
</th>
<th>
Student Name
  </th>
  <th>
    marks
    <th>
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

$subject_id = $_GET['subject_id'];
$sql = "SELECT  `course`, `subject` FROM `crud`.`class` Where subject_id = '$subject_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {  
    $coursedata = $row['course'];
    $subjectdata = $row['subject'];
    ?>
  <tr>
    <td><?php echo $row['course']; ?></td>
    <td><?php echo $row['subject']; ?></td>
  <?php  
  }} ?>

<?php
$student_id = $_GET['student_id'];
$sql = "SELECT  studentname FROM `crud`.`students` Where student_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) { 
    $studentdata = $row['studentname'];
    ?>
    <td><?php echo $row['studentname']; ?></td>
 <?php
    if(isset($_POST['update'])) // when click on Update button
{
    $name = $_POST['marks'];
    $sql = mysqli_query($conn,"INSERT INTO `crud`.`marks`(`coursename`, `subjectname`, `studentname`, `marks`) VALUES ('$coursedata','$subjectdata','$studentdata','$name')");
     echo '<script> alert("Marks added successfully !");</script>';
}
     
  }}


  ?>

<form method="POST">
  <td><input type="number" name="marks"  placeholder="Enter marks" Required></td>
  <td><input type="submit" name="update" value="Update" style="    cursor: pointer;
    border: none;
    border-radius: 5%;
    background-color: white;
    color: red;
    border: 1px solid red;"></td>
</form>

<script>
  console.log('<?php echo  $studentdata; ?>');

</script>





