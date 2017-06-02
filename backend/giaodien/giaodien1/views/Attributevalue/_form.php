<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Attributevalue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attributevalue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'AttributeValueName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AttributeValueDesc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attributekey_id')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
