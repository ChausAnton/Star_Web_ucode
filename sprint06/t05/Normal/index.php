<?php 
    namespace Space\Normal;
    use \DateTime;

    function calculate_time() {
        $given = new DateTime("1939-01-01");
        $now = new DateTime("now");

        $res = $given->diff($now);

        return $res;
    }

?>