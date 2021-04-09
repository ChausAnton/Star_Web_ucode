<?php

    interface ControllerInterface {
        function __construct();
        function execute();
    }

    class Controller implements ControllerInterface {
        function __construct() {
            $this->content = New View('../view/templates/main.html');
        }

        function execute() {
            $this->content->render();
        }
    }
?>