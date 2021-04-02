<?php
    class Note {
        function __construct($name, $importance, $content) {
            $this->name = $name;
            $this->importance = $importance;
            $this->content = $content;
            $this->date = date('Y-m-d H:i:s');
        }
    }
    /*function autoload($pClassName) {
        include(__DIR__. '/' . $pClassName. '.php');
    }
    spl_autoload_register("autoload");
    
    $pad = new NotePad(new Note("test", "low", "some text to test"));
    for($i = 0; $i < 5; $i++) {
        $note = new Note("test" . $i, "low" . $i, "some text to test" . $i);
        $pad->addNote($note);
    }
   
    $s = serialize($note);
    json_encode($s);
    echo "\n\n";
    var_dump(json_decode(json_encode($s)))
    $pad = new NotePad();*/
?>