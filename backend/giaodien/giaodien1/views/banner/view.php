<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */
?>
<div class="banner-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'file',
        ],
    ]) ?>

</div>
