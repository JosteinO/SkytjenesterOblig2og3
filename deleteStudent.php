<!DOCTYPE html>
<html lang="no">
 <head>
   <meta charset="utf-8">
   <title>Delete student</title>
 </head>
 <div id="container">
   <body>
     <div id="header">
       <h2>Delete a student</h2>
     </div>
     <div id="body">
       <p>Type in studentID for the student you want to delete below</p>
       <table>
         <form action="" method="post">
          <tr>
            <td>StudentID:</td>
            <td><input type="text" name="studentid" placeholder="sXXXXXX" <?php checkGet(); ?>></input></td>
          </tr>
          <tr>
            <td><input type="submit" value="Delete student" name="delete"></input></td>
        </form>
        <form action="index.php" method="post">
            <td><input type="submit" value="Back to navigation-page"></input></td>
          </tr>
        </form>
        </table>


      <?php
      function checkGet(){
        if(isset($_GET["SID"])){
          echo 'value="'.$_GET["SID"].'"';
        }
      }

      if(isset($_POST["delete"])){
        include "Database.php";
        $db = dbConnect();

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
      ?>
  </div>
  <div id="footer">
     <?php
       include "Footer.php";
     ?>
  </div>
  </body>
</div>
</html>
