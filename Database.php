<?php
$servername = "10.10.2.5";
$username = "dats20";
$password = "passord";
$dbname = "studentinfo";

function dbConnection(){
  // Create connection
  $db = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  }
  else{
    return $db;
  }
}

?>
