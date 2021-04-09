<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Router</h1>
    <?php
        if($_GET) {
            include 'Router.php';
            $router = New Router();
            $router->printParameters();
        }
    ?>
</body>
</html>