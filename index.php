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
    <div id="container">
    <body>
      <div id="header">
        <h2>Welcome - Please pick an option below</h2>
      </div>
      <div id="body">
        <table>
          <tr>
        <td>Create a student:</td> <td><a href="/createStudent.php">Click here</a></td>
      </tr>
      <tr>
        <td>View all students: </td> <td><a href="/retrieveInfo.php">Click here</a></td>
      </tr>
          <tr>
        <td>Delete a student: </td> <td><a href="/deleteStudent.php">Click here</a></td>
      </tr>
      <tr>
        <td>Update a student </td> <td><a href="/NewUpdate.php">Click here</a></td>
      </tr>


      </div>
      <div id="footer">
        <?php
        include "Footer.php";
        ?>
      </div>
    </body>
    </div
</html>
