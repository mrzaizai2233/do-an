<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vaitro */
?>
<div class="vaitro-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
