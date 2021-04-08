<?php
    abstract class Model {
        public function __construct($table) {
            $this->setTabel($table);
            $this->setConnection();
        }

        function setTabel($table) {
            $this->table = $table;
        }

        function setConnection() {
            $this->dbNewC = new DatabaseConnection('127.0.0.1', null, "anchaus", "securepass", "ucode_web");
        }
    }
?>