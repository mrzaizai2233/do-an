<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hanghoa */
?>
<div class="hanghoa-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'mahang',
            'tenhang',
            'soluong',
            'dongia',
            'tinhtrang',
            'noibat',
            'banchay',
            'motangangon',
            'motachitiet:ntext',
            'luotxem',
            'loaihang_id',
            'nhacungcap_id',
            'thuonghieu_id',
            'code',
            'created',
            'updated',
            'ngaynhap',
        ],
    ]) ?>

</div>
