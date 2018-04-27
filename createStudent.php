<!doctype html>
<html lang="no">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create student</title>
  </head>
  <body>
  
 <form action="../doCreate.php" method="POST">
  <fieldset>
    <legend>Student information:</legend>
    StudentID:<br>
    <input type="text" name="studentid" placeholder="Enter StudentID"><br>
    Name:<br>
    <input type="text" name="name" placeholder="Enter your name"><br>
    Email:<br>
    <input type="text" name="email" placeholder="Enter your email"><br>
    Study program:<br>
    <input type="text" name="studyprogram" placeholder="Enter your study program"><br><br>
    <input type="submit" value="Submit">
  </fieldset>
</form>

<br><br><br><hr>

      <footer>
      <?php
        echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
             "Portnumber: ".$_SERVER['SERVER_PORT'];
        ?>
      </footer>
  </body>
</html>
