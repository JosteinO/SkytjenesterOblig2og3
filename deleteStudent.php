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
      <form action="" method="post">
          <input type="submit" value="Back to navigation-page" name="toIndex"></input>
      </form>
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
              
              /*$sql = "DELETE s, c
              FROM students s
              JOIN courses c ON s.'$studentid'=c.'$studentid'
              WHERE s.studentid='$studentid' AND c.studentid='$studentid'";
              $resultat = $db->query($sql);*/
           
              $sql = "DELETE
              FROM courses
              WHERE studentid='$studentid'";
           
              $sql2 = "DELETE
              FROM students
              WHERE studentid='$studentid'";
           
              $resultat = $db->query($sql);   
              $resultat2 = $db->query($sql2);
           
              echo $studentid . " is now deleted!";
              $db->close();
          }

          if(isset($_POST["toIndex"])){
           header("Location: index.php");
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