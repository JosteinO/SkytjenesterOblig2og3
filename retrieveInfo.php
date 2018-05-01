<!DOCTYPE html>
<html lang="no">
 <head>
   <meta charset="utf-8">
   <title>Retrieve Info</title>
 </head>
   <body>
      <form action="" method="post">
       <input type="submit" value="Back to navigation-page" name="toIndex"></input><br>      
       <input type="submit" name="retrieve" value="Retrieve all the data!"></input><br>    
      </form>
 
<?php
          
            if(isset($_POST["retrieve"])){
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
                 $resultat = $db->query($sql1);
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
             }

          if(isset($_POST["toIndex"])){
           header("Location: 128.39.121.95:8020/index.php");
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
