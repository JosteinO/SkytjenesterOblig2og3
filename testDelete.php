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
              
              $sql = "DELETE s.studentid, s.name, s.email, c.study_program
              FROM students s
              JOIN courses c ON s.'$studentid' = c.$studentid
              WHERE s.studentid='$studentid' AND c.studentid='$studentid'";
              $resultat = $db->query($sql);
           
              /*$sql = "DELETE
              FROM courses
              WHERE studentid='$studentid'";
           
              $resultat = $db->query($sql);   */
           
              echo $studentid . " is now deleted!";
              $db->close();
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
