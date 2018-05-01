<!DOCTYPE html>
<html lang="no">
 <head>
   <meta charset="utf-8">
   <title>Retrieve Info</title>
 </head>
   <body>
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

                 $sql1 = "SELECT * FROM studentinfo.students";
                 $sql2 = "SELECT * FROM studentinfo.courses";
                 $resultat = $db->query($sql1);
                 $resultat2 = $db->query($sql2);
                 $antall_rader = $db->affected_rows;


                 for ($i = 0; $i < $antall_rader; $i++) {
                     $rad = $resultat->fetch_object();
                     $rad2 = $resultat2->fetch_object();
                     if($rad > 0){
                      $studentid = "StudentID: " . $rad->studentid;
                      $name = "Name: " . $rad->name;
                      $email = "Email: " . $rad->email;
                      $studyprogram = "Studyprogram: " . $rad2->study_program;
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

    <footer style="border-style: solid; text-align: center;">
     <?php
        echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
       "Portnumber: ".$_SERVER['SERVER_PORT']."<br>";
     ?>
    </footer>
  </body>
</html>
