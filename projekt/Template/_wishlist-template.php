<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedRecord = $cart->deleteCart($_POST['item_id'], 'wishlist');
    }
    if (isset($_POST['cart-submit'])){
        $cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
    }
}
?>
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-roboto font-size-20">Wishlist</h5>
        <!--shopping cart items-->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('wishlist') as $item) :
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
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ?>" name="item_id">
                                        <button
                                            name="delete-cart-submit"
                                            type="submit"
                                            class="btn font-roboto text-danger pl-0 pr-3 border-right"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0 ?>" name="item_id">
                                        <button type="submit" name="cart-submit" class="btn font-roboto text-danger">
                                            Add To Cart
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
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
