<!DOCTYPE html>
<html>
  <head>
    <title>Retrieve Info</title>
  </head>
  
  <body>
      <?php
        $db = mysqli_connect("10.10.2.5", "dats20", "passord", "studentinfo");
        $info = array();
      ?>
    <form method="post">
        <input type="submit" name="retrieve" value="Retrieve all the data!"></input><br>
        <?php
            if(isset($_POST["retrieve"])){
                $sql1 = "SELECT * FROM students";
                $db->query($sql1);
                
            }
        ?>
    </form>
  </body>
</html>
