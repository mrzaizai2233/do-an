<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\models\base;
use common\models\Loaihang;
use yii\helpers\Html;

//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;
//use common\widgets\Alert;
use frontend\assets\GiaoDien1;

GiaoDien1::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="<?= Yii::$app->controller->action->id===Yii::$app->controller->defaultAction? "home " :"category-page" ?> option3">
<?php $this->beginBody() ?>
<!-- HEADER -->
<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="currency ">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Dollar</a></li>
                        <li><a href="#">Euro</a></li>
                    </ul>
                </div>
            </div>
            <div class="language ">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                        <img alt="email" src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1/assets/images/fr.jpg')?>" />French

                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><img alt="email" src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1/assets/images/en.jpg')?>" />English</a></li>
                        <li><a href="#"><img alt="email" src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1/assets/images/fr.jpg')?>" />French</a></li>
                    </ul>
                </div>
            </div>
            <a class="btn-fb-login" href="#">Đăng nhập fb</a>
            <div class="support-link">
                <a href="#">Hỗ Trợ</a>
            </div>
            <div id="user-info-top" class="user-info pull-right">
                <div class="dropdown">
                    <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>Tài Khoản</span></a>
                    <ul class="dropdown-menu mega_dropdown" role="menu">
                        <li><a href="login.html">Đăng Nhập</a></li>
                        <li><a href="#">So Sánh</a></li>
                        <li><a href="#">Danh Sách Yêu Thích</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/.top-header -->
    <!-- MAIN HEADER -->
    <div class="container main-header">
        <div class="row top-main-header">
            <div class="col-sm-12 col-md-3"></div>
            <div class="col-sm-7 col-md-6">
                <ul class="main-header-top-link">
<!--                    <li><a href="#">Promotion</a></li>-->
<!--                    <li><a href="#">Payment</a></li>-->
<!--                    <li><a href="#">Shipping</a></li>-->
<!--                    <li><a href="#">Return</a></li>-->
<!--                    <li><a href="#">Call Us: +04 123456789</a></li>-->
                </ul>
            </div>
            <div class="col-sm-5 col-md-3">
                <div class="header-text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-3 logo">
                <a href="/"><img alt="Kute shop - themelot.net" src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1/assets/data/option3/logo3.png')?>" /></a>
            </div>
            <div class="col-xs-6 col-sm-6 header-search-box">
                <?=Html::beginForm('/site/timkiem','post',['class'=>'form-inline'])?>
                    <div class="form-group form-category">
                        <select class="select-category">
                            <option value="2">All Categories</option>
                            <option value="1">Men</option>
                            <option value="2">Women</option>
                        </select>
                    </div>
                    <div class="form-group input-serach">
                        <input type="text"  placeholder="Keyword here..." name="keyword">
                    </div>
                    <button type="submit" class="pull-right btn-search"></button>
                <?=Html::endForm()?>
            </div>
            <div class="col-sm-6 col-md-3 group-button-header">
                <div class="btn-cart" id="cart-block">
                    <a title="My cart" href="/gio-hang">Giỏ hàng</a>
                    <span class="notify notify-right"><?= Yii::$app->session->get('tongsl') ? Yii::$app->session->get('tongsl'):0  ?> </span>
                    <div class="cart-block">
                        <div class="cart-block-content">
                            <h5 class="cart-title"><?=Yii::$app->session->get('giohang')?count(Yii::$app->session->get('giohang')):""?> MẶT HÀNG TRONG GIỎ HÀNG</h5>
                            <div class="cart-block-list">
                                <ul>
                                    <?php if(Yii::$app->session->get('giohang')):
                                    foreach(Yii::$app->session->get('giohang') as $hanghoa):?>
                                        <li class="product-info">
                                            <div class="p-left">
                                                <a href="#" class="remove_link"></a>
                                                <a href="<?=Yii::$app->urlManager->createUrl(['site/product',['code'=>$hanghoa->code]])?>">
                                                    <img class="img-responsive" src="<?= Yii::$app->urlManager->createUrl('images/'.base::checkImageProduct($hanghoa))?>" alt="p10">
                                                </a>
                                            </div>
                                            <div class="p-right">
                                                <p class="p-name"><?=$hanghoa->tenhang?></p>
                                                <p class="p-rice"><?= number_format($hanghoa->dongia,0,',',',')?> đ</p>
                                                <p>Số Lượng: <?= Yii::$app->session->get('soluonghang')? Yii::$app->session->get('soluonghang')[$hanghoa->id]:''?></p>
                                            </div>
                                        </li>
                                    <?php endforeach;endif; ?>
                                </ul>
                            </div>
                            <div class="toal-cart">
                                <span>Tổng Tiền</span>
                                <span class="toal-price pull-right"><?=Yii::$app->session->get('tongtien')?number_format(Yii::$app->session->get('tongtien'),0,',','.'):0?> đ</span>
                            </div>
                            <div class="cart-buttons">
                                <a href="<?= Yii::$app->urlManager->createUrl(['site/giohang'])?>" class="btn-check-out">Xem giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a title="My Account" href="#" class="btn-login">Đăng nhập</a>
<!--                <a title="My Wishlist" href="#" class="btn-heart">Yêu thích</a>-->
            </div>
        </div>

    </div>
    <!-- END MANIN HEADER -->
    <div id="nav-top-menu" class="nav-top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" id="box-vertical-megamenus">
                    <div class="box-vertical-megamenus">
                        <h4 class="title">
                            <span class="title-menu">Loại Hàng</span>
                            <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                        </h4>
                        <div class="vertical-menu-content is-home">
                            <ul class="vertical-menu-list">
                                <?php $loaihang = \common\models\Loaihang::find()->all()?>
                                <?php
                                foreach($loaihang as $item => $value):
                                    /**
                                     * @var $value \common\models\Loaihang
                                     */
                                ?>
                                <li class="<?php echo $item> 11?'cat-link-orther':''?>"><a href="<?= Yii::$app->urlManager->createUrl(['site/category','code'=>$value->code])?>"><img class="icon-menu" alt="Funky roots" src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1/assets/data/12.png')?>"><?=$value->tenloaihang ?></a></li>
                                <?php endforeach?>

                            </ul>
                            <?php if(count($loaihang)>11){?>
                            <div class="all-category"><span class="open-cate">All Categories</span></div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div id="main-menu" class="col-sm-9 main-menu">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="#">MENU</a>
                            </div>
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><?= Html::a('Trang Chủ',Yii::$app->urlManager->createUrl('/'))?></li>
                                    <?php
                                    $loaihangs=Loaihang::find()->all();


                                    ?>
                                    <?php ?>
                                    <?php
                                    $loaihangs=Loaihang::find()->where(['trangthai'=>1])->orderBy(['stt'=>SORT_ASC])->all();
                                    foreach ($loaihangs as $loaihang):
                                        if($loaihang->parent==0):
                                            if(base::checkMutiLV($loaihang->id)==0) {
                                                ?>
                                                <li>
                                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/category/', 'code' => $loaihang->code]) ?>"><?= $loaihang->tenloaihang; ?></a>
                                                </li>
                                                <?php
                                            }
                                            else if(base::checkMutiLV($loaihang->id)==1) {
                                                ?>
                                                <li class="dropdown">
                                                    <a href="<?php Yii::$app->urlManager->createUrl(['/site/category','code'=>$loaihang->code])?>" class="dropdown-toggle" data-toggle="dropdown"><?= $loaihang->tenloaihang?></a>
                                                    <ul class="dropdown-menu container-fluid">
                                                        <li class="block-container">
                                                            <ul class="block">
                                                                <?php foreach ($loaihangs as $loaihang1):
                                                                    if($loaihang1->parent==$loaihang->id):
                                                                    ?>
                                                                <li class="link_container"><a href="<?=Yii::$app->urlManager->createUrl(['site/category',['code'=>$loaihang1->code]])?>"><?=$loaihang1->tenloaihang?></a></li>
                                                                <?php endif;endforeach;?>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <?php
                                            } elseif (base::checkMutiLV($loaihang->id)==2){
                                                ?>
                                                <li class="dropdown">
                                                    <a href="<?=Yii::$app->urlManager->createUrl(['site/category','code'=>$loaihang->code])?>" class="dropdown-toggle" data-toggle="dropdown"><?=$loaihang->tenloaihang?></a>
                                                    <ul class="mega_dropdown dropdown-menu" style="width: 830px;">
                                                       <?php
                                                       foreach ($loaihangs as $loaihang1):
                                                           if($loaihang1->parent==$loaihang->id):
                                                               if(base::checkMutiLV($loaihang1->id)>0):
                                                       ?>

                                                        <li class="block-container col-sm-3">
                                                            <ul class="block">
                                                                <li class="link_container group_header">
                                                                    <a href="#"><?=$loaihang1->tenloaihang?></a>
                                                                </li>
                                                                <?php
                                                                foreach ($loaihangs as $loaihang2):
                                                                    if($loaihang2->parent==$loaihang1->id):
                                                                ?>
                                                                <li class="link_container">
                                                                    <a href="<?=Yii::$app->urlManager->createUrl(['site/category','code'=>$loaihang2->code])?>"><?=$loaihang2->tenloaihang?></a>
                                                                </li>
                                                                <?php
                                                                    endif;
                                                                endforeach;
                                                                ?>
                                                            </ul>
                                                        </li>
                                                        <?php
                                                                endif;
                                                               endif;
                                                           endforeach;
                                                        ?>

                                                    </ul>
                                                </li>

                                            <?php   }
                                        endif;
                                    endforeach;

                                    ?>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </nav>
                </div>
            </div>
            <!-- userinfo on top-->
            <div id="form-search-opntop">
            </div>
            <!-- userinfo on top-->
            <div id="user-info-opntop">
            </div>
            <!-- CART ICON ON MMENU -->
            <div id="shopping-cart-box-ontop">
                <i class="fa fa-shopping-cart"></i>
                <div class="shopping-cart-box-ontop-content">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->
<?= $content?>
<!-- Footer -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng cửa sổ</button>
            </div>
        </div>
    </div>
</div>
<footer id="footer2">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-logo">
                        <a href="#"><img src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1/assets/data/option3/logo3.png')?>" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-social">
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a class="vk" href="#"><i class="fa fa-vk"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer paralax-->
    <div class="footer-paralax">
        <div class="footer-row footer-center">
            <div class="container">
                <h3>Sign up below for early updates</h3>
                <p>You a Client , large or small, and want to participate in this adventure, please send us an email to support@kuteshop.com</p>                 <form class="form-inline form-subscribe">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Your E-mail Address">
                        <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane-o"></i></button>
                    </div>

                </form>
            </div>
        </div>
        <div class="footer-row">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="widget-container">
                            <h3 class="widget-title">Thông tin liên hệ</h3>
                            <div class="widget-body">
                                <ul>
                                    <li><a class="location" href="#">Lê Thiện - An Dương - Hải Phòng</a></li>
                                    <li><a class="phone" href="#">0169 5210 389</a></li>
                                    <li><a class="email" href="#">Dattt.2ct12a@gmail.com</a></li>
                                    <li><a class="mobile" href="#">Hotline: 0169 5210 389</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget-container">
                            <h3 class="widget-title">COMPANY</h3>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">Affiliate Program</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget-container">
                            <h3 class="widget-title">my account</h3>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#">My Orders</a></li>
                                    <li><a href="#">My Credit Slips</a></li>
                                    <li><a href="#">My Addresses</a></li>
                                    <li><a href="#">My Personal Info</a></li>
                                    <li><a href="#">Specials</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget-container">
                            <h3 class="widget-title">Hỗ trợ</h3>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#">Payments & My Vouchers</a></li>
                                    <li><a href="#">Saved Cards</a></li>
                                    <li><a href="#">Shipping Free</a></li>
                                    <li><a href="#">Cancellation & Returns</a></li>
                                    <li><a href="#">FAQ & Support Online</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-wapper">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="footer-coppyright">
                                Copyright © 2017 Trương Tuấn Đạt. All Rights Reserved. Designed by: Trương Tuấn Đạt
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="footer-payment-logo">
                                <img src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1/assets/data/option3/payment-logo.png')?>" alt="payment logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./footer paralax-->
</footer>
<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
