<?php
    function autoload($pClassName) { include(__DIR__. '/' . $pClassName. '.php'); }
    spl_autoload_register("autoload");
    
    $heroes = new Heroes();
    
    $heroes->find(4);
    
    $heroes->id = 8;
    $heroes->delete();
    
    $heroes->id = 11;
    $heroes->name = "anchaus";
    $heroes->description = "chel";
    $heroes->race = "chel";
    $heroes->class_role = "healer";
    $heroes->save();
?>