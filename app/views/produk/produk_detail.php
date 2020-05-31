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
                                    <a href="">
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
                       
                            <div class="container">
                                <div class="row">
                                    <form action="<?=BASE_URL?>/cart/add/<?=$data["product"]["product_id"]?>" method="post">
                                        
                                        <?php if($data["product"]["stock"] > 0) { ?>
                                            <div class="cart-plus-minus">
                                        <input type="text" name="qty" data-max="<?=$data["product"]["stock"]?>" value="1" name="qtybutton"
                                            class="cart-plus-minus-box">
                                        </div>
                                        <button type="submit" name="login" class="mt-2 btn-style cr-btn"><span>Tambah ke keranjang</span></button>
                                        <?php }else{ ?>
                                            <p class="alert alert-danger">Stock Habis</p>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

