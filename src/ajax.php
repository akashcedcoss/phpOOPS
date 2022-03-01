<?php

use App\Cart;

session_start();
// session_destroy();
require("vendor/autoload.php");
include 'config.php';
include 'functions.php';


if(isset($_POST['action']) && $_POST['action'] == 'onload'){
    $cartData = isset($_SESSION['cart'])?$_SESSION['cart']:array();
    $cart = new Cart($cartData);
    $_SESSION['cart'] = $cart->getCart();
    if (!count($_SESSION['cart'][0]) == 0){
        echo json_encode($_SESSION['cart']);
    }else{
        echo json_encode('');
    }
}

if(isset($_POST['action']) && ($_POST["action"]) == "add"){

    $prodObj = getProduct($products, $_POST['id']);
    $cartData = isset($_SESSION['cart'])?$_SESSION['cart']:array();
    $cart = new Cart($cartData);

    $cart->addToCart($prodObj);
    $returnedCart = $cart->getCart();
    $_SESSION['cart'] = $returnedCart;
    echo json_encode($_SESSION['cart']);
}

if(isset($_POST['del_id'])){
    // array_splice($_SESSION['cart'], $_POST['del_id'], 1);
    $cartData = isset($_SESSION['cart'])?$_SESSION['cart']:array();
    $cart = new Cart($cartData);

    $cart->removeProduct($_POST['del_id']);

    $_SESSION['cart'] = $cart->getCart();

    echo json_encode($_SESSION['cart']);
}

//Empty Cart
if(isset($_POST['emptyCart'])){
    $cartData = isset($_SESSION['cart'])?$_SESSION['cart']:array();
    $cart = new Cart($cartData);

    $cart->emptyCart();
    $_SESSION['cart'] = $cart->getCart();
    echo json_encode($_SESSION['cart']);
}

//Update Quantity
if(isset($_POST['updateInd'])){
    $cartData = isset($_SESSION['cart'])?$_SESSION['cart']:array();
    $cart = new Cart($cartData);

    $cart->updateManually($_POST['updateInd'], $_POST['qty']);
    $_SESSION['cart'] = $cart->getCart();

    echo json_encode($_SESSION['cart']);
}
