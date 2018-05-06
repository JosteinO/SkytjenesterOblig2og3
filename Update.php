<!DOCTYPE html>
<html>
<head>
  <title>Update student information</title>
</head>
<div id="container">
<body>
  <div id="header">
    <h2>Update student information</h2>
  </div>
  <div id="body">
    <p>Type inn the student ID of the student you want to edit.</p>
    <table>
    <form action="Update2.php" method="get">
      <tr>
        <td>Student id</td>
      <td><input type="text" name="SID"></td>
      <td><input type="submit" name="submit"></td>
    </form>
  </table>
  </div>

  <div id="footer">
    <?php
    include "Footer.php";
    ?>
  </div>
</body>
</div>
</html>
