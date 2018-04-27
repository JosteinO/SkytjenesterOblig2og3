<!DOCTYPE html>
<html>
  <header>
    <title>Update student information</title>
  </header>
  <body>
    <form action="DoUpdate.php" method="POST">
      <table>
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
  </body>
</html>
