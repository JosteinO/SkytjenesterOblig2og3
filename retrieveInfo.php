<?php
          $db = mysqli_connect("10.10.2.5", "maxscaleuser", "maxscalepass", "studentinfo");
          $info = array();
         /* if ($db->connect_error) {
             die(“Connection failed: ” . $db->connect_error);
          }*/
?>
        <?php
            if(isset($_POST["retrieve"])){
                $sql1 = "SELECT * FROM students";
                $resultat = $db->query($sql1);
                $antall_rader = $db->affected_rows;
              
                echo "Knappe er trykket test";

                for ($i = 0; $i < $antall_rader; $i++) {
                    $rad = $resultat->fetch_object();

                    $studentid = $rad->studentid;
                    $name = $rad->name;
                    $email = $rad->email;
                    $studentprogram = $rad->study_program;
                    echo $studentid . "<br>";
                    echo $name . "<br>";
                    echo $email . "<br>";
                    echo $studentprogram . "<br>";
                  
                    echo "testingAntallrader?";                    
                }
            }
        ?>
<!DOCTYPE html>
<html>
 <head>
   <title>Retrieve Info</title>
 </head>
   <body>
    <form action="" method="post">
      <input type="submit" name="retrieve" value="Retrieve all the data!"></input><br>
    </form>
    <footer>
      <?php
       echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
       "Portnumber: ".$_SERVER['SERVER_PORT'];
      ?>
    </footer>
</body>
</html>
