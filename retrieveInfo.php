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

                echo "Testing123";
                /* $sql1 = "SELECT * FROM studentinfo.students";
                 $resultat = $db->query($sql1);
                 $antall_rader = $db->affected_rows;

                 echo "Knappen er trykket test";

                 for ($i = 0; $i < $antall_rader; $i++) {
                     $rad = $resultat->fetch_object();

                     $studentid = $rad->studentid;
                     $name = $rad->name;
                     $email = $rad->email;
                     $studyprogram = $rad->study_program;
                     echo $studentid . "<br>";
                     echo $name . "<br>";
                     echo $email . "<br>";
                     echo $studyprogram . "<br>";

                     echo "testingAntallrader?";                                         

                 }*/
                 
                 $db->close();
             }
?>
<!DOCTYPE html>
<html lang="no">
 <head>
   <meta charset="utf-8">
   <title>Retrieve Info</title>
 </head>
   <body>
      <form action="" method="post">
      <input type="submit" name="retrieve" value="Retrieve all the data!"></input><br>
    </form>
    <footer>
     <?php
        echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
       "Portnumber: ".$_SERVER['SERVER_PORT']."<br>";
     ?>
    </footer>
  </body>
</html>

