<?php
    include 'index.php';
    function test($str) {
        $obj = new StrFrequencies($str);
        $symbol = $obj->letterFrequencies();
        echo "Letters in " . $str . "\n";
        foreach($symbol as $k => $v) {
            echo "Letter " . $k . " is repeated " . $v . " times\n";
        }
    }

    test("Face it, Harley--- you and your Puddin' are kaput!")
?>