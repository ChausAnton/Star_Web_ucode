<?php
    function firstUpper($str) {
        if(!$str) {
            return "";
        }
        
        $str = trim($str);
        $str = strtolower($str);
        $str = ucfirst($str);
        return $str;
    }
?>