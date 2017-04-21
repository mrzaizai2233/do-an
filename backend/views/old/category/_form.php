<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
  
// echo "<pre>";
// var_dump($model);
// die; 
?>
<?php 

function getAllCategory($parent=0,$data,$category,$level=''){
    foreach ($data as $key => $value) {
        if($value->parent==$parent){
            $category[$value->id]=$level.$value->name;
            $category=getAllCategory($value->id,$data,$category,$level.$value->name.' > ');
        }
    }
    return $category;
}
$data = Category::find()->all();
$category=[0=>'Root'];
$value=getAllCategory(0,$data,$category);
// echo "<pre>";
// echo "GIa tri của value";
// var_dump($value);
// die; 
?>
<div class="category-form">
<?php $cat = new Category;$cat->_cats=['0'=>'select value'];?>
    <?php $form = ActiveForm::begin(); $months;  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'status')->checkbox();?>
    
    <?= $form->field($model, 'parent')->dropdownList($value);?>
<!-- Category::getAllCategory(),['1'=>'Select Category'] -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
