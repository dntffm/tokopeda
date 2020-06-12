<?php
/*   echo "<pre>";
  var_dump($_SESSION["cart"]);
  echo "</pre>"; */
?>

<form action="<?=BASE_URL?>/Cart/update" method="post">
    <div class="product-cart-area pt-120 pb-130 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">products</th>
                                    <th class="product-price">products name</th>
                                    <th class="product-name">price</th>
                                    <th class="product-price">quantity</th>
                                    <th class="product-price">weight</th>
                                    <th class="product-quantity">Sub Total</th>
                                    <th class="product-subtotal">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                    if(isset($_SESSION["cart"])) {
                                                    $total = 0;
                                                    $quantity = 0;
                                                    $weights = 0;
                                                    foreach ($_SESSION["cart"] as $product) :
                                                    $price = $product["product_price"];
                                                    $price = str_replace('.','',$price);
                                                    $price = (int) $price;
                                                    $totalPerProduct = number_format($product["qty"] * $price,0,".",".");
                                                    $quantity += $product["qty"];
                                                    $weights += ($product["weight"] * $product["qty"]);
                                                ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="#"><img src="assets/img/cart/4.jpg" alt=""></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#"><?=$product["product_name"]?></a>
                                    </td>
                                    <td class="product-price"><span class="amount">Rp.<?=$product["product_price"]?></span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity-range">                    
                                                <input class="input-text cart-plus-minus-box qty text" name="qty[]" type="number" min="1" max="<?=$product["stock"]?>" value="<?=$product["qty"]?>" size="4">
                                        </div>
                                      
                                    </td>
                                    <td class="product-price"><span class="amount"><?=$product["weight"]?> KG</span>
                                    <td class="product-subtotal">Rp.
                                        <?= $totalPerProduct;  ?></td>
                                    <td class="product-cart-icon product-subtotal">
                                        <a href="<?=BASE_URL?>/Cart/delete/<?=$product["product_id"]?>" onclick="return confirm('Yakin Untuk Hapus ?')"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    $total += ($product["qty"] * $price);
                                    endforeach; 
                                    
                                ?>
                               
                            </tbody>
                            <tfoot style="padding:30px">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-subtotal"><?=$quantity?></th>
                                    <th class="product-subtotal"><?=$weights?> KG</th>
                                    <th class="product-subtotal">Rp.<?=number_format( $total,0,".",".");?></th>
                                </tr>
                            </tfoot>
                                <?php } else {?>
                            <tr>
                                    <td>Belum Ada Transaksi :), Buy some stuff first</td>
                                </tr>
                                <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-shiping-update">
                        <div class="cart-shipping">
                        <a class="btn-style cr-btn" href="<?=BASE_URL?>/Cart/history">
                                <span>Riwayat Belanja</span>
                            </a>
                            <a class="btn-style cr-btn" href="<?=BASE_URL?>/Produk">
                                <span>Lanjut Belanja</span>
                            </a>
                            
                        </div>
                        <div class="update-checkout-cart">
                            <div class="update-cart">
                                <button type="submit" name="update" class="btn-style cr-btn"><span>update</span></button>
                                
                            </div>
                            <div class="update-cart">
                                <?php if(isset($_SESSION["cart"])) : ?>
                                <a class="btn-style cr-btn" href="<?= BASE_URL?>/cart/checkout">
                                    <span>checkout</span>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div><hr><hr>
                </div>
            </div>
        </div>
    </div>
</form>