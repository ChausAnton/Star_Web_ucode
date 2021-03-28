<?php
    require_once("EatException.php");
    require_once("Ingestion.php");
    require_once("Product.php");

    class Ingestion {
        public $id = 0;
        public $meal_type = ['breakfast', 'lunch', 'dinner'];
        public $products = [];

        function ___construct($meal_type, $day_of_diet) {
            if(array_search($meal_type, $this->meal_type) != true) {
                exit(1);
            }

            $this->meal_type = $meal_type;
            $this->day_of_diet = $day_of_diet;
        }

        function setProduct($product) {
            $this->products[$product->name] = $product;
        }

        function getProducts() {
            return $this->products;
        }

        function get_from_fridge($product) {
            if($this->products[$product]->kcal_per_portion > 200) {
                throw new EatException("No more junk food, dumpling");
            }
        }
    }
?>