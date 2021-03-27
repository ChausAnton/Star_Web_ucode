<?php
    class Avenger {
        public $name = "";
        public $alias = "";
        public $gender = "";
        public $age = 0;
        public $power = [];
        public $hp = 0;

        function __construct($name, $alias, $gender, $age, $power, $hp) {
            $this->name = $name;
            $this->alias = $alias;
            $this->gender = $gender;
            $this->age = $age;
            $this->power = $power;
            $this->hp = $hp;
        }
    }

    class Team {
        public $id = 0;
        public $avengers = [];

        function __construct($id, $avengers) {
            $this->id = $id;
            $this->avengers = $avengers;
        }

        function battle($damage) {
            for($i = 0; $i < count($this->avengers); $i++) {
                $this->avengers[$i]->hp -= $damage;
            }

            for($i = 0; $i < count($this->avengers); $i++) {
                if($this->avengers[$i]->hp <= 0) {
                    $i = 0;
                    array_splice($this->avengers, $i, 1);
                }
            }
        }

        function calculate_losses($cloned_team) {
            $temp = count($cloned_team->avengers) - count($this->avengers);
            if($temp == 0) {
                echo "We haven't lost anyone in this battle!\n";
            }
            else {
                echo "In this battle we lost $temp Avenger(s).\n";
            }
        }
    }
?>