<?php
    include 'HardWoeker.php';
    $bruce = new HardWoeker();

    $bruce->setName("Bruce");
    echo $bruce->getName() . "\n";

    $bruce->setAge(50);
    $bruce->setSalary(1500);
    print_r($bruce->toArray());

    $bruce->setName("Linda");
    $bruce->setAge(140);
    print_r($bruce->toArray());
?>