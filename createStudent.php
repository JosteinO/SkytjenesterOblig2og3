<?php

if (isset($_REQUEST["createStudent"])) { 
$servername = "10.10.2.5";
$username = "root";
$password = "passord";
$dbname = "studentinfo";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}     
    
$studentID = $_REQUEST["studentid"];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$studyprog = $_REQUEST["studyprogram"];
echo "$studentID <br>" . "$name <br>" . " $email <br>" . "$studyprog";
  
$sql = "INSERT INTO studentinfo.students (studentid, name, email, study_program) VALUES"
            . "('$studentID', '$name', '$email', '$studyprog')";

      $result = $db->query($sql);
  
  if ($result) {
      header("Location: /createStudent.php");
      exit;
    } else {
        echo "Error in DB: <br>" . $db->error;
    }
  
   $db->close();
}
?>

<!doctype html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create student</title>
  </head>
  <body>
  
 <form action="" method="POST">
  <fieldset>
    <legend>Student information:</legend>
    StudentID:<br>
    <input type="text" name="studentid" placeholder="Enter StudentID"><br>
    Name:<br>
    <input type="text" name="name" placeholder="Enter your name"><br>
    Email:<br>
    <input type="text" name="email" placeholder="Enter your email"><br>
    Study program:<br>
    <input type="text" name="studyprogram" placeholder="Enter your study program"><br><br>
    <input type="submit" name="createStudent" value="Submit">
  </fieldset>
</form>

<br><br><br><hr>

      <footer>
      <?php
        echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
             "Portnumber: ".$_SERVER['SERVER_PORT'];
        ?>
      </footer>
  </body>
</html>
