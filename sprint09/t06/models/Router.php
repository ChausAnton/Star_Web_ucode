<?php
    class Router {
        public $params = array();
        function __construct() {
            foreach($_GET as $i => $v) {
                $this->params[$i] = $v;
            }
        }

        function callControllerAction($action) {
            if($action == "Sign Up") {
                $conn = new SignUp("users", $_POST['login'], $_POST['password'], $_POST['password2'], $_POST['full_name'], $_POST['email']);
                if($conn->save()) {
                    echo '<span class="success">Sign up success</span>';   
                }
                else {
                    echo '<span class="fail">Sign up fail</span>';
                }
            }

            if($action == "Remind me password") {
                
                $passRemind = New PasswordReminder("users", $_POST['login']);
                if($passRemind->getPassword()) {
                    echo '<span class="success">Password successfully sent</span>';
                }
                else {
                    echo '<span class="fail">Ohh, something went wrong, retry later</span>';
                }
            }

        }

        function callController($action) {

            if(isset($_SESSION['admin']) && isset($_SESSION['password']) && isset($_SESSION['login']) &&
                $action != "Sign out") {
                $show = NULL;
                    if($_SESSION['admin'] == 1) {
                        $show = New View("view/templates/admin.html");
                    }
                    else {
                        $show = New View("view/templates/notAdmin.html");
                    }
                    $show->render();
                return;
            }

            if($action == "Sign In") {
                $conn = new SignIn("users", $_POST['login'], $_POST['password']);
                if($conn->SignInFunc()) {
                    $show = NULL;
                    if($conn->getAdmin()) {
                        $show = New View("view/templates/admin.html");
                    }
                    else {
                        $show = New View("view/templates/notAdmin.html");
                    }
                    $show->render();
                }
                else {
                    echo '<span class="fail">Sign in fail</span><br>';
                }
            }

            if($action == "Sign out") {
                $_SESSION['admin'] = NULL;
                $_SESSION['password'] = NULL;
                $_SESSION['login'] = NULL;
                $show = New View("view/templates/signIn.html");
                $show->render();
            }

            if($action == "reminderPage") {
                $show = New View("view/templates/passwordReminder.html");
                $show->render();
            }

            if($action == "signInPage") {
                $show = New View("view/templates/signIn.html");
                $show->render();
            }

            if($action == "signUpPage") {
                $show = New View("view/templates/signUp.html");
                $show->render();
            }

        }        

        function printParameters() {
            $str = NULL;
            foreach($this->params as $i => $v) {
                if($str) {
                    $str .=  "', ";
                }
                $str .= "'" . $i . "': '" . $v;
            }
            
            $str = "{" . $str . "}";
            echo $str;
        }
    }
?>