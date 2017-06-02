<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Attributekey */
?>
<div class="attributekey-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'AttributeName',
            'AttributeDesc',
        ],
    ]) ?>

</div>
