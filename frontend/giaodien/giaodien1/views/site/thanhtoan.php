<?php
/**
 * Created by PhpStorm.
 * User: TUANDAT
 * Date: 21/03/2017
 * Time: 9:04 CH
 */

use common\models\base;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="/" title="Return to Home">Trang chủ</a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page">Thanh toán</span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2">Thanh toán</span>
        </h2>
        <?php
        if (Yii::$app->session->hasFlash('thongbao')):
            ?>
            <div class="thongbao alert alert-success">
                Thanh toán thành công
            </div>
        <?php endif; ?>
        <?php $form = ActiveForm::begin() ?>
        <!-- ../page heading-->
        <div class="page-content checkout-page">
            <?php if (count($gioHangs = Yii::$app->session->get('giohang')) > 0) { ?>
            <h3 class="checkout-sep">Thông tin khách hàng</h3>
            <div class="box-border">
                <ul>
                    <li class="row">
                        <div class="col-sm-6">
                            <?= $form->field($donhang, 'hoten')->textInput() ?>
                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <?= $form->field($donhang, 'diachi')->textInput() ?>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->
                    <li class="row">
                        <div class="col-sm-6">
                            <?= $form->field($donhang, 'email')->textInput(['type' => 'email']) ?>
                        </div><!--/ [col] -->
                        <div class="col-sm-6">
                            <?= $form->field($donhang, 'dienthoai')->textInput() ?>
                        </div><!--/ [col] -->
                    </li><!--/ .row -->

                </ul>
            </div>
            <?php } ?>
            <h3 class="checkout-sep">Thông tin hàng</h3>
            <div class="box-border">
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
                                            src="<?= Yii::$app->urlManager->createUrl(['/images/' . base::checkImageProduct($giohang)]) ?>"
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
                                           name="soluong[<?= $giohang->code ?>]" disabled>
                                </td>
                                <td class="price">
                                    <span><?= number_format($giohang->dongia * $soLuonghangs[$giohang->id], 0, ',', ',') ?>
                                        đ</span>
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
                <?php if (count($tongTien) && count($soLuonghangs) != 0): ?>
                    <button class="button pull-right" type="submit">Thanh Toán</button>
                <?php endif; ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . 'frontend/giaodien/giaodien1/assets/js/yii.activeForm.js', ['depends' => ['frontend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);
?>

