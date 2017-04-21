<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hanghoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hanghoa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mahang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tenhang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soluong')->textInput() ?>

    <?= $form->field($model, 'dongia')->textInput() ?>

    <?= $form->field($model, 'tinhtrang')->dropDownList([ 'conhang' => 'Conhang', 'hethang' => 'Hethang', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'noibat')->dropDownList([ 'noibat' => 'Noibat', 'khongnoibat' => 'Khongnoibat', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'banchay')->dropDownList([ 'banchay' => 'Banchay', 'khongbanchay' => 'Khongbanchay', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'motangangon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motachitiet')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'luotxem')->textInput() ?>

    <?= $form->field($model, 'loaihang_id')->textInput() ?>

    <?= $form->field($model, 'nhacungcap_id')->textInput() ?>

    <?= $form->field($model, 'thuonghieu_id')->textInput() ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?= $form->field($model, 'ngaynhap')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
