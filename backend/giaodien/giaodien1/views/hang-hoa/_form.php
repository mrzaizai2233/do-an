<?php

use common\models\Attribute;
use common\models\Attributevalue;
use common\models\AttributevalueProduct;
use letyii\tinymce\Tinymce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Loaihang;
use common\models\Nhacungcap;
use common\models\Thuonghieu;
use yii\jui\DatePicker;

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
                        'class' => 'form-control'
                    ],
                    'options' => ['class' => 'form-control disable']
                ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'soluong')->textInput(['type' => 'number', 'min' => 0]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'dongia')->textInput(['type' => 'number', 'min' => 0]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'tinhtrang')->dropDownList(['conhang' => 'Còn Hàng', 'hethang' => 'Hết Hàng',]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'noibat')->dropDownList(['noibat' => 'Nổi Bật', 'khongnoibat' => 'Không Nổi bật',]) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?= $form->field($model, 'banchay')->dropDownList(['banchay' => 'Bán Chạy', 'khongbanchay' => 'Không bán chạy',]) ?>
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
                    'id', 'tenloaihang'
                ),
                ['prompt' => 'Chọn']
            ) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'nhacungcap_id')->dropDownList(ArrayHelper::map(Nhacungcap::find()->all(), 'id', 'tennhacungcap'), ['prompt' => 'Chọn']) ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= $form->field($model, 'thuonghieu_id')->dropDownList(
                ArrayHelper::map(
                    Thuonghieu::find()->all(),
                    'id',
                    'tenthuonghieu'
                ),
                ['prompt' => 'Chọn']
            ) ?>
        </div>
    </div>
    <?= $form->field($model, 'motangangon')->widget(\dosamigos\tinymce\TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'vi',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor image",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'image_advtab' => 'true',

            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]) ?>

    <?= $form->field($model, 'motachitiet')->widget(\dosamigos\tinymce\TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'vi',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor image",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            "image_advtab" => "true",
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]) ?>
    <div class="row">
        <div class="col-lg-12">
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Thêm thuộc tính</a></li>
                <li><a href="#profile" data-toggle="tab">Thêm Loại sản phẩm</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div id="home" class="tab-pane fade in active">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="row-att">
                                        <thead>
                                        <tr>
                                            <th width="45%">Thuộc tính</th>
                                            <th width="45%">giá trị</th>
                                            <th>Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        if(!$model->isNewRecord){
                                            $att=Attribute::find()->all();
                                            $attVal= Attributevalue::find()->all();
                                            $attVal_products= AttributevalueProduct::find()->where(['hanghoa_id'=>$model->id])->all();

                                        foreach ($attVal_products as $index => $item) {?>
                                            <tr data-index="<?=$index?>">
                                                <td><?=Html::dropDownList("att[{$index}]",'',ArrayHelper::map($att,'id','AttributeName'),['class'=>'form-control att'])?></td>
                                                <td><?=Html::dropDownList("attValue[{$index}]",$item->attributevalue_id,ArrayHelper::map($attVal,'id','AttributeValueName'),['class'=>'form-control att'])?></td>
                                                <td class='text-center'>
                                                    <button class='btn btn-danger btn-remove-row'>
                                                        <i class='glyphicon glyphicon-trash'></i>
                                                    </button>
                                            </tr>
                                        <?php }?>
                                            <input type="hidden" id="indexRow" value="<?=count($attVal_products)-1?>">
                                        <?php } else {?>
                                            <input type="hidden" id="indexRow" value="0">
                                        <?php }?>

                                        <tr>
                                            <td class="text-center" colspan="3"><input type="button"
                                                                                       class="form-control btn btn-primary themThuocTinh"
                                                                                       value="Thêm"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="profile" class="tab-pane fade"><p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                        single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level
                        wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress,
                        commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl
                        cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
                        helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio
                        cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson
                        biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente
                        accusamus tattooed echo park.</p></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?= Html::label('Hình Ảnh', 'hinh-anh', ['class' => 'from-control']) ?>
            <?= Html::fileInput('HinhAnhs[]', null, ['id' => 'hinh-anh', 'multiple' => 'multiple']) ?>
        </div>
    </div>
    <div class="row">
        <?php if (!$model->isNewRecord):
            foreach ($model->hinhanhs as $hinhanh): ?>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?= Html::img('../../../images/' . $hinhanh->file, ['height' => '150px', 'data-id' => $hinhanh->id]) ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <?= Html::button('Xóa Ảnh', ['class' => 'btn btn-danger xoaanh', 'data-id' => $hinhanh->id]) ?>
                    </div>
                </div>
            <?php endforeach;endif; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/js/xoahinhanh.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]); ?>
<?php //$this->registerJsFile(Yii::$app->request->baseUrl.'/../giaodien/giaodien1/assets/vendors/bootstrap/js/bootstrap.min.js',['depends'=>['backend\assets\Giaodien1'],'position'=>yii\web\View::POS_END]);?>

<?php //$this->registerJs(""); ?>


