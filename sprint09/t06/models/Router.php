<?php
    class Router {
        public $params = array();
        function __construct() {
            foreach($_GET as $i => $v) {
                $this->params[$i] = $v;
            }
        }

        function callController($action) {
            if($action == "SignUp") {
                $conn = new SignUp("users", $_POST['login'], $_POST['password'], $_POST['password2'], $_POST['full_name'], $_POST['email']);
                if($conn->save()) {
                }
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