<?php
    namespace App;
    class Products{
        public $products = array(
            array("id"=>101,"name"=>"Basket Ball","image"=>"basketball.png","price"=>150, "quantity"=>1),
            array("id"=>102,"name"=>"Football","image"=>"football.png","price"=>120, "quantity"=>1),
            array("id"=>103,"name"=>"Soccer","image"=>"soccer.png","price"=>110, "quantity"=>1),
            array("id"=>104,"name"=>"Table Tennis","image"=>"table-tennis.png","price"=>130, "quantity"=>1),
            array("id"=>105,"name"=>"Tennis","image"=>"tennis.png","price"=>100, "quantity"=>1)
        );
        /**
         * Function to return Array of Products
         *
         * @return void
         */
        public function getProducts(){
            return $this->products;
        }
        /**
         * Function for Dynamic Listing of Products
         *
         * @return void
         */
        public function displayProducts()
        {
            foreach ($this->products as $value) {
                echo "<div id='product-" . $value["id"] . "' class='product'>
                    <img src='images/" . $value["image"] . "'>
                    <h3 class='title'><a href='#'>" . $value["name"] . "</a></h3>
                    <span>Price: $" . $value["price"] . "</span>
                    <a class='add-to-cart' href='#' data-pid = " . $value['id'] . ">Add To Cart</a>
                    </div>";
            }
        }
    }
?>