<?php
ob_start();
//include header.php file
include ('header.php');
?>

<?php
//include banner area
include ('Template/_banner-area.php');

//include top sale
include ('Template/_top-sale.php');

//include special price
include ('Template/_special-price.php');

//include banner adds
include ('Template/_banner-adds.php');

//include new phones
include ('Template/_new-phones.php');

//include new phones
include ('Template/_blogs.php');
?>

<?php
//include footer.php file
include ('footer.php');
?>
