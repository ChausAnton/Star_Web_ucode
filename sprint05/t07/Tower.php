<?php

    class Tower extends Building{
        private $elevator;
        private $arc_capacity;
        private $height;

        function setElevator($elevator) {
            $this->elevator = $elevator;
        }
        function hasElevator() {
            return $this->elevator == true ? '+' : '-';
        }

        function setArcCapacity($arc_capacity) {
            $this->arc_capacity = $arc_capacity;
        }
        function getArcCapacity() {
            return $this->arc_capacity;
        }

        function setHeight($height) {
            $this->height = $height;
        }
        function getHeight() {
            return $this->height;
        }

        public function getFloorHeight() : float {
            return $this->getHeight() / $this->getFloors();
        }

        public function toString() : string {
            $props = ["Elevator: " . $this->hasElevator(),
            "Arc reactor capacity : " . $this->getArcCapacity(),
            "Height : " . $this->getHeight(),
            "Floor height : " . $this->getFloorHeight()
            ];

            $str = parent::toString();

            foreach ($props as $p)
                $str = $str . $p . "\n";
            return $str;
        }
    }

?>