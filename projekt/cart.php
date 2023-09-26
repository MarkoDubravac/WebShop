<?php
ob_start();
//include header.php file
include ('header.php');
?>

<?php

//include cart template
count($product->getData('cart')) ? include ('Template/_cart-template.php') : include ('Template/notFound/_cart-notFound.php');


//include wishlist template
include ('Template/_wishlist-template.php');

//include new phones
include ('Template/_new-phones.php');

?>

<?php
//include footer.php file
include ('footer.php');
?>
