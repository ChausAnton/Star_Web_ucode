<?php
    class ListAvengerQuotes {
        protected $avengerQuotes = [];

        public function toXML($filename) {
            $file = fopen($filename, "w");
            $xml = new SimpleXMLElement('<document/>');
            foreach($this->avengerQuotes as $v) {
                $xmlChild = $xml->addChild("quote");
                $xmlChild->addChild("id", $v->id);
                $xmlChild->addChild("author", $v->author);
                $xmlChild->addChild("quote", $v->quote);
                $xmlChild->addChild("publishDate", $v->date);

                $xmlPhoto = $xmlChild->addChild("photos");
                foreach($v->photos as $photo)
                    $xmlPhoto->addChild("photo", $photo);

                $xmlComments = $xmlChild->addChild("comments");
                foreach($v->comments as $comment) {
                    $xmlComment = $xmlComments->addChild("comment");
                    $xmlComment->addChild("date", $comment->date);
                    $xmlComment->addChild("text", $comment->comment);
                }
            }
            file_put_contents($filename, $xml->asXML());
            fclose($file);
        }

        public function fromXML($filename) {
            $file = fopen($filename, "r");
            $xmlObj = simplexml_load_file($filename);
            $avengerQuotes = new ListAvengerQuotes();
            foreach($xmlObj->children() as $v) {
                $id = $v->id->__toString();
                $author = $v->author->__toString();
                $quote = $v->quote->__toString();
                $date = $v->date->__toString();

                $photos = [];
                foreach($v->photos as $photo) {
                    array_push($photos, $photo);
                }

                $comments = [];
                foreach($v->comments as $comment) {
                    array_push($comments, $comment);
                }

                $avengerQuote = new AvengerQuote( $id, $author, $quote, $photos);
                $avengerQuote->comments = $comments;
                $avengerQuotes->addAvengerQuotes($avengerQuote);
            }

            fclose($file);
            return $avengerQuotes;
        }

        public function addAvengerQuotes($avengerQuote) {
            array_push($this->avengerQuotes, $avengerQuote);
        }
    }

    
?>