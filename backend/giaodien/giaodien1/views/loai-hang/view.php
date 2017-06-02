<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Loaihang */
?>
<div class="loaihang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tenloaihang',
            'code',
            'created',
            'updated',
            'parent',
        ],
    ]) ?>

</div>
