<!-- Special Price-->
<?php
$brand = array_map(function ($pro){return $pro['item_brand']; }, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['special_price_submit'])) {
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $cart->getCartId($product->getData('cart'));
?>
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div
            id="filters"
            class="button-group d-flex justify-content-end font-roboto font-size-16"
        >
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
            array_map(function ($brand) {
                printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
            }, $unique);
            ?>
        </div>
        <div class="grid">
            <?php array_map(function ($item) use($in_cart)  {?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>">
                <div class="item py-2" style="width: 200px">
                    <div class="product font-rale" style="height: 360px;">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"
                        ><img
                                src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>"
                                alt="product11"
                                class="img-fluid"
                                style="height: 200px; display: block; margin: 0 auto;"
                            /></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <?php if ($i <= $item['item_rating']) : ?>
                                        <span><i class="fas fa-star"></i></span>
                                    <?php else : ?>
                                        <span><i class="far fa-star"></i></span>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? "0"; ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? "1"; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'],  $in_cart ?? [])) {
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">
                                In The Cart
                            </button>';

                                } else {
                                    echo '<button type="submit" name="new_phones_submit" class="btn btn-warning font-size-12">
                                Add to cart
                            </button>';

                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle)  ?>
        </div>
    </div>
</section>