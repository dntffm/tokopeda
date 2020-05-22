<?php
    $totalBerat = 0;
    for ($i=0; $i < count($_SESSION["cart"]) ; $i++) { 
        $totalBerat += $_SESSION["cart"][$i]["weight"];
    }

    var_dump($_SESSION["cart"]);
?>
<!-- checkout-area start -->
<div class="checkout-area mt-5 pt-130 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form action="#" method="post">
                    <div class="checkbox-form">
                        <h3>Detail Penerima</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Nama Penerima <span class="required">*</span></label>
                                    <input type="text" placeholder="" required>
                                    <input type="hidden" id="berat" placeholder=""  value="<?=$totalBerat;?>">
                                </div>
                            </div>
                            <?php
                                /* var_dump($data["provinsi"]);  */   
                            ?>
                            
                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Provinsi<span class="required">*</span></label>
                                    <select id="provinsi" name="provinsi">
                                               
                                        <?php
                                        echo "<option>Pilih Provinsi</option>";
                                            for ($i=0; $i < count($data['provinsi']); $i++) { ?>
                                                <option value="<?=$data['provinsi'][$i]['province_id']?>"><?=$data['provinsi'][$i]['province']?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Kota<span class="required">*</span></label>
                                    <select id="kabupaten"> 
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Kurir<span class="required">*</span></label>
                                    <select id="kurir" required>
                                            <option value="kuris">Pilih Kurir</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">Pos Indonesia</option>
                                            <option value="tiki">TIKI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Kode Pos<span class="required">*</span></label>
                                    <input type="text" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="order-notes">
                                    <div class="checkout-form-list mrg-nn">
                                        <label>Detail Alamat <span class="required">*</span></label>
                                    <textarea name="detail-alamat" id="" cols="30" rows="30" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="order-notes">
                                    <div class="checkout-form-list mrg-nn">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10"
                                            placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <p>*Lengkapi data disamping terlebih dahulu sebelum checkout</p>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $subtotal = 0; 
                                foreach ($_SESSION["cart"] as $product) :  
                                    $price = $product["product_price"];
                                    $price = str_replace('.','',$price);
                                    $price = (int) $price;
                            ?>
                                
                                <tr class="cart_item">
                                    <td class="product-name">
                                      <?= $product["product_name"] ?> <strong class="product-quantity"> × <?=$product["qty"]?></strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">Rp.<?=$product["product_price"]?></span>
                                    </td>
                                </tr>
                            <?php $subtotal+=$price; endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th><strong>Cart Subtotal</strong></th>
                                    <td>
                                        <strong>
                                            <span class="amount" id="subtotal">Rp.<?=number_format($subtotal,0,".",".");?></span>
                                        </strong>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Ongkos Kirim</th>
                                    <td><span class="amount" id="ongkir"></span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount" id="totalorder"></span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method mt-40">
                        <div class="payment-accordion">
                            <div class="panel-group" id="faq">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true"
                                                data-parent="#faq" href="#payment-1">Direct Bank Transfer.</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a class="collapsed" data-toggle="collapse"
                                                aria-expanded="false" data-parent="#faq" href="#payment-2">Cheque
                                                Payment</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><a class="collapsed" data-toggle="collapse"
                                                aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a>
                                        </h5>
                                    </div>
                                    <div id="payment-3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order won’t be shipped until the funds
                                                have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 order-button-payment">
                                    <input type="submit" id="submit" value="Place order" />
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->
		<!-- all js here -->
        
        <script src="<?= BASE_URL ?>/assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/popper.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/isotope.pkgd.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/jquery.counterup.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/waypoints.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/checkout.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/owl.carousel.min.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/plugins.js"></script>
        <script src="<?= BASE_URL ?>/assets/js/main.js"></script>
    </body>
</html>