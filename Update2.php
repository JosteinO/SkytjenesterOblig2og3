<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
  $sid = $_GET["sid"];

  $servername = "10.10.2.5";
  $username = "dats20";
  $password = "passord";
  $dbname = "studentinfo";
echo "laget server variabler <br/>";
  // Create connection
  $db = new mysqli($servername, $username, $password, $dbname);
echo "kobler til server <br/>";
  // Check connection
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }
echo "sjekket forbindelse <br/>";

  $sql = "SELECT studentid, name, email
  FROM students
  WHERE studentid = '".$sid."';";

  $sql2 = "SELECT study_program
  FROM courses
  WHERE studentid = '".$sid."';";

echo "Laget sql setning <br/>";

  $resultat = $db->query($sql);

    echo("Error description: " . mysqli_error($db));

echo "utført sql <br/>";
  $rad = $resultat->fetch_object();
echo "hentet objekter <br>";
  $studentid =  $rad->studentid;
  $name =  $rad->name;
  $email =  $rad->email;
  //$studyprogram =  $rad->study_program;
echo "lagt objekter i variabler, nå kommer html <br>";

$db2 = new mysqli($servername, $username, $password, $dbname);
echo "kobler til server <br/>";
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
    <input type="text" name="studentid" value="<?php echo $studentid; ?>">
    <input type="text" name="name" value="<?php echo $name; ?>">
    <input type="text" name="email" value="<?php echo $email; ?>">
    <input type="text" name="studyprogram" value="<?php echo $studyProgram; ?>">
    <input type="submit" name="submit">
  </form>

</body>
</html>
