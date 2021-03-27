<?php
    require_once(__DIR__. "/LLItem.php");


    class LinkedListIterator implements Iterator {

        private $var = array();

        public function __construct($array) {

            if (is_array($array)) {

                $this->var = $array;

            }

        }

        public function rewind() {

            reset($this->var);

        }

        public function current() {

            $var = current($this->var);
            return $var;

        }

        public function key() {

            $var = key($this->var);
            return $var;

        }

        public function next() {

            $var = next($this->var);
            return $var;

        }

        public function valid() {

            $key = key($this->var);
            $var = ($key !== NULL && $key !== FALSE);
            return $var;

        }

    }
    

    class LList implements IteratorAggregate {
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

        public function getIterator() {

            $temp = $this->head;

            $tempArr = [];
            $i = 0;

            while($temp != null) {

                $tempArr[$i] = $temp->data;
                $i++;

                $temp = $temp->next;

            }

            $itName = new LinkedListIterator($tempArr);
            return $itName;

        }
    }

   /* function autoload($pClassName){
        include(__DIR__ . "/" . $pClassName . ".php");
    }

    spl_autoload_register("autoload");

    $list = new LList();
    $list->addArr([100, 1, 2, 3, 100, 4, 5, 100]);
    $list->removeAll(100);
    $list->add(10);
    echo  $list->contains(10) . "\n"; // 1
    echo $list->toString() . "\n"; // 1, 2, 3, 4, 5, 10
    $sum = 0;
    $iter = $list->getIterator();
    foreach ($iter as $v)
        $sum += $v;
    echo "$sum\n"; // 25
    $list->clear();
    echo $list->toString() . "\n";*/
?>