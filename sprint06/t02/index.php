<?php
    function checkDivision($a=1, $b=60) {
        for($i = $a; $i <= $b; $i++) {
            if($i % 2 == 0) {
                echo("The number " . $i . " is divisible by 2\n");
            }
            else if($i % 3 == 0) {
                echo("The number " . $i . " is divisible by 3\n");
            }
            else if($i % 10 == 0) {
                echo("The number " . $i . " is divisible by 10\n");
            }
            else {
                echo("The number " . $i . " -\n");
            }
        }
    }
?>