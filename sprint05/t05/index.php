<?php
    class StrFrequencies {
        
        function __construct($str) {
            for($i = 0; $i < strlen($str); $i++) { 
                if(ctype_alpha($str[$i]) || $str[$i] == " ") {
                    $this->str = $this->str . $str[$i];
                }
                else {
                    $this->str = $this->str . " ";
                }
            }
        }

        function letterFrequencies() {
            $temp = count_chars(strtolower($this->str), 1);
            $res = [];
            foreach($temp as $i => $v) {
                if(ctype_alpha(chr($i))) {
                    $res[ucfirst(chr($i))] = $v;
                }
            }
            ksort($res);

            return $res;
        }

        function wordFrequencies() {
            $temp_str = "";
            for($i = 0; $i < strlen($this->str); $i++) { 
                if(ctype_alpha($this->str[$i]) || $this->str[$i] == " ") {
                    $temp_str = $temp_str . $this->str[$i];
                }
            }

            $tmp = array_count_values(str_word_count(strtolower($temp_str), 1));
            $res = [];
            foreach($tmp as $i => $v) {
                $res[strtoupper($i)] = $v;
            }
            return $res;
        }

        function reversString() {
            return strrev($this->str);
        }
    }

?>