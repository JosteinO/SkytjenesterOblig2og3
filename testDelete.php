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

                //$db->close();
          if(isset($_POST["delete"])){
              $studentid = $_POST["studentid"];
              
              $sql = "DELETE s.studentid, s.name, s.email, c.study_program
              FROM students s
              LEFT JOIN courses c ON s.'$studentid' = c.$studentid";
              
              echo $studentid . "is now deleted!";
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
