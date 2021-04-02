<?php
    class NotePad {
        public $notes = array();
        public $serializeNotes = array();

        function __construct() {
            $this->notes = array();
            $this->serializeNotes = array();
        }

        function addNote($note) {
            if($this->notes) {
                array_push($this->notes, $note);
            }
            else {
                $this->notes = [$note];
            }
        }

        function deleteElement($name) {
            $index = array_search($name, $this->notes);
            array_splice($this->notes, $index, 1);
            $this->rewriteSerializeNote();
        }

        private function rewriteSerializeNote() {
            unset($this->serializeNotes);
            foreach($this->notes as $note) {
                $this->addSerializeNote($note);
            }
        }

        function addSerializeNote($note) {
            if($this->serializeNotes) {
                array_push($this->serializeNotes, serialize($note));
            }
            else {
                $this->serializeNotes = [serialize($note)];
            }
        }

        function unserializeArray() {
            foreach($this->serializeNotes as $v) {
                $this->addNote(unserialize($v));
            }
        }

    }
?>