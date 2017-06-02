<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Attributevalue */
?>
<div class="attributevalue-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'AttributeValueName',
            'AttributeValueDesc',
            'attributekey_id',
        ],
    ]) ?>

</div>
