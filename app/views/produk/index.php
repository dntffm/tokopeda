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
                    <div class="sidebar-widget pb-50">
                        <h3 class="sidebar-widget">by categories</h3>
                        <div class="widget-categories">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Bags</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Jewelry</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-55">
                        <h3 class="sidebar-widget">by price</h3>
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
                    </div>
                    <div class="sidebar-widget mb-55">
                        <h3 class="sidebar-widget">by color</h3>
                        <div class="product-color">
                            <ul>
                                <li class="blue">b</li>
                                <li class="yellow">y</li>
                                <li class="gray">g</li>
                                <li class="puce">pu</li>
                                <li class="black">b</li>
                                <li class="pink">p</li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-45">
                        <h3 class="sidebar-widget">product tags</h3>
                        <div class="product-tags">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Bag</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Tie</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Dress</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget">best seller</h3>
                        <div class="best-seller">
                            <div class="single-best-seller">
                                <div class="best-seller-img">
                                    <a href="#"><img src="assets/img/Gunung/4.jpg" alt=""
                                            style="width:100px; height:100px"></a>
                                </div>
                                <div class="best-seller-text">
                                    <h3><a href="#">Minimal White Shoes</a></h3>
                                    <span>$39.9</span>
                                </div>
                            </div>
                            <div class="single-best-seller">
                                <div class="best-seller-img">
                                    <a href="#"><img src="assets/img/product/product-13.jpg" alt=""></a>
                                </div>
                                <div class="best-seller-text">
                                    <h3><a href="#">Minimal White Shoes</a></h3>
                                    <span>$39.9</span>
                                </div>
                            </div>
                            <div class="single-best-seller">
                                <div class="best-seller-img">
                                    <a href="#"><img src="assets/img/product/product-14.jpg" alt=""></a>
                                </div>
                                <div class="best-seller-text">
                                    <h3><a href="#">Minimal White Shoes</a></h3>
                                    <span>$39.9</span>
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
                        <div class="sorting sorting-bg-1">
                            <form>
                                <select class="select">
                                    <option value="">Default softing </option>
                                    <option value="">Sort by news</option>
                                    <option value="">Sort by price</option>
                                </select>
                            </form>
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
                                        <a href="product-details.html">
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
                                            <a class="action-plus-2 p-action-none" style="background-color:white;"
                                                title="Add To Cart" href="#">
                                                <i class=" ti-shopping-cart"></i>
                                            </a>
                                            <a class="action-cart-2" style="background-color:white;" title="Wishlist"
                                                href="">
                                                <i class=" ti-heart"></i>
                                            </a>
                                            <a class="action-reload" style="background-color:white;" title="Quick View"
                                                href="<?=BASE_URL;?>/produk/produk_detail/<?=$product["product_id"]?>">
                                                <i class=" ti-zoom-in"></i>
                                            </a>
                                        </div>
                                        <div class="product-content-wrapper">
                                            <div class="product-title-spreed">
                                                <h4><a href="product-details.html"><?=$product["product_name"]?></a>
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
                            <?php foreach($data["asesoris"] as $product): ?>
                            <div class="product-width col-md-6 col-xl-4 col-lg-6">
                                <div class="product-wrapper mb-35">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/helm-2.jpg" alt="">
                                        </a>

                                        <div class="product-action">
                                            <a class="action-plus-2 p-action-none" title="Add To Cart" href="#">
                                                <i class=" ti-shopping-cart"></i>
                                            </a>
                                            <a class="action-cart-2" title="Wishlist" href="#">
                                                <i class=" ti-heart"></i>
                                            </a>
                                            <a class="action-reload" title="Quick View" data-toggle="modal"
                                                data-target="#exampleModal" href="#">
                                                <i class=" ti-zoom-in"></i>
                                            </a>
                                        </div>
                                        <div class="product-content-wrapper">
                                            <div class="product-title-spreed">
                                                <h4><a href="product-details.html">Aeri Carbon Helmet</a></h4>
                                                <span>6600 RPM</span>
                                            </div>
                                            <div class="product-price">
                                                <span>$2549</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="paginations text-center mt-20">
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>