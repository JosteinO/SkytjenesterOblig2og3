<!DOCTYPE html>
<html lang="no">
 <head>
   <meta charset="utf-8">
   <title>Delete student</title>
 </head>
   <body>
      <form action="" method="post">
          <input type="text" name="studentid"></input>
       <input type="submit" value="Delete student" name="delete"></input>
      </form>

<?php
                
          if(isset($_POST["delete"])){
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
           
              $studentid = $_POST["studentid"];
              
              /*$sql = "DELETE s.studentid, s.name, s.email, c.study_program
              FROM students s
              LEFT JOIN courses c ON s.'$studentid' = c.$studentid";
              $resultat = $db->query($sql);*/
           
              $sql = "DELETE
              FROM students
              WHERE studentid LIKE '%$studentid%'";
           
              $resultat = $db->query($sql);   
           
              echo $studentid . " is now deleted!";
              $db->close();
          }

$sql1 = "SELECT s.studentid, s.name, s.email, c.study_program
                 FROM students s
                 LEFT JOIN courses c ON s.studentid = c.studentid";
                 $resultat1 = $db->query($sql1);
                 $antall_rader = $db->affected_rows;
                 for ($i = 0; $i < $antall_rader; $i++) {
                     $rad = $resultat1->fetch_object();
                     if($rad > 0){
                      $studentid = "StudentID: " . $rad->studentid;
                      $name = "Name: " . $rad->name;
                      $email = "Email: " . $rad->email;
                      $studyprogram = "Studyprogram: " . $rad->study_program;
                      echo $studentid . "<br>";
                      echo $name . "<br>";
                      echo $email . "<br>";
                      echo $studyprogram . "<br><br>";
                     }
                 }
?>

    <footer style="border-style: solid; text-align: center;">
     <?php
       echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
       "Portnumber: ".$_SERVER['SERVER_PORT']."<br>";
     ?>
    </footer>
  </body>
</html>
