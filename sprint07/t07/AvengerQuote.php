<?php
    class AvengerQuote {

        public $comments = [];
        function __construct($id, $author, $quote, $photos) {
            $this->id = $id;
            $this->author = $author;
            $this->quote = $quote;
            $this->date = date('Y-m-d');
            $this->photos = $photos;
        }

        public function addComment($comment) {
            array_push($this->comments, new Comment($comment));
        }
        public function setComments($comments) {
            $this->comments = $comments;
        }
    }
?>