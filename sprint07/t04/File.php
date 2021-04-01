<?php
    class File {
        function __construct($file_name) {
            if(!file_exists("tmp")) {
                mkdir("tmp");
            }
            
            $this->file_name = $file_name . ".txt";
            $this->file = fopen($this->file_name, "w");
            fclose($this->file);
        }

        function write($content) {
            if(file_exists($this->file_name)) {
                $this->file = fopen($this->file_name, 'w');
                fwrite($this->file, $content);
                fclose($this->file);
            }
        }

        function toList() {
            if(file_exists($this->file_name)) {
                return file_get_contents($this->file_name, FILE_USE_INCLUDE_PATH);

            }
        }
    }

    function autoload($pClassName) {
        include(__DIR__. '/' . $pClassName. '.php');
    } 
    spl_autoload_register("autoload");

    $file = new File("tmp/tony_stark_characteristic");
    $file->write("volatile, self-obsessed, don't play well with others.");
    echo $file->toList() . "\n";

    $list = new FilesList("tmp");
    echo $list->toList() . "\n"
?>