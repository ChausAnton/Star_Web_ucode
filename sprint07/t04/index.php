<?php
    session_start();
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
            if(isset($_POST['Create_file']) && isset($_POST['file_name'])) {
                $file = new File("tmp/" . $_POST['file_name']);
                $file->write($_POST['content']);
            }
        ?>
    </from>
    <form action="" mathod="POST">
        <h2>List of files:</h2>
        <?php
            $_SESSION['file_array'] = new FilesList("tmp");
            echo $_SESSION['file_array']->toList();
        ?>
        <h2>Selected file:</h2>
        <input type="submit" value="Deleate file" name="Delete_file">
        <?php
            if(isset($_POST['Delete_file']) && isset($_GET["file"])) {
                unlink("tmp/" . $_GET["file"]);
                unset($_POST["Delete_file-file"]);
                unset($_GET["file"]);
                echo '<script>window.location = window.location.href.split("?")[0];</script>';
            }
        ?>
        <?php
            $allow_url_fopen = 1;
            if(isset($_GET["file"])) {
                $file_out = new File("tmp/" . $_GET['file']);
                echo "<br>" . $file_out->toList();
            }
        ?>
    </form>
</body>
</html>