<?php
    include '../view/View.php';

    interface ControllerInterface {
        function __construct();
        function execute();
    }

    class Main implements ControllerInterface {
        function __construct() {
            $this->content = New View('../view/templates/main.html');
        }

        function execute() {
            $this->content->render();
        }
    }

    $test = New Main();
    $test->execute();
?>