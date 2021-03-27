<?php
    class Avenger {
        public $name = "";
        public $alias = "";
        public $gender = "";
        public $age = 0;
        public $power = [];

        function __construct($name, $alias, $gender, $age, $power) {
            $this->name = $name;
            $this->alias = $alias;
            $this->gender = $gender;
            $this->age = $age;
            $this->power = $power;
        }

        function __toString() {
            return "name: $this->name\ngender: $this->gender\nage: $this->age\n";
        }

        function __invoke() {
            echo strtoupper("$this->alias\n");
            foreach($this->power as $i => $v) {
                echo "$v\n";
            }
        }
    }
?>