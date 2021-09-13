<link rel="stylesheet" href="style.css">
<div style="color: white; background-color: tomato; padding: 30px;display: flex;justify-content: space-between;">
<span>
<a href="subject.php" style="text-decoration:none; color:white; padding :5px;">CLASS</a>
  <a href="student.php" style="text-decoration:none; color:white;border-bottom:2px solid lightgray; padding :5px;">STUDENTS</a>
  <a href="result.php" style="text-decoration:none; color:white; padding :5px;">RESULTS</a>
</span>
<span>
    STUDENTS
</span>
</div>
<form action="studentdb.php" method="POST">
    <div style="display: flex;justify-content: flex-end; padding: 30px;gap: 5px;">
        <input type="text" name="name" required>
        <button style=" font-weight: 400; " onclick="submit()">Add Students</button>
        </div>
</form>
<table style=" width: 100%;"> 
    <tr style="background-color: #343a40; color: white; text-align: left;padding: 15px;">
<th style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px; width: 10%;">
    Sr. No
</th>
<th style="width: 60%;">
    Student Name
</th>
<th style="width: 15%;"></th>
<th style="width: 15%;"></th>
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
<td ><?php echo  $row["student_id"] ?></td>
<td><?php echo  $row["studentname"] ?></td>
<div>
<td><a href="studentedit.php?student_id=<?php echo $row['student_id']; ?>"><button onclick="update()">Update</button></a></td>
<td><a href="studentdelete.php?student_id=<?php echo $row['student_id']; ?>"><button onclick="delete()">Delete</button></a></td>
<?php }
} else {

}
$conn->close();
?>
</div>
    </tr>
</table>
<script>
    function delete(){
        alert("Delete Successfull !");
    }
</script>

