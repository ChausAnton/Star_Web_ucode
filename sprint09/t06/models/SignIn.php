<?php

    class SignIn extends Model {
        public $id = NULL;
        public function __construct($tabel_name, $login, $password) {
            parent::__construct($tabel_name);
            $this->login = trim($login);
            $this->password = trim($password);
        }

        function SignInFunc() {
            $newTable = $this->dbNewC->dbConnent->query("SELECT password, admin FROM " . $this->table . " WHERE login = '" . $this->login . "' and password = '" . $this->password . "';");
            $array = $newTable->fetch(PDO::FETCH_ASSOC);
            if($array) {
                return true;
            }
            return false;
        }

        function getAdmin() {
            $newTable = $this->dbNewC->dbConnent->query("SELECT password, admin FROM " . $this->table . " WHERE login = '" . $this->login . "' and password = '" . $this->password . "';");
            $array = $newTable->fetch(PDO::FETCH_ASSOC);
            if($array && $array['admin'] == 1) {
                return true;
            }
            return false;
        }
    }

?>