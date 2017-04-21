<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'password_hash')->textInput() ?>
    <?= $form->field($model, 'email')->textInput(['type'=>'email']) ?>
	<?= $form->field($model, 'status')->dropDownList([10=>'Kích hoạt',0=>'Không kích hoạt']) ?>
	<?=Html::activeCheckboxList($vaitronguoidung,'vaitro_id',ArrayHelper::map($vaitro,'id','name'))?>
  
	
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
