<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Loaihang;
use common\models\Nhacungcap;
use common\models\Thuonghieu;
use yii\jui\DatePicker;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\Hanghoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hanghoa-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data']]
    ); ?>

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <?= $form->field($model, 'mahang')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <?= $form->field($model, 'tenhang')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <?= $form->field($model, 'ngaynhap')->widget(DatePicker::classname(),
                [
                    'dateFormat' => 'dd/MM/yyyy',
                    'clientOptions' => [
                        'changeMonth' => true,
                        'yearRange' => '1996:2099',
                        'changeYear' => true,
                        'class'=>'form-control'
                    ],
                    'options' => ['class' => 'form-control disable']
                ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'soluong')->textInput(['type'=>'number','min'=>0]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'dongia')->textInput(['type'=>'number','min'=>0]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'tinhtrang')->dropDownList([ 'conhang' => 'Còn Hàng', 'hethang' => 'Hết Hàng', ]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'noibat')->dropDownList([ 'noibat' => 'Nổi Bật', 'khongnoibat' => 'Không Nổi bật', ]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'banchay')->dropDownList([ 'banchay' => 'Bán Chạy', 'khongbanchay' => 'Không bán chạy', ]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'luotxem')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'loaihang_id')->dropDownList(
                ArrayHelper::map(
                    Loaihang::find()->all(),
                    'id','tenloaihang'
                ),
                ['prompt'=>'Chọn']
            ) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'nhacungcap_id')->dropDownList(
                ArrayHelper::map(
                    Nhacungcap::find()->all(),
                    'id',
                    'tennhacungcap'
                ),
                ['prompt'=>'Chọn']
            ) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'thuonghieu_id')->dropDownList(
                ArrayHelper::map(
                    Thuonghieu::find()->all(),
                    'id',
                    'tenthuonghieu'
                ),
                ['prompt'=>'Chọn']
            ) ?>
        </div>
    </div>
    <?= $form->field($model, 'motangangon')->widget(CKEditor::className(), [
        'options' => ['rows' => 3],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'motachitiet')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= Html::label('Hình Ảnh','hinh-anh',['class'=>'from-control']) ?>
            <?= Html::fileInput('HinhAnhs[]',null,['id'=>'hinh-anh','multiple'=>'multiple']) ?>
        </div>
    </div>
    <div class="row">
        <?php if(!$model->isNewRecord):
            foreach($model->hinhanhs as $hinhanh ):   ?>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?= Html::img('../../../images/'.$hinhanh->file,['height'=>'150px','data-id'=>$hinhanh->id]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <?= Html::button('Xóa Ảnh',['class'=>'btn btn-danger xoaanh','data-id'=>$hinhanh->id]) ?>
                    </div>
                </div>
            <?php endforeach;endif; ?>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
