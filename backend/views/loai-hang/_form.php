<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Loaihang */
/* @var $form yii\widgets\ActiveForm */
$data = $model->getLoaihang();
$category = [0=>'root'];
//$menu=menuLoaiHang($data,0,$category,'');
function menuLoaiHang($data,$parent=0,$category,$str='',$isId){
    foreach($data as $value){
        if($value->parent==$parent){
            if($value->id==$isId)
                continue;
            $category[$value->id]=$str.$value->tenloaihang;
            $category=menuLoaiHang($data,$value->id,$category,$str.$value->tenloaihang.'>',$isId);
        }
    }
    return $category;
}
?>

<div class="loaihang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tenloaihang')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'stt')->textInput(['maxlength' => true],['type'=>'number']) ?>
    <?= $form->field($model, 'parent')->dropDownList(menuLoaiHang($data,0,$category,'',$model->id)) ?>
    <?= $form->field($model, 'trangthai')->radioList([0=>'Ẩn',1=>'Hiện']) ?>
    <?=Html::activeRadioList($model,'trangthai',[0=>'Ẩn',1=>'Hiện'])?>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
