<?php
//use yii\helpers\Html;
///* @var $this yii\web\View */
//// echo Yii::$app->urlManager->baseUrl;
//$this->title = 'My Yii Application';
/**
 * @var $hangNoiBats \common\models\Hanghoa[]
 * @var $loaihang \common\models\Loaihang[]
 * @var $hanghoa \common\models\Hanghoa
 */
use common\models\base;

$this->title = "Trang bán hàng"
//?>
<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="header-top-right-wapper">
                    <div class="homeslider">
                        <div class="content-slide">
                            <ul id="slide-background">
                                <li data-background="#ffcc33"><img alt="Funky roots"
                                                                   src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1//assets/data/option3/slider1.jpg') ?>"
                                                                   title="Funky roots"/></li>
                                <li data-background="#666a69"><img alt="Funky roots"
                                                                   src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1//assets/data/option3/slider2.jpg') ?>"
                                                                   title="Funky roots"/></li>
                                <li data-background="#c1ddf6"><img alt="Funky roots"
                                                                   src="<?= Yii::$app->urlManager->createUrl('frontend/giaodien/giaodien1//assets/data/option3/slider3.jpg') ?>"
                                                                   title="Funky roots"/></li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-banner">
                        <div class="trending">
                            <h2 class="trending-title">NỔI BẬT</h2>
                            <div class="trending-product owl-carousel nav-center" data-items="1" data-dots="false"
                                 data-nav="true" data-loop="true">
                                <?php
                                $ul = 0;
                                foreach ($hangNoiBats as $key => $value): ?>
                                    <?= $ul == 0 ? '<ul>' : '' ?>
                                    <li>
                                        <div class="product-container">
                                            <div class="product-image">
                                                <a href="<?= Yii::$app->urlManager->createUrl(['site/product', 'code' => $value->code]) ?>"><img
                                                        src="<?= Yii::$app->urlManager->createUrl('images/'); echo isset($value->hinhanhs[0]->file)?'/'.$value->hinhanhs[0]->file:'/p13.jpg' ?>"
                                                        style="height:155px" alt="Product"></a>
                                            </div>
                                            <div class="product-meta">
                                                <h5 class="product-name">
                                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/product', 'code' => $value->code]) ?>"><?= $value->tenhang ?></a>
                                                </h5>
                                                <div class="product-price">
                                                    <span
                                                        class="price"><?php echo number_format($value->dongia, 0, ',', '.') ?>
                                                        VNĐ</span>
                                                    <!--                                                    <span class="price-old">$52,00</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                    if ($ul == 1) {
                                        echo '</ul>';
                                        $ul = 0;
                                    } else {
                                        echo '';
                                        $ul = $ul + 1;
                                    }
                                    ?>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<!-- servives -->
<!---->
<!-- end services -->
<!-- Hot deals -->
<div class="hot-deals-row">
    <div class="container">
        <div class="hot-deals-box">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <div class="hot-deals-tab">
                        <div class="hot-deals-title vertical-text">
                            <span>h</span>
                            <span>o</span>
                            <span>t</span>
                            <span class="yellow">d</span>
                            <span class="yellow">e</span>
                            <span class="yellow">a</span>
                            <span class="yellow">l</span>
                            <span class="yellow">s</span>
                        </div>
                        <div class="hot-deals-tab-box">
                            <ul class="nav-tab">
                                <li class="active"><a data-toggle="tab" href="#hot-deal-1">UP TO 40% OFF</a></li>
                                <li><a data-toggle="tab" href="#hot-deal-2">UP TO 50% OFF</a></li>
                                <li><a data-toggle="tab" href="#hot-deal-1">UP TO 60% OFF</a></li>
                                <li><a data-toggle="tab" href="#hot-deal-2">UP TO 70% OFF</a></li>
                                <li><a data-toggle="tab" href="#hot-deal-1">UP TO 80% OFF</a></li>
                            </ul>
                            <di class="box-count-down">
                                <span class="countdown-lastest" data-y="2015" data-m="9" data-d="1" data-h="00"
                                      data-i="00" data-s="00"></span>
                            </di>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8 hot-deals-tab-content-col">
                    <div class="hot-deals-tab-content tab-container">
                        <div id="hot-deal-1" class="tab-panel active">
                            <ul class="product-list owl-carousel nav-center" data-dots="false" data-loop="true"
                                data-nav="true" data-margin="29" data-autoplayTimeout="1000"
                                data-autoplayHoverPause="true"
                                data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                <?php
                                /**
                                 * @var $hangBanchays \common\models\Hanghoa[]
                                 */
                                foreach ($hangBanchays as $key => $hangbanchay):
                                    ?>
                                    <li>
                                        <div class="left-block">
                                            <a href="<?= Yii::$app->urlManager->createUrl(['site/product', 'code' => $hangbanchay->code]) ?>"><img
                                                    class="img-responsive" alt="<?= $hangbanchay->tenhang;?>"
                                                    src="<?= Yii::$app->urlManager->createUrl('images/');echo isset($hangbanchay->hinhanhs[0]->file)?"/".$hangbanchay->hinhanhs[0]->file:"/p13.jpg" ?>"
                                                    src="/images/"<?= Yii::$app->urlManager->createUrl(isset($hangbanchay->hinhanhs[0]->file)?$hangbanchay->hinhanhs[0]->file:"p13.jpg");?>"
                                                    width="268px" height="327px"/></a>
                                        </div>
                                        <div class="price-percent-reduction2">
                                            -33% OFF
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a
                                                    href="<?= Yii::$app->urlManager->createUrl(['site/product', 'code' => $hangbanchay->code]) ?>"><?= $hangbanchay->tenhang ?></a>
                                            </h5>
                                            <div class="content_price">
                                                <span
                                                    class="price product-price"><?= number_format($hangbanchay->dongia, 0, ',', '.') ?>
                                                    VNĐ</span>
                                                <!--                                            <span class="price old-price">$52,00</span>-->
                                            </div>
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./Hot deals -->
<!-- box product new arrivals -->
<?php foreach ($loaihangs as $key => $loaihang): ?>
    <?php if (count($loaihang->hanghoas) > 0) { ?>
        <div class="box-products new-arrivals">
            <div class="container">
                <div class="box-product-head">
                    <span class="box-title"><a href="<?=Yii::$app->urlManager->createUrl(['site/category/','code'=>$loaihang->code])  ?>"><?=$loaihang->tenloaihang?></span></a>
                </div>
                <div class="box-product-content">
                    <div class="box-product-adv">
                        <ul class="owl-carousel nav-center" data-items="1" data-dots="false" data-autoplay="true"
                            data-loop="true" data-nav="true">
                            <?php foreach ($loaihang->hanghoas as $hanghoa): if (count($hanghoa->hinhanhs) > 0): $count = 0 ?>
                                <li><a href="#"><img
                                            src="<?= Yii::$app->urlManager->createUrl('images/');echo isset($hanghoa->hinhanhs[0]->file)?"/".$hanghoa->hinhanhs[0]->file:"/p13.jpg" ?>"
                                            alt="adv" style="width: 300px;height:366px;" width="300" height="366"></a></li>
                                <li><a href="#"><img
                                            src="<?= Yii::$app->urlManager->createUrl("images/");echo isset($hanghoa->hinhanhs[1]->file)?"/".$hanghoa->hinhanhs[1]->file:"/p13.jpg" ?>"
                                            alt="adv" width="300" height="366"></a>
                                </li>
                                <?php $count++;endif;endforeach; ?>
                        </ul>
                    </div>
                    <div class="box-product-list">
                        <div class="tab-container">
                            <div id="tab-1" class="tab-panel active">
                                <ul class="product-list owl-carousel nav-center" data-dots="false" data-loop="true" data-nav="true" data-margin="10" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                   <?php foreach ($loaihang->hanghoas as $hanghoa):?>
                                    <li>
                                        <div class="left-block">
                                            <a href="<?= Yii::$app->urlManager->createUrl(['site/product','code'=>$hanghoa->code]) ?>"><img class="img-responsive" alt="product"
                                                             src="<?=Yii::$app->urlManager->createUrl('images/'.base::checkImageProduct($hanghoa))?>"/></a>
                                            <div class="quick-view">
                                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                                <a title="Add to compare" class="compare" href="#"></a>
                                                <a title="Quick view" class="search" href="#"></a>
                                            </div>
                                            <div class="add-to-cart" data-id="<?=$hanghoa->code?>" style="cursor: pointer;">
                                                <a title="Add to Cart">Add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="<?= Yii::$app->urlManager->createUrl(['site/product','code'=>$hanghoa->code])?>"><?=$hanghoa->tenhang?></a></h5>
                                            <div class="content_price">
                                                <span class="price product-price"><?php echo number_format($hanghoa->dongia, 0, ',', '.') ?> VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="price-percent-reduction2">
                                            -30% OFF
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php endforeach; ?>
<!-- ./box product new arrivals -->