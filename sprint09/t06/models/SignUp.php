<?php
    class SignUp extends Model{
        public $id = NULL;
        public function __construct($tabel_name, $login, $password, $password2, $full_name, $email) {
            parent::__construct($tabel_name);
            $this->login = trim($login);
            $this->password = trim($password);
            $this->password2 = trim($password2);
            $this->full_name = trim($full_name);
            $this->email = trim($email);
        }

        function checkdata() {
            $newTable = $this->dbNewC->dbConnent->query("SELECT id, login FROM " . $this->table . " WHERE login = '" . $this->login . "' or " . " email_address = '" . $this->email . "';");
            $array = $newTable->fetch(PDO::FETCH_ASSOC);
            if($array) {
                return false;
            }
            else if($this->password != $this->password2) {
                return false;
            }
            return true;
        }

        function save() {

            if ($this->dbNewC->getConnectionStatus() && $this->checkdata()) {
                $newTable = $this->dbNewC->dbConnent->query("SELECT id, login FROM " . $this->table . " WHERE login = '" . $this->login . "';");
                $array = $newTable->fetch(PDO::FETCH_ASSOC);
                $sqlReq = "INSERT INTO `$this->table` (login, admin, password, full_name, email_address) VALUES (:login, false, :password, :full_name, :email)";
                $stmt = $this->dbNewC->dbConnent->prepare($sqlReq);
                $stmt->bindParam(":login", $this->login);
                $stmt->bindParam(":password", $this->password);
                $stmt->bindParam(":full_name", $this->full_name);
                $stmt->bindParam(":email", $this->email);
                $stmt->execute();
                return true;
            }
            return false;
        }
    }

?>