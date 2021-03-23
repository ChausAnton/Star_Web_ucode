<?php
    class HardWoeker {
        function setName($str) {
            $this->name = $str;
        }

        function getName() {
            return $this->name;
        }

        function setAge($age) {
            if($age >= 1 && $age <= 100) {
                $this->age = $age;
                return true;
            }
            return false;
        }

        function getAge() {
            return $this->age;
        }

        function setSalary($salary) {
            if($salary >= 100 && $salary <= 10000) {
                $this->salary = $salary;
                return true;
            }
            return false;
        }

        function getSalary() {
            return $this->salary;
        }

        function toArray() {
            $arr = [];
            $arr['name'] = $this->getName();
            $arr['age'] = $this->getAge();
            $arr['salary'] = $this->getSalary();
            return $arr;
        }
       
    }

?>