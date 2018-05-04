<?php
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

$resultat = $db->query($sql);

if(!$resultat){
  die("Klarte ikke å oppdatere students");
}

$resultat2 = $db->query($sql2);

if(!$resultat2){
  die("Klarte ikke å oppdatere courses");
}

echo "Students and courses have been updated";

?>
