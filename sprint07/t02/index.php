<?php
    session_start();
    if(isset($_POST['Save'])) {
        header("Refresh:0");
    }
    if(isset($_POST['Clear'])) {
        header("Refresh:0");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
                display: none;
        }
        .display {
            display: flex;
        }
    </style>
</head>
<body>
    <h1>Password</h1>
    <?php 
        if(isset($_POST['Check']) && isset($_POST['guess'])) {
            if(crypt($_POST['guess'], $_SESSION['salt_session']) == $_SESSION['data']) {
                echo '<p style="color:green;">Hacked!</p>';
                unset($_SESSION['data']);
                unset($_SESSION['salt_session']);
                session_destroy();
            }
            else {
                echo '<p style="color:red;">Access denied!</p>';
            }
        }
    ?>
    <form action="" method="post" <?php if(isset($_SESSION['data'])) {echo ' hidden';} else {echo ' display';}?>>
        
        <span>Password not saved at session.</span><br>
        <span>Password for saving to session</span><input plaseholder="Password to session" name="password"><br>
        <span>Salt for saving to session_destroy</span><input plaseholder="Salt to session" name="salt"><br>
        <input type="submit" value="Save" name="Save">
    </form>
    <form action="" method="post" <?php if(!isset($_SESSION['data'])) {echo ' hidden';} else {echo ' display';}?>>
        <span>Password saved at session.</span><br>
        <span>Hash is <span><?php
            echo $_SESSION['data'];
        ?></span>.</span><br>
        <span>Try to guess</span><input plaseholder="Salt to session" name="guess"><input type="submit" value="Check password" name="Check"><br>
        <input type="submit" value="Clear" name="Clear">
    </form>

    <?php
        if(isset($_POST['Save']) && isset($_POST['password']) && isset($_POST['salt'])) {
            $_SESSION['data'] = crypt($_POST['password'], $_POST['salt']);
            $_SESSION['salt_session'] = $_POST['salt'];
        }
        if(isset($_POST['Clear'])) {
            session_destroy();
        }
    ?>
</body>
</html>