<?php
    class Overload { 
        private $store = array();

        public function __set($arraykey, $value){
            $this->store[$arraykey] = $value;
        } 
        
        public function __unset($arraykey){
            if(!array_key_exists($arraykey, $this->store)){
                $this->store[$arraykey] = NULL;
            }
        }

        public function __get($arraykey){
            if(array_key_exists($arraykey, $this->store)){
                return $this->store[$arraykey];
            }
            else if (!array_key_exists($arraykey, $this->store)) {
                return "NO DATA";
            }
           
        }

        public function __isset($arraykey){
            if(!array_key_exists($arraykey, $this->store)){
                return $this->store[$arraykey] = "NO SET";
            }
        }

    }
?>