<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
  $sid = $_GET["sid"];
  echo $sid;

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

  $sql = "SELECT s.studentid, s.name, s.email, c.study_program
  FROM students s
  LEFT JOIN courses c ON s.studentid = c.studentid
  WHERE s.studentid = ".$sid;

  $resultat = $db->query($sql);

  $rad = $resultat->fetch_object();

  $studentid =  $rad->studentid;
  $name =  $rad->name;
  $email =  $rad->email;
  $studyprogram =  $rad->study_program;

  ?>

  <form action="Update3.php" method="get">
    <input type="text" name="studentid" value="<?php echo $studentid; ?>">
    <input type="text" name="name" value="<?php echo $name; ?>">
    <input type="text" name="email" value="<?php echo $email; ?>">
    <input type="text" name="studyprogram" value="<?php echo $studyProgram ?>">
    <input type="submit" name="submit">
  </form>

</body>
</html>
