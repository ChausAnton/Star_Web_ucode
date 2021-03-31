<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Normal space</title>
    </head>
    <body>
    <?php 
        function calculate_time() {
            $given = new DateTime("1939-01-01");
            $now = new DateTime("now");

            $res = $given->diff($now);

            return $res;
        }
        $time = calculate_time();
        echo " <p> In real life you were absent for " . $time->format("%Y") . " years, " .
        $time->format("%m") . " months, " . $time->format("%d") . " days</p>";

    ?>
    </body>
</html>