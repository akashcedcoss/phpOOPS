<?php
	/**
 * function to fetch a particular product with a given id
 *
 * @param [type] $products
 * @param [type] $id
 * @return void
 */
function getProduct($products, $id) {
    for ($i = 0; $i < count($products); $i++) {
        if ($id == $products[$i]['id']){
            return $products[$i];
        }
    }
}
?>