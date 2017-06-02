<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Discount */
?>
<div class="discount-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'type',
            'total_amount',
            'discount',
            'date_start',
            'date_end',
            'date_added',
            'status',
            'description',
        ],
    ]) ?>

</div>
