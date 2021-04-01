<?php
    function autoload($pClassName) {
        include(__DIR__. '/' . $pClassName. '.php');
    } 
    spl_autoload_register("autoload");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Files</h1>
    <form action="" method="POST">
        <span>File name: <input name="file_name"></span>
        <span>Content: <textarea name="content"></textarea></span>
        <input type="submit" value="Create file" name="Create_file">
        <?php
            
        ?>
    </from>
    <form action="" mathod="POST">
        <h2>List of files:</h2>

        <h2>Selected file:</h2>
    </form>
</body>
</html>