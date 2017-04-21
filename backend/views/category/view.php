<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
?>
<div class="category-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'parent',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
