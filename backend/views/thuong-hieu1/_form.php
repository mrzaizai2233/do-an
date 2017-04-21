<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Thuonghieu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thuonghieu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tenthuonghieu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->fileInput([]) ?>
    <?php if(!$model->isNewRecord && $model->logo !=''){
         echo Html::img('/images/' . $model->logo,['width'=>'200px','height'=>'200px','class'=>'anh']);
        echo "<p class='btn btn-success xoaanh'>xoa anh</p>";

    } ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<script>
    $(document).ready(function () {
        var id= <?= $model->id ?>;
        $('.xoaanh').click(function(){
            $.ajax({
                url:'/backend/web/thuong-hieu/xoaanh',
                method:'GET',
                data:{'id':id},
                success:function(data){
                    $('.anh').hide();
                    $('.xoaanh').hide();

        }
            });
        });

    });
</script>