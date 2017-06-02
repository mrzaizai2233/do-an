<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hanghoa */

$this->title = $model->tenhang;
$this->params['breadcrumbs'][] = ['label' => 'Hàng Hóa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanghoa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có muốn xóa sản phẩm này ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'mahang',
            'tenhang',
            'soluong',
            [
                'attribute'=>'dongia',
                'value'=>number_format($model->dongia,0,',','.')
            ],
            [
                'attribute'=>'Tình trạng',
                'value'=>\common\models\base::getTinhTrang($model->tinhtrang),
                'format'=>'raw'
            ],
            [
                'attribute'=>'Nổi bật',
                'value'=>\common\models\base::getNoiBat($model->noibat),
                'format'=>'raw'
            ],
            [
                'attribute'=>'Bán chạy',
                'value'=>\common\models\base::getBanChay($model->banchay)
                ,'format'=>'raw'
            ],
            'motangangon:html',
            'motachitiet:html',
            'luotxem',
            [
                'attribute'=>'loaihang_id',
                'value'=>\common\models\base::getNameLoaiHang($model->loaihang_id)
            ],
            [
                'attribute'=>'nhacungcap_id',
                'value'=>\common\models\base::getNameNhaCungCap($model->nhacungcap_id)
            ],
            [
                'attribute'=>'thuonghieu_id',
                'value'=>\common\models\base::getNameThuongHieu($model->thuonghieu_id)
            ],
            'code',
            'created',
            'updated',
            'ngaynhap',
        ],
    ]) ?>

</div>
