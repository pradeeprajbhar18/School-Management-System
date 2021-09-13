<link rel="stylesheet" href="style.css">
<div style="color: white; background-color: tomato; padding: 30px;display: flex;justify-content: space-between;">
<span>
<a href="subject.php" style="text-decoration:none; color:white; border-bottom:2px solid lightgray; padding :5px;">CLASS</a>
  <a href="student.php" style="text-decoration:none; color:white;padding :5px;">STUDENTS</a>
  <a href="result.php" style="text-decoration:none; color:white; padding :5px;">RESULTS</a>
</span>
<span>
    CLASS
</span>
</div>
<form action="subjectdb.php" method="POST">
    <div style="display: flex;justify-content: flex-end; padding: 30px;gap: 5px;">
        <input type="text" name="class" placeholder="Enter class name" required>
        <input type="text" name="subject" placeholder="Enter subjects" required>
        <button style=" font-weight: 400; " onclick="submit()">Add Class details</button>
        </div>
</form>
<div>
    
</div>
<table style=" width: 100%;"> 
    <tr style="background-color: #343a40; color: white; text-align: left;padding: 15px;">
<th style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px;">
    Sr. No
</th>
<th>
   CLASS
</th>
<th >Subject</th>
<th>Edit Class Details</th>
<th>Update Marks</th>

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
$sql = "SELECT `subject_id`, `course`, `subject` FROM `crud`.`class`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

?>

    <tr>
<td ><?php echo  $row["subject_id"] ?></td>
<td><?php echo  $row["course"] ?></td>
<td><?php echo  $row["subject"] ?></td>
<td><a href="subjectedit.php?subject_id=<?php echo $row['subject_id']; ?>"><button onclick="update()">Update</button></a>
<a href="subjectdelete.php?subject_id=<?php echo $row['subject_id']; ?>"><button onclick="delete()">Delete</button></a></td>
<td><a href="updatemarks.php?subject_id=<?php echo $row['subject_id']; ?>"><button onclick="update()">Update marks</button></a> 
<?php }}?>
    </tr>
</table>
