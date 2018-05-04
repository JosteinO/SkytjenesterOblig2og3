<!DOCTYPE html>
<html>
<head>
</head>
<div id="container">
<body>
  <div id="header">
    <h2>Edit information</h2>
  </div>
  <div id="body">
  <?php
  $sid = $_GET["sid"];

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


  $sql = "SELECT studentid, name, email
  FROM students
  WHERE studentid = '".$sid."';";

  $sql2 = "SELECT study_program
  FROM courses
  WHERE studentid = '".$sid."';";



  $resultat = $db->query($sql);

    echo("Error description: " . mysqli_error($db));


  $rad = $resultat->fetch_object();

  $studentid =  $rad->studentid;
  $name =  $rad->name;
  $email =  $rad->email;
  //$studyprogram =  $rad->study_program;


$db2 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db2->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$resultat2 = $db2->query($sql2);

echo("Error description: " . mysqli_error($db2));

$rad2 = $resultat2->fetch_object();
$antall_rader = $db2->affected_rows;
echo $antall_rader;

$studyprogram =  $rad2->study_program;

  ?>

  <form action="Update3.php" method="get">
    <input type="text" name="sid" value="<?php echo $studentid; ?>">
    <input type="text" name="name" value="<?php echo $name; ?>">
    <input type="text" name="email" value="<?php echo $email; ?>">
    <input type="text" name="studyprogram" value="<?php echo $studyprogram; ?>">
    <input type="submit" name="submit">
  </form>
</div>
<div id="footer">
  <?php
  include "Footer.php";
  ?>
</div>
</body>
</div>
</html>
