<!DOCTYPE html>
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
           
    
    /*$studentid = $_POST["studentid"];
    $name = $_POST["studentname"];
    $email = $_POST["email"];
    $studyProgram = $_POST["program"];*/
  }



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
                      $studentid = $rad->studentid;
                      $name = $rad->name;
                      $email = $rad->email;
                      $studyprogram = $rad->study_program;
                     }
                 }


?>
<html>
  <header>
    <title>Update student information</title>
  </header>
  <body>
    <form action="" method="POST">
      <table>
        <th></th>
        <th>New information</th>
        
          Type in the student id of the student you want to edit and press submit!
          <input type="text" name="studentidedit" value="sXXXXXX"></input>
          <input type="submit" name="submit">Submit</input>
          <br><br><br>
        <tr>
          <td>Student id</td>
          <td><input type="text" name="studentid" value="<?php echo $studentid; ?>"></input></td>
        </tr>
        <tr>
          <td>Student name</td> 
          <td><input type="text" name="name" value="<?php echo $name; ?>"></input></td>
        </tr>
        <tr>
          <td>Student email</td>
          <td><input type="text" name="email" value="<?php echo $email; ?>"></input></td>
        </tr>
        <tr>
          <td>Study program</td>
          <td><input type="text" name="program" value="<?php echo $studyprogram; ?>"></input></td>
        </tr>
        <tr>
          <td>Submit changes</td>
          <td><input type="submit" name="update"></input></td>
        </tr>
      </table>
    </form>


    </form>
    <br/>
    <p>ps: It is only the data that has an input value that will change.</p>
    <p>If there is something you do not want to change, do not write anything in that input field.</p>
    <footer style="border-style: solid; text-align: center;">
     <?php
        echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
       "Portnumber: ".$_SERVER['SERVER_PORT']."<br>";
       $db->close();
     ?>
    </footer>
  </body>
</html>
