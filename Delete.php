<?php
include "Database.php";

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

  $db = dbConnection();//connect to database

  $sql = "SELECT s.studentid, s.name, s.email, c.study_program
  FROM students s
  WHERE s.studentid = ".$_POST["studentid"]."
  LEFT JOIN courses c ON s.studentid = c.studentid";

  $resultat = $db->query($sql);//query sql
  $rad = $resultat->fetch_object();//gets the objects

  if($rad>0){
    $studentid = $rad->studentid;
    echo "
    <html>
      <head>
      </head>
      <body>
        <table>
          <tr>
            <td>StudentID</td>
            <td>".$studentid."</td>
          </tr>
          <tr>
            <td>Name</td>
            <td>".$rad->name."</td>
          </tr>
          <tr>
            <td>StudentID</td>
            <td>".$rad->email."</td>
          </tr>
          <tr>
            <td>StudentID</td>
            <td>".$rad->study_program."</td>
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
  }
  else{
    echo "Something went wrong, check if the studentid i correct <br/>";
    printForm();
  }
}

function deleteStudent(){//This is the function that when called deletes the student

  $db = dbConnection();//connect to the database

  $sql = "DELETE FROM students
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
