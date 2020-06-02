<?php
    if(isset($_SESSION["cart"])) {
        $totalBerat = 0;
        for ($i=0; $i < count($_SESSION["cart"]) ; $i++) { 
            $totalBerat += $_SESSION["cart"][$i]["weight"] * $_SESSION["cart"][$i]["qty"];
        }
    }
?>
<!-- checkout-area start -->
<form action="<?=BASE_URL?>/cart/proceedorder" method="post">
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
                                        <input type="text" name="namapenerima" placeholder="" required>
                                        <input type="hidden" id="berat" placeholder="" value="<?=$totalBerat;?>">
                                    </div>
                                </div>
                               

                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Provinsi<span class="required">*</span></label>
                                        <select id="provinsi" name="provinsi">

                                        <?php
                                            if(isset($data["provinsi"])){
                                                echo "<option>Pilih Provinsi</option>";
                                                for ($i=0; $i < count($data['provinsi']); $i++) { ?>
                                                <option value="<?=$data['provinsi'][$i]['province_id']?>">
                                                    <?=$data['provinsi'][$i]['province']?></option>
                                                <?php
                                                }
                                            }
                                            
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Kota<span class="required">*</span></label>
                                        <select id="kabupaten" name="kabupaten">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Kurir<span class="required">*</span></label>
                                        <select id="kurir" name="kurir" required>
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
                                        <input type="text" name="kodepos" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="order-notes">
                                        <div class="checkout-form-list mrg-nn">
                                            <label>Detail Alamat <span class="required">*</span></label>
                                            <textarea name="detail-alamat" name="detail_alamat" id="" cols="30"
                                                rows="30" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Nomer HP <span class="required">*</span></label>
                                        <input type="text" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="order-notes">
                                        <div class="checkout-form-list mrg-nn">
                                            <label>Catatan</label>
                                            <textarea id="checkout-mess" name="catatan" cols="30" rows="10"
                                                placeholder="Cth: Rumah Cat Hijau dengan Pagar Hitam."
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="your-order">
                        <h3>Pembelian anda</h3>
                        <p>*Lengkapi data terlebih dahulu sebelum bayar</p>
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
                                    if(isset($_SESSION["cart"])) {
                                        $subtotal = 0; 
                                        foreach ($_SESSION["cart"] as $product) :  
                                            $price = $product["product_price"];
                                            $price = str_replace('.','',$price);
                                            $price = (int) $price * $product["qty"];
                            ?>

                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <?= $product["product_name"] ?> <strong class="product-quantity"> ×
                                                <?=$product["qty"]?></strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">Rp.<?=$product["product_price"]?></span>
                                        </td>
                                    </tr>
                                    <?php 
                                        $subtotal+=$price; 
                                        endforeach; 
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th><strong>Total</strong></th>
                                        <td>
                                            <strong>
                                                <span class="amount"
                                                    id="subtotal">Rp.<?=number_format($subtotal,0,".",".");?></span>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th><strong>Total + Ongkir</strong></th>
                                        <td>
                                            <strong>
                                                <span class="amount"
                                                    id="total"></span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method mt-40">
                            <div class="order-button-payment">
                                <button type="submit" name="checkout">Bayar Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

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