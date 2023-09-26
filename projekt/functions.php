<?php
//require MySql Con
use database\Cart;
use database\DBController;
use database\Product;

require('database/DBController.php');

require('database/Product.php');

require ('database/Cart.php');

$db = new DBController();

$product = new Product($db);

$product->getData();

$product_shuffle = $product->getData();

$cart = new Cart($db);





