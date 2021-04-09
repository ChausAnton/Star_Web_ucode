<?php
    include 'connection/DatabaseConnection.php';
    include 'models/SignIn.php';
    session_start();
    if(isset($_POST['sign_out'])) {
        header("Refresh:0");
    }
    if(isset($_POST['sign_in'])) {
        header("Refresh:0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['SignIn']) && $_SESSION['SignIn'] == true) {
            echo '<span class="success">Sign in success</span>';
        }
        else if (isset($_SESSION['SignIn']) && $_SESSION['SignIn'] == false){
            echo '<span class="fail">Sign in fail</span>';
        }
    ?>
    <div <?php if(isset($_SESSION['Sign_in'])) {echo ' hidden';} else {echo ' display';}?>>
        <form action="" method="POST" class="box_form">
            <div class="body_signUP">
                <input placeholder="Login" name="login">
                <input type="password" placeholder="Password" name="password">
                <input type="submit" value="Sign in" name="sign_in">
            </div>
        </form>
    </div>
    <div <?php if(!isset($_SESSION['Sign_in'])) {echo ' hidden';} else {echo ' display';}?>> 
        <form action="" method="POST"  class="box_form">
            <div class="body_signOUT">
                <?php
                    if(isset($_SESSION['admin']) && $_SESSION['admin']) {
                        echo '<span class="Admin">Admin</span>';
                    }
                    else {
                        echo '<span class="Admin">Not Admin</span>';
                    }
                    if(isset($_POST['sign_out'])) {
                        unset($_SESSION['Sign_in']);
                        unset($_SESSION['admin']);
                        unset($_SESSION['SignIn']);
                        session_destroy();
                    }
                ?>
                <input type="submit" value="Sign out" name="sign_out">
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['sign_in'])) {
            $conn = new SignIn("users", $_POST['login'], $_POST['password']);
            if($conn->SignInFunc()) {
                $_SESSION['Sign_in'] = "true";
                $_SESSION['admin'] = $conn->getAdmin();
                $_SESSION['SignIn'] = true;
            }
            else {
                $_SESSION['SignIn'] = false;
            }
        }
    ?>
</body>
</html>