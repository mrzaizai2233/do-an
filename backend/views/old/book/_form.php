<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use backend\models\Category;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model backend\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
function getCategory($data,$parent=0,$Category,$level=''){
    foreach ($data as $value) {
        if($value->parent==$parent){
            $Category[$value->id]=$level.$value->name;
            $Category=getCategory($data,$value->id,$Category,$level.$value->name.' > ');
        }
    }
return $Category;
}
$Category=['0'=>'Root'];
$data=getCategory(Category::find()->all(),0,$Category,'');




?>
<div class="book-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate')->dropdownList($data) ?>

    <?= $form->field($model, 'file[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'quantiny')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'publish_at')->widget(DatePicker::classname(),
    [
    'dateFormat' => 'dd-MM-yyyy',
    'clientOptions' => [
    'changeMonth' => true,
    'yearRange' => '1996:2099',
    'changeYear' => true,
    ],
    ]) ?>
ád
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
