<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedRecord = $cart->deleteCart($_POST['item_id']);
    }
    if (isset($_POST['wishlist-submit'])){
        $cart->saveForLater($_POST['item_id']);
    }
    if (isset($_POST['buy-submit'])) {
        $cart->emptyCart($_SESSION['id']);

    }
}
?>
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-roboto font-size-20">Shopping Cart</h5>
        <!--shopping cart items-->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('cart') as $item) :
                if ($item['user_id'] == $_SESSION['id']) :
                    $cartArr = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
                        ?>
                <!--cart item-->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img
                            src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>"
                            style="height: 120px"
                            alt="cart1"
                            class="img-fluid"
                        />
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-roboto font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
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
                        <!--product cart qty-->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0' ?>">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                                    <input
                                        type="text"
                                        name=""
                                        class="qty_input border px-2 w-100 bg-light"
                                        disabled
                                        value="1"
                                        placeholder="1"
                                        data-id="<?php echo $item['item_id'] ?? '0' ?>"
                                    />
                                <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0' ?>">
                                    <i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ?>" name="item_id">
                                <button
                                name="delete-cart-submit"
                                type="submit"
                                class="btn font-roboto text-danger px-3 border-right"
                            >
                                Delete
                            </button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-roboto text-danger">
                                    Save for Later
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-roboto">
                            $<span class="product-price" data-id="<?php echo $item['item_id'] ?? '0' ?>"><?php echo $item['item_price'] ?? "0"; ?></span>
                        </div>
                    </div>
                </div>
                        <?php
                        return $item['item_price'];
                    }, $cartArr);
                endif;
                endforeach;
                ?>
            </div>
            <!--subtotal-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3">
                        <i class="fas fa-check"></i>Your order is ready!
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-roboto font-size-20">Subtotal (<?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <form method="post">
                            <input type="hidden" value="<?php echo $_SESSION['id'] ?? 0 ?>" name="item_id">
                        <button type="submit" name="buy-submit" class="btn btn-warning mt-3">
                            Proceed to Buy
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
