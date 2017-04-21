<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Nhacungcap */
?>
<div class="nhacungcap-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tennhacungcap',
            'code',
        ],
    ]) ?>

</div>
