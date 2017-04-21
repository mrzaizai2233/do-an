<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hanghoa */

$this->title = 'Update Hanghoa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hanghoas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hanghoa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
