<?php
    class Router {
        public $params = array();
        function __construct() {
            foreach($_GET as $i => $v) {
                $this->params[$i] = $v;
            }
        }

        function printParameters() {
            $str = NULL;
            foreach($this->params as $i => $v) {
                if($str) {
                    $str .=  "', ";
                }
                $str .= "'" . $i . "': '" . $v;
            }
            
            $str = "{" . $str . "}";
            echo $str;
        }
    }
?>