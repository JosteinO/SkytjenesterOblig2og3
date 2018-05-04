<!DOCTYPE html>
<html lang="no">
 <head>
   <meta charset="utf-8">
   <title>Retrieve Info</title>
  <style>
   table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
   table {
    width: 100%;
}
</style>
  </style>
 </head>
 <div id="container">

   <body>
     <div id="header">
       This is the students saved in the db cluster
     </div>
     <div id="body">
      
      <a href="/index.php"> To index </a> <br>
      <a href="/NewUpdate.php"> Update student </a>


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

        $sql = "SELECT s.studentid, s.name, s.email, c.study_program
        FROM students s
        LEFT JOIN courses c ON s.studentid = c.studentid";

        $resultat = $db->query($sql);

        $antall_rader = $db->affected_rows;
    
echo '
    <br><br><table>
  <tr>
    <th>Studentnr</th>
    <th>Name</th> 
    <th>Mail</th>
    <th>Studyprogram</th>
  </tr>
';


        for ($i = 0; $i < $antall_rader; $i++) {
          $rad = $resultat->fetch_object();
          if($rad > 0){
           echo '<tr>
              <td>' . $rad->studentid . '</td> 
              <td>' . $rad->name . '</td> 
              <td>' . $rad->email . '</td> 
              <td>' . $rad->study_program . '</td> 
              </tr>';
          }
        }
    echo '</table>';

        $db->close();

        ?>
        </div>
        <div id="footer">
          <?php
          include "Footer.php";
          ?>
        </div>
  </body>
</html>
