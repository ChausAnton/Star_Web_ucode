<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    
    echo $_SERVER["PHP_SELF"] . " <br>";
    echo $_SERVER["argv"] . " <br>";
    echo $_SERVER["SERVER_ADDR"] . " <br>";
    echo $_SERVER["HTTP_HOST"] . " <br>";
    echo $_SERVER["SERVER_PROTOCOL"] . " <br>";
    echo $_SERVER["QUERY_STRING"] . " <br>";
    echo $_SERVER["HTTP_USER_AGENT"] . " <br>";
    echo $_SERVER["REMOTE_ADDR"] . " <br>";
    echo $_SERVER["REQUEST_URI"] . " <br>";
  ?>
</body>
</html>