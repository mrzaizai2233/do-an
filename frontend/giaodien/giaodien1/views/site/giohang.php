<?php
/**
 * Created by PhpStorm.
 * User: TUANDAT
 * Date: 21/03/2017
 * Time: 1:35 CH
 * @var $giohang Hanghoa
 */
use common\models\base;
use yii\helpers\Html;

?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="<? Yii::$app->urlManager->createUrl('/') ?>" title="Return to Home">Home</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Giở hàng của bạn</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading no-line">
            <span class="page-heading-title2">Giỏ hàng</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content page-order">
            <div class="order-detail-content">
                <?= Html::beginForm() ?>
                <?php if (count($gioHangs = Yii::$app->session->get('giohang')) > 0) { ?>
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th class="cart_product">Sản Phẩm</th>
                            <th width="25%">Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($gioHangs as $giohang): ?>
                            <tr>
                                <td class="cart_product">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/product', 'code' => $giohang->code]) ?>"><img
                                            src="<?= Yii::$app->urlManager->createUrl('images/' .base::checkImageProduct($giohang)) ?>"
                                            alt="Product"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a><?= $giohang->motangangon ?></a></p>
                                    <small class="cart_ref">SKU : <?= $giohang->mahang ?></small>
                                    <br>
                                </td>
                                <td class="cart_avail"><span
                                        class="label label-<?= $giohang->tinhtrang == "conhang" ? "success" : "danger" ?>"><?= $giohang->tinhtrang == "conhang" ? "Còn hàng" : "Hết Hàng" ?></span>
                                </td>
                                <td class="price"><span><?= number_format($giohang->dongia, 0, ',', '.') ?> đ </span>
                                </td>
                                <td class="qty">
                                    <input class="form-control input-sm" type="number"
                                           value="<?= $soLuonghangs[$giohang->id] ?>"
                                           name="soluong[<?= $giohang->code ?>]">
                                </td>
                                <td class="price">
                                    <span><?= number_format($giohang->dongia * $soLuonghangs[$giohang->id], 0, ',', ',') ?> đ</span>
                                </td>
                                <td class="action">
                                    <a href="<?= Yii::$app->urlManager->createUrl(['site/xoatronggiohang', 'code' => $giohang->code]) ?>">Delete
                                        item</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5"><strong>Tổng tiền</strong></td>
                            <td colspan="2"><strong><?= number_format($tongTien, 0, ',', ',') ?> đ</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                <?php } else {
                    echo "Không có sản phẩm nào trong giỏ hàng";
                } ?>
                <div class="cart_navigation">
                    <a class="prev-btn" href="<?=Yii::$app->urlManager->createUrl(['site'])?>">Tiếp tục mua hàng</a>
                    <input type="submit" style="padding:10px"class="btn btn-info" value="Cập nhật giỏ hàng">
                    <a class="next-btn" href="<?=Yii::$app->urlManager->createUrl(['site/thanhtoan'])?>">Thanh toán</a>
                </div>
                <?=Html::endForm()?>

            </div>
        </div>
    </div>
</div>
