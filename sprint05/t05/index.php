<?php
    class StrFrequencies {
        
        function __construct($str) {
            $this->str = $str;
        }

        function letterFrequencies() {
            $temp = count_chars($this->str, 1);
            $res = [];
            foreach($temp as $i => $v) {
                if(ctype_alpha(chr($i))) {
                    $res[ucfirst(chr($i))] = $v;
                }
            }
            ksort($res);

            return $res;
        }
    }

?>