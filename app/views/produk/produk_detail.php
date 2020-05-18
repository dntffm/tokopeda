<?php
    $tags = explode(",",$data["product"]["tags"]);
?>

<div class="product-details-area fluid-padding-3 ptb-130">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img-content">
                    <div class="product-details-tab mr-40">
                        <div class="product-details-large tab-content">
                            <div class="tab-pane active" id="pro-details1">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="assets/img/product-details/bl1.jpg">
                                        <img src="<?=BASE_URL?>/assets/img/product/<?=$data["product"]["product_image"]?>"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content">
                    <h2><?=$data["product"]["product_name"]?></h2>
                    <div class="quick-view-rating">
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <i class="fa fa-star reting-color"></i>
                        <span> ( 01 Customer Review )</span>
                        <p>Stok : <?=$data["product"]["stock"]?></p>
                    </div>
                    <div class="product-price">
                        <span style="color:black">Rp.<?=$data["product"]["product_price"]?></span>
                    </div>
                    <div class="product-overview">
                        <h5 class="pd-sub-title">Deskripsi Produk</h5>
                        <p><?=$data["product"]["description"]?></p>
                    </div>
                    <div class="product-categories">
                        <h5 class="pd-sub-title">Kategori</h5>
                        <ul>
                            <?php foreach($tags as $tag): ?>
                            <li><a href="#"><?=$tag?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="quickview-plus-minus">
                        <div class="cart-plus-minus">
                            <input type="text" data-max="<?=$data["product"]["stock"]?>" value="0" name="qtybutton"
                                class="cart-plus-minus-box">
                        </div>
                        <div class="quickview-btn-cart">
                            <a class="btn-style cr-btn" href="#"><span>add to cart</span></a>
                        </div>
                        <div class="quickview-btn-wishlist">
                            <a class="btn-hover cr-btn" href="#"><span><i
                                        class="icofont icofont-heart-alt"></i></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>