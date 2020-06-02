<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TokoPeda - Jual Sepeda Berkualitas</title>
    <meta name="description" content="TokoPeda - Jual Sepeda Berkualitas">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=BASE_URL?>/assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/chosen.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/icofont.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/bundle.css">
    <script src="<?= BASE_URL ?>/assets/js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/sweetalert2.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/responsive.css">
    <script src="<?=BASE_URL?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
       /*  *{
            border: 1px solid red;
        } */
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="header-area transparent-bar ptb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-4">
                            <div class="logo-small-device">
                                <a href="<?=BASE_URL;?>">
                                    <h3>TokoPeda</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-8">
                            <div class="header-contact-menu-wrapper pl-45">
                                <div class="header-contact">
                                    <p>Toko Sepeda Lancar Jaya - </p>
                                </div>
                                <div class="menu-wrapper text-center">
                                    <button class="menu-toggle">
                                        <img class="s-open" alt="" src="<?=BASE_URL?>/assets/img/icon-img/menu.png">
                                        <img class="s-close" alt=""
                                            src="<?=BASE_URL?>/assets/img/icon-img/menu-close.png">
                                    </button>
                                    <div class="main-menu">
                                        <nav>
                                            <?php
                                                        if(isset($_SESSION["isauth"])){
                                                            if($_SESSION["isauth"] == true){?>
                                            <ul>
                                                <li><a href="<?=BASE_URL;?>">Beranda</a></li>
                                                <li class="active"><a href="<?=BASE_URL?>/tentang">Tentang Kami </a>
                                                </li>
                                                <li><a href="<?=BASE_URL?>/produk">Produk</a></li>
                                                <li><a href="<?=BASE_URL?>/signup/logout">Logout</a></li>

                                            </ul>
                                            <?php
                                                        }
                                                    }   
                                                        else{
                                                    ?>
                                            <ul>
                                                <li><a href="<?=BASE_URL;?>">Beranda</a></li>
                                                <li class="active"><a href="<?=BASE_URL?>/tentang">Tentang Kami </a>
                                                </li>
                                                <li><a href="<?=BASE_URL?>/produk">Produk</a></li>
                                                <li><a href="<?=BASE_URL?>/signup">Login</a></li>

                                            </ul>
                                            <?php
                                                        }
                                                    ?>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <?php
                                        if(isset($_SESSION["isauth"])) :
                                            if($_SESSION["isauth"] == true) :              
                                    ?>
                            <div class="header-cart cart-small-device">
                                <button class="icon-cart">
                                    <i class="ti-shopping-cart"></i>
                                    <span class="count-style">
                                        <?php 
                                            $retVal = empty($_SESSION["cart"]) ? 0 : count($_SESSION["cart"]) ;
                                            echo $retVal;        
                                        ?>
                                    </span>

                                </button>
                                <div class="shopping-cart-content">
                                    <ul>
                                        <?php if(isset($_SESSION["cart"])) : ?>
                                        <?php 
                                            foreach ($_SESSION["cart"] as $product) : 
                                        ?>
                                        <li class="single-shopping-cart">
                                            <div class="shopping-cart-title">
                                                <h3><a href="#"><?=$product["product_name"]?></a></h3>
                                                <span>Harga: <?=$product["product_price"]?></span>
                                                <span>Qty: <?=$product["qty"]?></span>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="icofont icofont-ui-delete"></i></a>
                                            </div>
                                        </li>

                                        <?php  endforeach;?>
                                        <?php endif; ?>
                                    </ul>

                                    <div class="shopping-cart-btn">
                                        <a class="btn-style cr-btn" href="<?=BASE_URL?>/cart">Ke Keranjang Belanja</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu-area col-12">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="<?=BASE_URL;?>">Beranda</a></li>
                                        <li class="active"><a href="<?=BASE_URL?>/tentang">Tentang Kami </a></li>
                                        <li><a href="<?=BASE_URL?>/produk">Produk</a></li>
                                        <li><a href="<?=BASE_URL?>/login">Login</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-cart-wrapper">
                    <div class="header-cart">
                        <button class="icon-cart">
                            <i class="ti-shopping-cart"></i>
                            <span class="count-style">
                                <?php 
                                    $retVal = empty($_SESSION["cart"]) ? 0 : count($_SESSION["cart"]) ;
                                    echo $retVal;
                                ?>
                            </span>
                        </button>
                        <div class="shopping-cart-content">
                            <ul>
                                <?php if(isset($_SESSION["cart"])) : ?>
                                <?php 
                                    foreach ($_SESSION["cart"] as $product) :
                                 ?>


                                <li class="single-shopping-cart">
                                    <div class="shopping-cart-title">
                                        <h3><a href="#"><?=$product["product_name"]?></a></h3>
                                        <span>Harga: <?=$product["product_price"]?></span>
                                        <span>Qty: <?=$product["qty"]?></span>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="<?=BASE_URL?>/cart/delete/<?=$product["product_id"]?>" onclick="return confirm('Apakah anda yakin?')">
                                            <i class="icofont icofont-ui-delete"></i>
                                        </a>
                                    </div>
                                </li>

                                <?php  endforeach;?>
                                <?php endif; ?>
                            </ul>

                            <div class="shopping-cart-btn">
                                <a class="btn-style cr-btn" href="<?=BASE_URL?>/cart">Ke Keranjang Belanja</a>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="header-cart-wrapper-user">
                    <div class="header-cart">
                        <button class="icon-cart" style="background-color:white;">
                            <i class="fa fa-user"></i>
                            <span style="margin-left:10px"><?=$_SESSION["username"]?></span>
                        </button>
                    </div>
                </div>
                <?php 
                    endif;
                    endif;
                ?>
            </div>
                                        
        </header>