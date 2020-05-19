<?php
  
?>


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
                                <th class="product-quantity">total</th>
                                <th class="product-subtotal">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                foreach ($_SESSION["cart"] as $product) :
                                                $price = $product["product_price"];
                                                $price = str_replace('.','',$price);
                                                $price = (int) $price;
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
                                        <form action="" method="post">
                                            <input class="input-text qty text" type="number" step="1" min="0" value="<?=$product["qty"]?>"
                                                title="Qty" size="4">
                                        </form>
                                    </div>
                                </td>
                                <td class="product-subtotal">Rp.
                                    <?= number_format($product["qty"] * $price,0,".","."); ?></td>
                                <td class="product-cart-icon product-subtotal"><a href="#"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cart-shiping-update">
                    <div class="cart-shipping">
                        <a class="btn-style cr-btn" href="<?=BASE_URL?>/produk">
                            <span>continue shopping</span>
                        </a>
                    </div>
                    <div class="update-checkout-cart">
                        <div class="update-cart">
                            <button type="submit" name="update" class="btn-style cr-btn"><span>update</span></button>
                        </div>
                        <div class="update-cart">
                            <a class="btn-style cr-btn" href="#">
                                <span>checkout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>