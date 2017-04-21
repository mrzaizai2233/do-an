<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Search\SearchDonhang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donhang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hoten') ?>

    <?= $form->field($model, 'diachi') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'dienthoai') ?>

    <?php // echo $form->field($model, 'tongtien') ?>

    <?php // echo $form->field($model, 'ngaylap') ?>

    <?php // echo $form->field($model, 'soluong') ?>

    <?php // echo $form->field($model, 'ghichu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
