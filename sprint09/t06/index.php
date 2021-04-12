<?php
    include 'models/PasswordReminder.php';
    include 'models/SignIn.php';
    include 'models/SignUp.php';
    include 'models/Router.php';
    include 'models/connection/DatabaseConnection.php';
    include 'controller/Controller.php';
    include 'view/View.php';

    session_start();

    if(!isset($_SESSION['page'])) {
        $_SESSION['page'] = 'signIn';
    }

    $show = New View('view/templates/' . $_SESSION['page'] . ".html");
    $show->render();
    
    if(isset($_GET['moveto'])) {
        $router = new Router();
        $router->callController($_GET['moveto']);
    }
    if(isset($_POST['moveto'])) {
        $router = new Router();
        $router->callController($_POST['moveto']);
    }
?>