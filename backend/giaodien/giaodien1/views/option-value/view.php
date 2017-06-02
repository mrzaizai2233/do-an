<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OptionValue */
?>
<div class="option-value-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'image',
            'name',
            'description',
            'option_key_id',
        ],
    ]) ?>

</div>
