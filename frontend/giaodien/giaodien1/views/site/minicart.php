<?php
/**
 * @var $hanghoa Hanghoa[]
 */
use common\models\base;
use common\models\Hanghoa;

?>
<a title="My cart" href="<?= Yii::$app->urlManager->createUrl(['site/giohang'])?>">Giỏ Hàng</a>
<span class="notify notify-right"><?=$tongsl?></span>
<div class="cart-block">
    <div class="cart-block-content">
        <h5 class="cart-title"><?=count($giohang)?> mặt hàng trong giỏ hàng</h5>
        <div class="cart-block-list">
            <ul>
                <?php foreach($giohang as $hanghoa):?>
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
                        <p>Số Lượng: <?=$soluonghang[$hanghoa->id]?></p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="toal-cart">
            <span>Tổng Tiền</span>
            <span class="toal-price pull-right"><?=number_format($tongtien,0,',',',')?> đ</span>
        </div>
        <div class="cart-buttons">
            <a href="<?= Yii::$app->urlManager->createUrl(['site/giohang'])?>" class="btn-check-out">Xem giỏ hàng</a>
        </div>
    </div>
</div>