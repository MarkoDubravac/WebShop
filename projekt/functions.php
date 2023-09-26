<?php
use database\Cart;
use database\DBController;
use database\Product;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require('database/DBController.php');

require('database/Product.php');

require ('database/Cart.php');

$db = new DBController();

$product = new Product($db);

$product->getData();

$product_shuffle = $product->getData();

$cart = new Cart($db);

$filteredCart = array();

if(isset($_SESSION) && isset($_SESSION['id'])):
foreach ($product->getData('cart') as $item) :
    if (isset($item['user_id']) && $item['user_id'] == $_SESSION['id']) :
        $filteredCart[] = $item;
    endif;
    endforeach;
    endif;




