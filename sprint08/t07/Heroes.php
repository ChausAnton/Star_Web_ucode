<?php
    include "Model.php";

    class Heroes extends Model{
        public $id = null;
        public $name;
        public $description;
        public $race;
        public $class_role;

        public function __construct() {
            parent::__construct("heroes");
        }

        function find($id) {
            if($this->dbNewC->getConnectionStatus()) {
                $newTable = $this->dbNewC->dbConnent->query("SELECT * FROM $this->table WHERE id=$id");
                $array = $newTable->fetch(PDO::FETCH_ASSOC);
                $this->id = $array['id'];
                $this->name = $array['name'];
                $this->description = $array['description'];
                $this->race = $array['race'];
                $this->class_role = $array['class_role'];
            }
        }

        function save() {
            if ($this->dbNewC->getConnectionStatus()) {
                $newTable = $this->dbNewC->dbConnent->query("SELECT id, name FROM " . $this->table . " WHERE id = " . $this->id . ";");
                $array = $newTable->fetch(PDO::FETCH_ASSOC);
                $sqlReq = "";
                if ($array["id"]) {
                    $sqlReq = "UPDATE heroes SET id=:id, name=:name, description=:description, race=:race, class_role=:class_role  WHERE id=:id";
                }
                else {
                    $sqlReq = "INSERT INTO `heroes` (id, name, description, race, class_role) VALUES (:id, :name, :description, :race, :class_role)";
                }
                $stmt = $this->dbNewC->dbConnent->prepare($sqlReq);
                $stmt->bindParam(":id", $this->id);
                $stmt->bindParam(":name", $this->name);
                $stmt->bindParam(":description", $this->description);
                $stmt->bindParam(":race", $this->race);
                $stmt->bindParam(":class_role", $this->class_role);
                $stmt->execute();
            }
        }

        function delete(){
            if($this->dbNewC->getConnectionStatus()) {
                $newTable = $this->dbNewC->dbConnent->query("SELECT id FROM " . $this->table . " WHERE id = " . $this->id . ";");
                $array = $newTable->fetch(PDO::FETCH_ASSOC);
                if($array['id']) {
                    $sql = $this->dbNewC->dbConnent->prepare("DELETE FROM $this->table WHERE id=$this->id;");
                    $sql->execute();
                    $this->id = NULL;
                    $this->name = NULL;
                    $this->description = NULL;
                    $this->race = NULL;
                    $this->class_role = NULL;
                }
            }
        }
    }

?>