<?php
    class Comment {
        public function __construct($comment) {
            $this->date = date('Y-m-d');
            $this->comment = $comment;
        }
        public function getDate() {
            return $this->date;
        }
        public function getcomment(){
            return $this->comment;
        }
    }
?>