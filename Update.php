<!DOCTYPE html>
<?php

?>
<html>
  <header>
    <title>Update student information</title>
  </header>
  <body>
    <form action="DoUpdate.php" method="POST">
      <table>
        <th></th>
        <th>New information</th>
        <tr>
          <td>Student id</td>
          <td><input type="text" name="studentid"></input></td>
        </tr>
        <tr>
          <td>Student name</td>
          <td><input type="text" name="studentname"></input></td>
        </tr>
        <tr>
          <td>Student email</td>
          <td><input type="text" name="email"></input></td>
        </tr>
        <tr>
          <td>Study program</td>
          <td><input type="text" name="program"></input></td>
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
  </body>
</html>
