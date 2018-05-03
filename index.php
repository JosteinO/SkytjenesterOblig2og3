<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Welcome - Please pick an option below</h2><hr>

        Create a student: <a href="/createStudent.php">Click here</a><br><br>
        View all students: <a href="/retrieveInfo.php">Click here</a><br><br>
        Delete a student: <a href="/deleteStudent.php">Click here</a><br><br>

        <br><hr><br><br>
        <?php
        echo "Server IP: ".$_SERVER['SERVER_ADDR']." <br/> ".
             "Portnumber: ".$_SERVER['SERVER_PORT'];
        ?>
    </body>
</html>
