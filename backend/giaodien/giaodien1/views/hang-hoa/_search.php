<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\SearchHanghoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hanghoa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mahang') ?>

    <?= $form->field($model, 'tenhang') ?>

    <?= $form->field($model, 'soluong') ?>

    <?= $form->field($model, 'dongia') ?>

    <?php // echo $form->field($model, 'tinhtrang') ?>

    <?php // echo $form->field($model, 'noibat') ?>

    <?php // echo $form->field($model, 'banchay') ?>

    <?php // echo $form->field($model, 'motangangon') ?>

    <?php // echo $form->field($model, 'motachitiet') ?>

    <?php // echo $form->field($model, 'luotxem') ?>

    <?php // echo $form->field($model, 'loaihang_id') ?>

    <?php // echo $form->field($model, 'nhacungcap_id') ?>

    <?php // echo $form->field($model, 'thuonghieu_id') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'ngaynhap') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
