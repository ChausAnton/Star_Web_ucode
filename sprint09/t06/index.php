<?php
    include 'models/PasswordReminder.php';
    include 'models/SignIn.php';
    include 'models/SignUp.php';
    include 'models/connection/DatabaseConnection.php';
    include 'controller/Controller.php';
    include 'view/View.php';

    session_start();

    if(!isset($_SESSION['page'])) {
        $_SESSION['page'] = 'signUp';
    }

    $show = New View('view/templates/' . $_SESSION['page'] . ".html");
    $show->render();

    

?>