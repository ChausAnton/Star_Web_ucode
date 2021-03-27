<?php
    require_once(__DIR__. "/LLItem.php");

    class LList {
        function __construct() {
            $this->head = NULL;
        }

        function add($value) {
            $node = new LLItem($value);

            if($this->head == NULL) {
                $this->head = $node;
                return 0;
            }

            $cur = $this->head;

            while($cur->next) {
                $cur = $cur->next;
            }

            $cur->next = $node;
            return 0;
        }

        function addArr($arr) {
            foreach($arr as $i => $v) {
                $this->add($v);
            }
            return 0;
        }

        function count() {
            $i = 0;
            $cur = $this->head;
            while($cur) {
                $cur = $cur->next;
                $i++;
            }
            return $i;
        }

        function toString() {
            $cur = $this->head;
            while($cur->next) {
                echo $cur->data . ', ';
                $cur = $cur->next;
            }
            echo $cur->data;
            return 0;
        }

        function contains($value) {
            $cur = $this->head;
            while($cur) {
                if($cur->data == $value) {
                    return true;
                }
                $cur = $cur->next;
            }
            return false;
        }

        function getFirs() {
            return $this->head;
        }

        function getLast() {
            $cur = $this->head;
            while($cur->next) {
                $cur = $cur->next;
            }
            return $cur;
        }

        function remove($value) {
            if($this->head->data == $value) {
                $this->head = $this->head->next;
                return 1;
            }

            $cur = $this->head;
            while($cur->next->data != $value && $cur) {
                $cur = $cur->next;
            }

            if($cur->next->data == $value) {
                $cur->next = $cur->next->next;
                return 1;
            }
            return 0;
        }

        function removeAll($value) {
            while($this->remove($value) == 1) {}
            return 0;
        }

        function clear() {
            while( $this->getLast()->data != NULL) {
                $this->remove($this->getLast()->data);
            }
            return 0;
        }
    }

    $List = new LList();
    $Arr = [4, 3, 3, 3, 2, 3, 5, 6, 3, 7, 8, 7, 4, 4];
    $List->addArr($Arr);
    //$List->clear();
    //$List->remove(3);
    //$List->removeAll(4);
    //$List1 = $List->getFirs();
    //echo $List1->data;

    //$List2 = $List->getLast();
    //echo $List2->data;
    //$List->contains(7)
    //$List->toString();
    /*$List->add(4);
    $List->add(3);
    $List->add(2);*/
    //echo $List->head->next->data;
    //echo $List->count();
?>