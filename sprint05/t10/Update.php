<?php
    trait Update {
        function makeBoom() {
            $arr = array(
                parent::makeBoom(),
                "134 7.62mm Minigun",
                "2 x FN F2000 Tacticals",
                "sidewinder\"Ex-Wife\" Self-Guided Missile",
                "24 Shotgun",
                "Milkor MGL 40mm Grenade Launcher"
            );
            return $arr;
        }
    }

?>