<link rel="stylesheet" href="style.css">
<div style="color: white; background-color: tomato; padding: 30px;display: flex;justify-content: space-between;">
<span>
<a href="subject.php" style="text-decoration:none; color:white; padding :5px;">CLASS</a>
  <a href="student.php" style="text-decoration:none; color:white; padding :5px;">STUDENTS</a>
  <a href="result.php" style="text-decoration:none; color:white; border-bottom:2px solid lightgray; padding :5px;">RESULTS</a>
</span>
<span>
   Results
</span>
</div>
<div style="display:flex;justify-content:space-between;">
<table style=" width: 100%;"> 
    <tr style="background-color: #343a40; color: white; text-align: left;padding: 15px;">
<th style="padding-top: 10px; padding-bottom: 10px; padding-left: 10px;">
    Sr. No
</th>
<th>Course</th>
<th>Subject</th>
<th>Students</th>
<th>Marks</th>
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
$sql = "SELECT `marks_id`, `coursename`, `subjectname`, `studentname`, `marks` FROM  `crud`.`marks`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo $row['marks_id']; ?></td>
    <td><?php echo $row['coursename']; ?></td>
    <td><?php echo $row['subjectname']; ?></td>
    <td><?php echo $row['studentname']; ?></td>
    <td><?php echo $row['marks']; ?></td>
<tr>

<?php }} ?>
  </table>
  <div style="background-color:red;">
  <table>
    
    <tr>
      <th>
        PROMOTED STUDENTS 
        
  </th>
  </tr>
  <?php
  $sql = "SELECT `marks_id`, `coursename`, `subjectname`, `studentname`, `marks` FROM  `crud`.`marks` where marks >= 50;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<tr style="color:white;">
  <td><?php echo $row['studentname']; ?></td><?php }} ?>
</tr>
  </table>
  <marquee>
    <span style="color:pink;">c</span>
    <span style="color:white;">o</span>
    <span style="color:blue;">n</span>
    <span style="color:orange;">g</span>
    <span style="color:white;">r</span>
    <span style="color:pink;">a</span>
    <span style="color:white;">t</span>
    <span style="color:blue;">u</span>
    <span style="color:orange;">l</span>
    <span style="color:white;">a</span>
    <span style="color:pink;">t</span>
    <span style="color:white;">i</span>
    <span style="color:blue;">o</span>
    <span style="color:orange;">n</span>
    <span style="color:white;">s</span>

    <span style="color:yellow">!</span>
    <span style="color:yellow">!</span>

  </marquee>
  </div>
  </div>