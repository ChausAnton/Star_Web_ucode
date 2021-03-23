<?php
    include 'index.php';
    function test($str) {
        $obj = new StrFrequencies($str);
        $symbol = $obj->letterFrequencies();
        echo "Letters in " . $str . "\n";
        foreach($symbol as $k => $v) {
            echo "Letter " . $k . " is repeated " . $v . " times\n";
        }

        $symbol = $obj->wordFrequencies();
        echo "Word in " . $str . "\n";
        foreach($symbol as $k => $v) {
            echo "Word " . $k . " is repeated " . $v . " times\n";
        }

        echo "Revers the string: " . $str . "\n";
        echo $obj->reversString() . "\n";
       
    }

    test("Face it, Harley-- you and your Puddin' are kaput!");
    echo("***************\n");
    test("  Test test 123 45 !0 f    HeLlO wOrLd  ");
    echo("***************\n");
    test("");
?>