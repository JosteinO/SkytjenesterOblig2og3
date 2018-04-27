<!DOCTYPE html>
<html>
  <head>
    <title>Retrieve Info</title>
  </head>
  
  <body>
      <?php
        $db = mysqli_connect("10.10.2.5", "dats20", "passord", "studentinfo");
        $info = array();
      ?>
    <form method="post">
        <input type="submit" name="retrieve" value="Retrieve all the data!"></input><br>
        <?php
            if(isset($_POST["retrieve"])){
                $sql1 = "SELECT * FROM students";
                $resultat = $db->query($sql1);
                $antall_rader = $db->affected_rows;

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
                    
                }
            }
        ?>
    </form>
  </body>
</html>
