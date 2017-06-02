<?php
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Discount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'percentage' => 'Phần trăm', 'fixedamount' => 'Giá', ], ['prompt' => 'Chọn']) ?>

    <?= $form->field($model, 'total_amount')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>
    <?= $form->field($model, 'date_start')->textInput(['id'=>'dateRangePicker']) ?>

    <?= $form->field($model, 'date_end')->textInput()?>

    <?= $form->field($model, 'status')->dropDownList([0=>'Không hoạt Động',1=>'Hoạt động']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<?php
$this->registerCssFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/daterange/daterangepicker.css', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);

$this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/daterange/moment.min.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/daterange/daterangepicker.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/js/jsview/discount.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);

?>