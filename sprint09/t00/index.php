<?php
    include 'connection/DatabaseConnection.php';
    include 'models/TableBase.php';
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
    <form action="" method="POST" class="box_form">
        <input required placeholder="Login" name="login" maxlength="30">
        <input required placeholder="Password" name="password" maxlength="30">
        <input required placeholder="Confirm password" name="password2" maxlength="30">
        <input required placeholder="Full name" name="full_name" maxlength="30">
        <input required placeholder="Email" name="email" maxlength="30">
        <input type="submit" value="Sign up" name="sign_up">
    </from>
    <?php
        if(isset($_POST['sign_up'])) {
            $conn = new TableBase("sword", $_POST['login'], $_POST['password'], $_POST['password2'], $_POST['full_name'], $_POST['email']);
            $conn->save();
        }
    ?>
</body>
</html>