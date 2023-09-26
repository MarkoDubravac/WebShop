<!--product-->
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['cart_submit'])) {
        $cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item):
    if($item['item_id'] == $item_id):
?>
<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img
                    src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>"
                    alt="product"
                    class="img-fluid"
                    style="height: 400px; display: block; margin: 0 auto;"
                />
                <div class="form-row row pt-4 font-size-16 font-rale">
                    <div class="col">
                        <a href="./cart.php">
                        <button type="submit" class="btn btn-danger form-control">
                            Go To Cart
                        </button>
                        </a>
                    </div>
                    <div class="col">
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? "1"; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?? "1" ?>">
                        <?php
                        if (in_array($item['item_id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                            echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">
                                In The Cart
                            </button>';

                        } else {
                            echo '<button type="submit" name="cart_submit" class="btn btn-warning font-size-16 form-control">
                                Add to cart
                            </button>';

                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-rale font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                <small>By <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <?php if ($i <= $item['item_rating']) : ?>
                                <span><i class="fas fa-star"></i></span>
                            <?php else : ?>
                                <span><i class="far fa-star"></i></span>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
                <hr class="m-0" />
                <h5 class="font-rale font-size-20 pt-4">
                    Price: <span>$<?php echo $item['item_price'] ?? "0"; ?></span>
                </h5>
                <div class="col-6">
                    <div class="qty d-flex">
                        <h6 class="font-rale">Quantity:</h6>
                        <div class="px-4 d-flex font-rale">
                            <button class="qty-up border bg-light" data-id="pro1">
                                <i class="fas fa-angle-up"></i>
                            </button>
                                <input
                                    type="text"
                                    name=""
                                    class="qty_input border w-50 bg-light"
                                    disabled
                                    value="1"
                                    placeholder="1"
                                    data-id="pro1"
                                />
                            <button class="qty-down border bg-light" data-id="pro1">
                                <i class="fas fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-6" style="text-align: justify">
                    <h6 class="font-rale">Product Description</h6>
                    <hr />
                    <p class="font-rale font-size-14"><?php echo $item['item_description'] ?? "Unknown"; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
endif;
endforeach;
?>