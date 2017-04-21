<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Thuonghieu */
?>
<div class="thuonghieu-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tenthuonghieu',
            'code',
            'logo',
        ],
    ]) ?>

</div>
