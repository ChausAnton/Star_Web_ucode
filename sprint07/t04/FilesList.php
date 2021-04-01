<?php
    class FilesList {
        function __construct($path) {
            if(file_exists($path)) {
                $this->files = array_diff(scandir($path), array('.', '..'));
            }
        }

        function toList() {
            $res_string = '';
            foreach($this->files as $i => $v) {
                $res_string = $res_string . '<ul><li><a href="?file=' . $v . '">' . $v . '</a></li></ul>';
            }
            return $res_string;
        }
    } 
?>