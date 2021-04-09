<?php
    class DatabaseConnection {
        public function __construct($host, $port, $username, $password, $database) {
            $this->dbConnent = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->dbConnent->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function __destruct(){
            $this->dbConnent = NULL;
        }

        function getConnectionStatus() {
            if(isset($this->dbConnent)) {
                return true;
            }
            else {
                return false;
            }
        }
    }
?>