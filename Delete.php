<?php

//checks if a post is set and performs the wanted function or prints the form
if(isset($_POST["getStudent"])){
  getStudent();
}
elseif(isset($_POST["deleteStudent"])){
  deleteStudent();
}
else{
  printForm();
}

//functions#####################################################################

function getStudent(){//This method searches the database for the wanted student

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

   $resultat = $db->query($sql);

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
  //if($rad>0){
    $studentid = $rad->studentid;
    $studentid2 = $result[0];
    echo "
    <html>
      <head>
      </head>
      <body>
        <table>
          <tr>
            <td>StudentID</td>
            <td>".$studentid."/".$studentid2."</td>
          </tr>
          <tr>
            <td>Name</td>
            <td>".$rad->name."/".$result[1]."</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>".$rad->email."/".$result[2]."</td>
          </tr>
          <tr>
            <td>Studyprogram</td>
            <td>".$rad->study_program."/".$result[3]."</td>
          </tr>
          <tr>
            <td>Delete student</td>
            <td>
              <form action='Delete.php' method='post'>
              <input type='hidden' value='".$studentid."'>
              <input type='submit' value='Delete' name='deleteStudent'>
            </td>
          </tr>
        </table>
      </body>
    </html>
    ";
  //}
  //else{
  //  echo "Something went wrong, check if the studentid i correct <br/>";
  //  printForm();
  //}
}

function deleteStudent(){//This is the function that when called deletes the student

  $db = dbConnection();//connect to the database

  $sql = "DELETE FROM students.Student_info
  WHERE studentID = ".$_POST["studentid"].";";

  $sql = lagSQL();
  $db = dbConnection();

  if ($db->query($sql) === TRUE) {
      echo "Student deleted";
  } else {
      echo "Error updating record: " . $db->error;
  }

  $db->close();

}

function printForm(){//prints a form that the user can use to find the student to delete
  echo "
  <!DOCTYPE html>
  <html>
    <head>
    </head>
    <body>
      <form action='Delete.php' method='post'>
        <table>
          <tr>
            <td>Student ID</td>
            <td><input type='text' name='studentid'></td>
          </tr>
          <tr>
            <td>Find student</td>
            <td><input type='Submit' name='getStudent'></td>
          </tr>
        </table>
      </form>
      <p>Type the student ID of the student you want to delete in the input field above.</p>
    </body>
  </html>
  ";
}
?>
