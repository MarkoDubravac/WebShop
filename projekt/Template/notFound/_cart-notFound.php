<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-roboto font-size-20">Shopping Cart</h5>
        <!--shopping cart items-->
        <div class="row">
            <div class="col-sm-9">
                <!--Empty cart-->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-12 text-center py-2">
                    <img src="./assets/empty_cart.png" alt="Empty Cart" class="img-fluid" style="height: 200px;">
                    </div>
                </div>

            </div>
            <!--subtotal-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3">
                        <i class="fas fa-check"></i>Your order is ready!
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-roboto font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3">
                            Proceed to Buy
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
