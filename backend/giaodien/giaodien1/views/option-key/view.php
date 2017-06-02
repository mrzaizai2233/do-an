<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OptionKey */
?>
<div class="option-key-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'type',
            'sort_order',
        ],
    ]) ?>

</div>
