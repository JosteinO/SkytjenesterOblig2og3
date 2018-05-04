<html>
<head>
  <link rel="stylesheet" href="Stylesheet.css">
</head>
  <body>
    <footer>
      <?php
      echo "Server IP and Portnumber: ".$_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT']."<br/>".
        "Hostname: ".gethostname();

      ?>
    </footer>
  </body>
</html>
