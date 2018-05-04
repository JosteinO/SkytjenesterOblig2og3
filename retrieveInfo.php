<!DOCTYPE html>
<html lang="no">
 <head>
   <meta charset="utf-8">
   <title>Retrieve Info</title>
 </head>
 <div id="container">

   <body>
     <div id="header">
       This is the students saved in the db cluster
     </div>
     <div id="body">
      <form action="" method="post">
       <input type="submit" value="Back to navigation-page" name="toIndex"></input>
      </form>

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

        $sql = "SELECT s.studentid, s.name, s.email, c.study_program
        FROM students s
        LEFT JOIN courses c ON s.studentid = c.studentid";

        $resultat = $db->query($sql);

        $antall_rader = $db->affected_rows;


        for ($i = 0; $i < $antall_rader; $i++) {
          $rad = $resultat->fetch_object();
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

        $db->close();

        if(isset($_POST["toIndex"])){
          header("Location: index.php");
        }
        ?>
        </div>
        <div id="footer">
          <?php
          include "Footer.php";
          ?>
        </div>
  </body>
</html>
