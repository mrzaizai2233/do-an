<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Donhang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donhang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hoten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diachi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dienthoai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tongtien')->textInput() ?>

    <?= $form->field($model, 'ngaylap')->textInput() ?>

    <?= $form->field($model, 'soluong')->textInput() ?>

    <?= $form->field($model, 'ghichu')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
