<?php
    namespace App;
    class Cart{
        public $arr;
        public function __construct($cartData){   
            $this->arr = $cartData;
        }
        /**
         * Add to Cartv function
         *
         * @param [type] $product
         * @return void
         */
        public function addToCart($product){
            if (count($this->arr) == 0){
                array_push($this->arr, $product);
            }else{
                if ($this->arrayIncludes($product['id'])){
                    // $prodObj['quantity'] += 1;
                }
                else{
                    array_push($this->arr, $product);
                }
            }
        }
        /**
         * Functionj to check and return if array includes a product with a particular id
         *
         * @param [type] $id
         * @return void
         */
        public function arrayIncludes($id){
            foreach($this->arr as $key=>$value){
                if ($id == $this->arr[$key]['id']){
                    $this->arr[$key]["quantity"] += 1;
                    return true;
                }
            }
            return false;
        }
        /**
         * Fucntion to delete a single product from cart
         *
         * @param [type] $id
         * @return void
         */
        public function removeProduct($id){
            array_splice($this->arr, $id, 1);
        }
        /**
         * Update Quantity Manually
         *
         * @param [type] $id
         * @param [type] $qty
         * @return void
         */
        public function updateManually($id, $qty){
            if ($qty!=0){
                $this->arr[$id]['quantity'] += $qty;
            }
            if ($this->arr[$id]['quantity'] == 0 || $_POST['qty']==0){
                $this->removeProduct($id);
            }
        }
        /**
         * Function to empty cart
         *
         * @return void
         */
        public function emptyCart(){
            $this->arr = [];
        }
        /**
         * Function to return array
         *
         * @return void
         */
        public function getCart(){
            return $this->arr;
        }
    }
?>