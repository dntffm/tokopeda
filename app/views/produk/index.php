<?php
    
?>

<div class="breadcrumb-area pt-255 pb-170" style="background-image: url(assets/img/banner/banner-4.jpg)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2></h2>
            <ul>
                <li>
                    <a href="#">home</a>
                </li>
                <li>Produk</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-wrapper fluid-padding-2 pt-120 pb-150">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-sidebar-area pr-60">
                    <div class="sidebar-widget pb-55">
                        <h3 class="sidebar-widget">Search Products</h3>
                        <div class="sidebar-search">
                            <form action="#">
                                <input type="text" placeholder="Search Products...">
                                <button><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="sidebar-widget pb-50">
                        <h3 class="sidebar-widget">Kategori</h3>
                        <div class="widget-categories">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                            </ul>
                        </div>
                    </div> -->
                   <!--  <div class="sidebar-widget mb-55">
                        <h3 class="sidebar-widget">harga</h3>
                        <div class="price_filter mr-60">
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <label>price : </label>
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div> -->
                    
                    
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget">best seller</h3>
                        <div class="best-seller">
                            <div class="single-best-seller">
                                <div class="best-seller-img">
                                    <a href="#"><img src="assets/img/Gunung/4.jpg" alt=""
                                            style="width:100px; height:100px"></a>
                                </div>
                                <div class="best-seller-text">
                                    <h3><a href="#">-</a></h3>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="grid-list-options">
                        <ul class="view-mode">
                            <li class="active"><a href="#product-grid" data-view="product-grid"></a></li>
                            <li><a href="#product-list" data-view="product-list"><i class="ti-viewti-view-list"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="product-sorting">
                        <div class="shop-product-sorting nav">
                            <a class="active" data-toggle="tab" href="#new-product">SEPEDA </a>
                            <a data-toggle="tab" href="#accessory-product">ASESORIS</a>
                        </div>
                    </div>
                </div>
                <div class="grid-list-product-wrapper tab-content">
                    <div id="new-product" class="product-grid product-view tab-pane active">
                        <div class="row">
                                    <?php 
                                            foreach ($data["sepeda"] as $product) :
                                            $tags = explode(",",$product["tags"]);
                                    ?>
                            <div class="product-width col-md-6 col-xl-4 col-lg-6">
                                <div class="product-wrapper mb-35">
                                    <div class="product-img">
                                        <a href="<?=BASE_URL?>/produk/produk_detail/<?=$product["product_id"]?>">
                                            <img src="<?=BASE_URL?>/assets/img/product/<?=$product["product_image"]?>"
                                                alt="">
                                        </a>
                                        <div class="product-item-dec">
                                            <ul>
                                                <?php foreach($tags as $tag): ?>
                                                    <li><?=strtoupper($tag)?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="product-action">
                                            <a href="<?=BASE_URL?>/cart/add/<?=$product["product_id"]?>" class="action-plus-2 p-action-none" style="background-color:white;"
                                                title="Add To Cart" href="#">
                                                <i class=" ti-shopping-cart"></i>
                                            </a>
                                            <a class="action-reload" style="background-color:white;" title="Quick View"
                                                href="<?=BASE_URL;?>/produk/produk_detail/<?=$product["product_id"]?>">
                                                <i class=" ti-zoom-in"></i>
                                            </a>
                                        </div>
                                        <div class="product-content-wrapper">
                                            <div class="product-title-spreed">
                                                <h4><a href="<?=BASE_URL;?>/produk/produk_detail/<?=$product["product_id"]?>"><?=$product["product_name"]?></a>
                                                </h4>

                                            </div>
                                            <div class="product-price">
                                                <span><?="Rp ".$product["product_price"]?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div id="accessory-product" class="product-grid product-view tab-pane">
                    <div class="row">
                                    <?php 
                                            foreach ($data["asesoris"] as $product) :
                                            $tags = explode(",",$product["tags"]);
                                    ?>
                            <div class="product-width col-md-6 col-xl-4 col-lg-6">
                                <div class="product-wrapper mb-35">
                                    <div class="product-img">
                                        <a href="<?=BASE_URL?>/produk/produk_detail/<?=$product["product_id"]?>">
                                            <img src="<?=BASE_URL?>/assets/img/product/<?=$product["product_image"]?>"
                                                alt="">
                                        </a>
                                        <div class="product-item-dec">
                                            <ul>
                                                <?php foreach($tags as $tag): ?>
                                                    <li><?=strtoupper($tag)?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="product-action">
                                            <a href="<?=BASE_URL?>/cart/add/<?=$product["product_id"]?>" class="action-plus-2 p-action-none" style="background-color:white;"
                                                title="Add To Cart" href="#">
                                                <i class=" ti-shopping-cart"></i>
                                            </a>
                                            <a class="action-reload" style="background-color:white;" title="Quick View"
                                                href="<?=BASE_URL;?>/produk/produk_detail/<?=$product["product_id"]?>">
                                                <i class=" ti-zoom-in"></i>
                                            </a>
                                        </div>
                                        <div class="product-content-wrapper">
                                            <div class="product-title-spreed">
                                                <h4><a href="<?=BASE_URL;?>/produk/produk_detail/<?=$product["product_id"]?>"><?=$product["product_name"]?></a>
                                                </h4>

                                            </div>
                                            <div class="product-price">
                                                <span><?="Rp ".$product["product_price"]?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="paginations text-center mt-20">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</div>