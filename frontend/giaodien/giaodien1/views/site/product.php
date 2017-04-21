<?php
/**
 * Created by PhpStorm.
 * User: TUANDAT
 * Date: 19/03/2017
 * Time: 3:41 CH
 *
 */
use common\models\base;
use common\models\Hanghoa;

/** @var $hanghoas Hanghoa */
$hanghoas;
?>

<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="<?=Yii::$app->urlManager->createUrl('/')?>" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <a href="#" title="Return to Home"><?=$hanghoas->loaihang->tenloaihang?></a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page"><?=$hanghoas->tenhang?></span>
        </div>
        <!-- ./breadcrumb -->
        <!-- row -->
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <!-- block category -->
                <div class="block left-module">
                    <p class="title_block">Sản phẩm</p>
                    <div class="block_content">
                        <!-- layered -->
                        <div class="layered layered-category">
                            <div class="layered-content">
                                <ul class="tree-menu">
                                    <?php foreach ($loaihangs as $loaihang): ?>
                                    <li class="">
                                        <span></span><a href="<?=Yii::$app->urlManager->createUrl(['site/category','code'=>$loaihang->code])?>"><?=$loaihang->tenloaihang?></a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        <!-- ./layered -->
                    </div>
                </div>
                <!-- ./block category  -->
                <!-- block best sellers -->
                <div class="block left-module">
                    <p class="title_block">Bán chạy nhất</p>
                    <div class="block_content">
                        <div class="owl-carousel owl-best-sell" data-loop="true" data-nav = "false" data-margin = "0" data-autoplayTimeout="1000" data-autoplay="true" data-autoplayHoverPause = "true" data-items="1">
                            <ul class="products-block best-sell">
                            <?php foreach($hangnoibats as $index => $hangnoibat):
                               $index+=1; ?>

                                <li>
                                    <div class="products-block-left">
                                        <a href="#">
                                            <img src="<?=Yii::$app->urlManager->createUrl('images/'.base::checkImageProduct($hangnoibat))?>" alt="SPECIAL PRODUCTS">
                                        </a>
                                    </div>
                                    <div class="products-block-right">
                                        <p class="product-name">
                                            <a href="#"><?=$hangnoibat->tenhang?></a>
                                        </p>
                                        <p class="product-price"><?= number_format($hangnoibat->dongia,0,',',',')?></p>
                                        <p class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </p>
                                    </div>
                                </li>
                            <?php
                            if($index%3==0&&$index!=0){
                                echo "</ul><ul class='products-block best-sell'>";
                            }
                            ?>


                            <?php endforeach; ?>
                            </ul>

                        </div>
                    </div>
                </div>
                <!-- ./block best sellers  -->

                <!-- left silide -->

                <!--./left silde-->
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- Product -->
                <div id="product">
                    <div class="primary-box row">
                        <div class="pb-left-column col-xs-12 col-sm-6">
                            <!-- product-imge-->
                            <div class="product-image">
                                <div class="product-full">
                                    <img id="product-zoom" src="<?=Yii::$app->urlManager->createUrl('images/'.base::checkImageProduct($hanghoas)) ?>" data-zoom-image="<?=Yii::$app->urlManager->createUrl('images/'.base::checkImageProduct($hanghoas)) ?>"/>

                                </div>
                                <div class="product-img-thumb" id="gallery_01">
                                    <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="true">
                                        <?php foreach ($hanghoas->hinhanhs as $hinhanh):?>
                                        <li>
                                            <a href="#" data-image="assets/data/product-s3-420x512.jpg" data-zoom-image="assets/data/product-s3-850x1036.jpg">
                                                <img id="product-zoom"  src="<?=Yii::$app->urlManager->createUrl('images/'.$hinhanh->file)?>" />
                                            </a>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <!-- product-imge-->
                        </div>
                        <div class="pb-right-column col-xs-12 col-sm-6">
                            <h1 class="product-name"><?=$hanghoas->tenhang?></h1>
                            <div class="product-comments">
                                <div class="product-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="comments-advices">
                                    <a href="#"><i class="fa fa-pencil"></i> Viết đánh giá</a>
                                </div>
                            </div>
                            <?php ?>
                            <div class="product-price-group">
                                <span class="price"><?= number_format($hanghoas->dongia,0,',',',') ?> đ</span>
<!--                                <span class="old-price">$52.00</span>-->
<!--                                <span class="discount">-30%</span>-->
                            </div>
                            <div class="info-orther">
                                <p>Mã sản phẩm: <?=$hanghoas->mahang?></p>
                                <p>Tình trang: <span class="in-stock"><?=base::getTinhTrang1($hanghoas->tinhtrang)?></span></p>
                            </div>
                            <div class="product-desc">
                                <?=$hanghoas->motangangon?>
                            </div>
                            <div class="form-option">
                                <p class="form-option-title">Tùy chọn:</p>
                                <div class="attributes">
                                    <div class="attribute-label">Màu:</div>
                                    <div class="attribute-list">
                                        <ul class="list-color">
                                            <li style="background:#0c3b90;"><a href="#">red</a></li>
                                            <li style="background:#036c5d;" class="active"><a href="#">red</a></li>
                                            <li style="background:#5f2363;"><a href="#">red</a></li>
                                            <li style="background:#ffc000;"><a href="#">red</a></li>
                                            <li style="background:#36a93c;"><a href="#">red</a></li>
                                            <li style="background:#ff0000;"><a href="#">red</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="attributes">
                                    <div class="attribute-label">SL:<?=$hanghoas->soluong?></div>
                                    <div class="attribute-list product-qty">
                                        <div class="qty">
                                            <input id="idhanghoa" type="hidden"  value="<?=$hanghoas->code?>">
                                            <input id="option-product-qty" name="soluong" type="text" value="1">
                                        </div>

                                        <div class="btn-plus">
                                            <a href="#" class="btn-plus-up">
                                                <i class="fa fa-caret-up"></i>
                                            </a>
                                            <a href="#" class="btn-plus-down">
                                                <i class="fa fa-caret-down"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="attributes">
                                    <div class="attribute-label">Kích cỡ:</div>
                                    <div class="attribute-list">
                                        <select>
                                            <option value="1">X</option>
                                            <option value="2">XL</option>
                                            <option value="3">XXL</option>
                                        </select>
                                        <a id="size_chart" class="fancybox" href="assets/data/size-chart.jpg">Size Chart</a>
                                    </div>

                                </div>
                            </div>
                            <div class="form-action">
                                <div class="button-group">
                                    <a class="btn-add-cart" >Thêm vào giỏ hàng</a>
                                </div>
                                <div class="button-group">
                                    <a class="wishlist" href="#"><i class="fa fa-heart-o"></i>
                                        <br>Wishlist</a>
                                    <a class="compare" href="#"><i class="fa fa-signal"></i>
                                        <br>
                                        Compare</a>
                                </div>
                            </div>
                            <div class="form-share">
                                <div class="sendtofriend-print">
                                    <a href="javascript:print();"><i class="fa fa-print"></i> Print</a>
                                </div>
                                <div class="network-share">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab product -->
                    <div class="product-tab">
                        <ul class="nav-tab">
                            <li class="active">
                                <a aria-expanded="false" data-toggle="tab" href="#product-detail">Product Details</a>
                            </li>
                            <li>
                                <a aria-expanded="true" data-toggle="tab" href="#information">information</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#reviews">reviews</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#extra-tabs">Extra Tabs</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#guarantees">guarantees</a>
                            </li>
                        </ul>
                        <div class="tab-container">
                            <div id="product-detail" class="tab-panel active">
                                <?=$hanghoas->motachitiet?>
                            </div>
                            <div id="information" class="tab-panel">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="200">Compositions</td>
                                        <td>Cotton</td>
                                    </tr>
                                    <tr>
                                        <td>Styles</td>
                                        <td>Girly</td>
                                    </tr>
                                    <tr>
                                        <td>Properties</td>
                                        <td>Colorful Dress</td>
                                    </tr>
                                </table>
                            </div>
                            <div id="reviews" class="tab-panel">
                                <div class="product-comments-block-tab">
                                    <div class="comment row">
                                        <div class="col-sm-3 author">
                                            <div class="grade">
                                                <span>Grade</span>
                                                    <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            </div>
                                            <div class="info-author">
                                                <span><strong>Jame</strong></span>
                                                <em>04/08/2015</em>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 commnet-dettail">
                                            Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                        </div>
                                    </div>
                                    <div class="comment row">
                                        <div class="col-sm-3 author">
                                            <div class="grade">
                                                <span>Grade</span>
                                                    <span class="reviewRating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                            </div>
                                            <div class="info-author">
                                                <span><strong>Author</strong></span>
                                                <em>04/08/2015</em>
                                            </div>
                                        </div>
                                        <div class="col-sm-9 commnet-dettail">
                                            Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar
                                        </div>
                                    </div>
                                    <p>
                                        <a class="btn-comment" href="#">Write your review !</a>
                                    </p>
                                </div>

                            </div>
                            <div id="extra-tabs" class="tab-panel">
                                <p>Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Sed lectus. Sed a libero. Vestibulum eu odio.</p>

                                <p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam eget dui.</p>

                                <p>Maecenas nec odio et ante tincidunt tempus. Vestibulum suscipit nulla quis orci. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Aenean ut eros et nisl sagittis vestibulum. Aliquam eu nunc.</p>
                            </div>
                            <div id="guarantees" class="tab-panel">
                                <p>Phasellus accumsan cursus velit. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est. Sed lectus. Sed a libero. Vestibulum eu odio.</p>

                                <p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam eget dui.</p>

                                <p>Maecenas nec odio et ante tincidunt tempus. Vestibulum suscipit nulla quis orci. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Aenean ut eros et nisl sagittis vestibulum. Aliquam eu nunc.</p>
                                <p>Maecenas vestibulum mollis diam. In consectetuer turpis ut velit. Curabitur at lacus ac velit ornare lobortis. Praesent ac sem eget est egestas volutpat. Nam eget dui.</p>
                            </div>
                        </div>
                    </div>
                    <!-- ./tab product -->
                    <!-- box product -->
                    <div class="page-product-box">
                        <h3 class="heading">Sản phẩm liên quan</h3>
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                            <?php foreach($hanglienquans as $hanglienquan)?>
                            <li>
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="<?=Yii::$app->urlManager->createUrl(['site/product/','code'=>$hanglienquan->code])?>">
                                            <img class="img-responsive" alt="product" src="<?=Yii::$app->urlManager->createUrl('images/'.base::checkImageProduct($hanglienquan))?>" />
                                        </a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart" data-id="<?=$hanglienquan->code?>">
                                            <a title="Thêm vào giỏ hàng" href="#add">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="#"><?=$hanglienquan->tenhang?></a></h5>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="content_price">
                                            <span class="price product-price"><?= number_format($hanglienquan->dongia,0,',','.')?> đ</span>
<!--                                            <span class="price old-price">$52,00</span>-->
                                        </div>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- ./box product -->
                    <!-- box product -->
                    <div class="page-product-box">
                        <h3 class="heading">Có thể bạn thích</h3>
                        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}'>
                            <?php foreach ($nhieuluotviews as $nhieuluotview):?>
                            <li>
                                <div class="product-container">
                                    <div class="left-block">
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/product','code'=>$nhieuluotview->code]) ?>">
                                            <img class="img-responsive"  style="width:300px;height:366px;"alt="product" src="<?= Yii::$app->urlManager->createUrl('images/'.base::checkImageProduct($nhieuluotview)) ?>" />
                                        </a>
                                        <div class="quick-view">
                                            <a title="Add to my wishlist" class="heart" href="#"></a>
                                            <a title="Add to compare" class="compare" href="#"></a>
                                            <a title="Quick view" class="search" href="#"></a>
                                        </div>
                                        <div class="add-to-cart" data-id="<?=$nhieuluotview->code?>">
                                            <a title="Thêm vào giỏ hàng" href="#add" data-toggle="modal" data-target="#myModal">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                    <div class="right-block">
                                        <h5 class="product-name"><a href="<?= Yii::$app->urlManager->createUrl(['site/product','code'=>$nhieuluotview->code]) ?>"><?= $nhieuluotview->tenhang?></a></h5>
                                        <div class="product-star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                        <div class="content_price">
                                            <span class="price product-price"><?= number_format($nhieuluotview->dongia,0,',',',') ?> đ</span>
<!--                                            <span class="price old-price">$52,00</span>-->
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <!-- ./box product -->
                </div>
                <!-- Product -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>

