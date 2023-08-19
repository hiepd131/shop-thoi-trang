<?php include_once('../app/models/User.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP THỜI TRANG HQHH</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../app/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="../app/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="../app/assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="../app/assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="../app/assets/dest/css/style.css">
    <link rel="stylesheet" href="../app/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="../app/assets/dest/css/huong-style.css">

    <link rel="stylesheet" href="../app/assets/dest/css/bootstrap.min.css">

    <style>
        a {
            text-decoration: none
        }
        .product-quantity {
            text-align: center;
            width: 50px;
            font-size: large;
        }
    </style>



    <script src="../app/assets/dest/js/bootstrap.min.js"></script>
    <script src="../app/assets/dest/js/jquery-3.6.4.js"></script>
    <script src="../app/assets/dest/js/my-site.js"></script>
    <!-- <script src="../app/assets/dest/js/bootstrap.min.js"></script>
    <script src="../app/assets/dest/js/jquery-3.3.1.min.js"></script> -->

    <script src="../app/assets/dest/js/jquery.js"></script>
    <script src="../app/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->
    <script src="../app/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="../app/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
    <script src="../app/assets/dest/vendors/animo/Animo.js"></script>
    <script src="../app/assets/dest/vendors/dug/dug.js"></script>
    <script src="../app/assets/dest/js/scripts.min.js"></script>
    <script src="../app/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="../app/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="../app/assets/dest/js/waypoints.min.js"></script>
    <script src="../app/assets/dest/js/wow.min.js"></script>
    <script src="../app/assets/dest/js/jquery.countTo.js"></script>
    <!--customjs-->
    <script src="../app/assets/dest/js/custom2.js"></script>
    <script>
        $(document).ready(function($) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 150) {
                    $(".header-bottom").addClass('fixNav')
                } else {
                    $(".header-bottom").removeClass('fixNav')
                }
            })
        })
    </script>
</head>

<body>
    <div id="header">
        <div class="header-top">
            <div class="container">
                <div class="pull-left auto-width-left">
                    <ul class="top-menu menu-beta l-inline">
                        <li><a href=""><i class="fa fa-home"></i> 179 Quốc lộ 13, Phường 26, Quận Bình Thạnh</a></li>
                        <li><a href=""><i class="fa fa-phone"></i> 0356 986 186</a></li>
                    </ul>
                </div>
                <div class="pull-right auto-width-right">
                    <ul class="top-details menu-beta l-inline">

                        <!-- <li><a href="#">Đăng kí</a></li>
						<li><a href="#">Đăng nhập</a></li> -->
                        <?php
                        @session_start();
                        
                        $avatar = $_SESSION['Avatar'] ?? "default.png";
                        if ($avatar == null)
                            $avatar = "default.png";
                        if (!isset($_SESSION['UserId'])) {
                            echo '
                            <li class="nav-item">
                                <a  href="?route=login">Đăng nhập</a>
                            </li>
                            &nbsp;
                            <li class="nav-item">
                                <a  href="?route=register">Đăng kí</a>
                            </li>
                                ';
                        } else {
                            echo '
                                <li class="nav-item"><a class="nav-link text-danger" href="?route=statistics">Xin chào ' . $_SESSION['FullName'] . '</a>
                                </li>
                                <li class="nav-item">
                                    <a href="?route=upload-avatar"><img
                                            src="../app/uploads/' . $avatar . '" height="46px" width="40px" alt=""></a>
                                            </li>
                                            
                                        <li class="nav-item">
                                            <a href="?route=logout">Đăng xuất</a>
                                        </li>
                                        
                                    
                                ';
                        }

                        ?>
                    </ul>

                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-top -->

        <div class="header-body">
            <div class="container beta-relative">
                <div class="pull-left">
                    <a href="?" id="logo"><img src="../app/assets/dest/images/shopthoitranghqhh-logo.png" width="300px" alt=""></a>
                </div>
                <div class="pull-right beta-components space-left ov">
                    <div class="space10">&nbsp;</div>
                    <div class="beta-comp">
                        <form role="search" method="get" id="searchform" action="?route=/">
                            <input type="text" value="" name="TenSp" placeholder="Nhập từ khóa..." />
                            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                        </form>
                    </div>

                    <div class="beta-comp">
                        <div class="cart">
                        <?php
                        $sl=0;
                        $total=0;
                        if(isset($_SESSION['UserId'])){
                        if(isset($_SESSION['cart'][$_SESSION['UserId']])){
                            foreach( $_SESSION['cart'][$_SESSION['UserId']] as $cart){
                                $sl += intval($cart['soluong']);
                            }
                        }
                    }    else{$sl='Trống';}
                    ?>
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<?= $sl ?>) <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body" style="width: 370px;">
                            <?php
if(isset($_SESSION['UserId'])){
                            if (isset($_SESSION['cart'][$_SESSION['UserId']])) {
                                foreach ($_SESSION['cart'][$_SESSION['UserId']] as $cart) {
                            ?>
                                <div class="cart-item">
                                    <div class="media">
                                        <a class="pull-left" href="#"><img src="../app/uploads/<?= $cart['img']?>" width="50px" height="50px" alt=""></a>
                                        <div class="media-body">
                                            <span class="cart-item-title"><?= $cart['ten'] ?></span>
                                            <span class="cart-item-options">Size: <?= $cart['size']?>; Color: <?= $cart['mau']?></span>
                                            <span class="cart-item-amount"><?= $cart['soluong']?>*<span>$<?= $cart['gia']?></span></span>
                                            <?php $total += $cart['soluong'] * $cart['gia']?>
                                        </div>
                                    </div>
                                </div>
                            <?php }} }?>

                                <div class="cart-caption">
                                    <div class="cart-total"><a href="?route=view-cart" style="float: right;">Chi tiết<i class="fa fa-chevron-right"></i></a>&nbsp;&nbsp;
                                        Tổng tiền: <span class="cart-total-value">$<?= $total ?></span></div>

                                    <div class="clearfix"></div>
                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="?route=checkout" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-body -->
        <div class="header-bottom" style="background-color: #0277b8;">
            <div class="container">
                <!-- <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
                <div class="visible-xs clearfix"></div> -->
                <nav class="main-menu">
                    <ul class="l-inline ov">
                        <li><a href="?">Trang chủ</a></li>
                        <li><a href="?">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li><a href="?route=product-detail&type=1">Váy đầm</a></li>
                                <li><a href="?route=product-detail&type=2">Giày da</a></li>
                                <li><a href="?route=product-detail&type=3">Suit bộ</a></li>
                            </ul>
                        </li>
                        <li><a href="?route=about">Giới thiệu</a></li>
                        <li><a href="?route=contact">Liên hệ</a></li>
                        <?php if (isset($_SESSION['UserId'])) { $user = User::find($_SESSION['UserId']);
                                            if ($user['Role'] == 1) {
                                                echo '<li><a href="?route=create-sp">Thêm sản phẩm</a></li>';
                                            } }?>
                        
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .header-bottom -->
    </div> <!-- #header -->