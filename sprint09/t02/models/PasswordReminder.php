<?php
    include "Model.php";

    class PasswordReminder extends Model {
        public $id = NULL;
        public function __construct($tabel_name, $login) {
            parent::__construct($tabel_name);
            $this->login = trim($login);
        }

        function getPassword() {
            $newTable = $this->dbNewC->dbConnent->query("SELECT password, email_address, full_name FROM " . $this->table . " WHERE login = '" . $this->login . "';");
            $array = $newTable->fetch(PDO::FETCH_ASSOC);
            if($array && $array['password'] && $array['email_address']) {
                mail($array['email_address'], NULL, "Dear " . $array['full_name'] . ".\nThis is your password remind.\nYour password is: " . $array['password'] . "\nAdvise, in near future change your password.\nGoodbye and good luck");
                return true;
            }
            return false;
        }
    }

?>