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
  if (isset($_GET["SID"])){
    $sid = $_GET["SID"];
  }
  else{
    die("No student selected.");
  }

  include "Database.php";
  $db = dbConnect();


  $sql = "SELECT studentid, name, email
  FROM students
  WHERE studentid = '".$sid."';";

  $sql2 = "SELECT study_program
  FROM courses
  WHERE studentid = '".$sid."';";



  $resultat = $db->query($sql);

  $rad = $resultat->fetch_object();

  $studentid =  $rad->studentid;
  $name =  $rad->name;
  $email =  $rad->email;
  //$studyprogram =  $rad->study_program;

$resultat2 = $db->query($sql2);

$rad2 = $resultat2->fetch_object();

$studyprogram =  $rad2->study_program;

  ?>
  <table>
    <tr>
    <form action="Update3.php" method="get">
      <td>Student ID</td>
      <td><input type="text" name="sid" value="<?php echo $studentid; ?>"></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
    </tr>
    <tr>
      <td>Studyprogram</td>
      <td><input type="text" name="studyprogram" value="<?php echo $studyprogram; ?>"></td>
    </tr>
    <tr>
    <td><input type="submit" name="Submit" value="Submit changes"></td>
    </tr>
  </form>
</table>
</div>
<div id="footer">
  <?php
  include "Footer.php";
  ?>
</div>
</body>
</div>
</html>
