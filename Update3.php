<!DOCTYPE html>
<html>
<head>
  <title>Update status</title>
</head>
<div id="container">
<body>
  <div id="header">
    <h2>Update status</h2>
  </div>
  <div id="body">
</body>
</html>

<?php
$servername = "10.10.2.5";
$username = "dats20";
$password = "passord";
$dbname = "studentinfo";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$sid = $_GET["sid"];
$name = $_GET["name"];
$email = $_GET["email"];
$studyprogram = $_GET["studyprogram"];


$sql1 = "UPDATE students
SET name = '".$name."', email = '".$email."'
WHERE studentid = '".$sid."';";

$sql2 = "UPDATE courses
SET study_program ='".$studyprogram."'".
"WHERE studentid = '".$sid."';";

$resultat = $db->query($sql1);

if(!$resultat){
  die("Failed to update the table students");
}

$resultat2 = $db->query($sql2);

if(!$resultat2){
  die("Failed to update the table courses, but succeeded to update students table");
}

echo "Students and courses have been updated!";
echo "<br> <a href='/retrieveinfo.php'>Click here to see all students</a>";

?>
</div>
<div id="footer">
  <?php
  include "Footer.php";
  ?>
</div>
</body>
</div>
</html>
