<?php

use common\models\base;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\Search\SearchDonhang */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quản lý đơn hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
        <div class="form-group">

            <div class="col-md-12 pull-left">
                <div class="btn btn-blue reportrange" id="daterange">
                    <i class="fa fa-calendar"></i>
                    <span></span>
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-grey">
            <div class="panel-heading"> Danh sách đơn hàng</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?php Pjax::begin(['id' => 'grid-donhang', 'enablePushState' => false]); ?>
                    <?= GridView::widget([
                        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'DHCT',
                                'value' => function ($data) {
                                    return Html::button("#{$data->id}", ['class' => 'btn-view-don-hang btn btn-success btn-sm', 'id' => "donhang-{$data->id}"]);
                                },
                                'format' => 'raw'
                            ],
                            'hoten',
                            'diachi',
                            'email:email',
                            'dienthoai',
                            'tongtien',
                            'ngaylap',
                            'soluong',
                            [
                                'label' => 'print',
                                'value' => function ($data) {
                                    return Html::button('<i class="fa fa-print"></i>', ['class' => 'btn btn-sm btn-grey btn-print-dh', 'value' => $data->id]);
                                },
                                'format' => 'raw'
                            ]
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    'id' => 'modal-chitiet-donhang',
    'size' => Modal::SIZE_LARGE
]) ?>
<?php Pjax::begin(['id' => 'grid-donhangchitiet', 'enablePushState' => false]); ?>
<?= GridView::widget([
    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
    'dataProvider' => $dataProvider_DHCT,
//    'filterModel' => $SearchChitiethang_DHCT,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'Hình Ảnh',
            'value' => function ($data) {
                return Html::img("/images/" . base::checkImageProduct($data->hanghoa->hinhanhs), ['style' => [
                    'width' => '150px',
                    'height' => '150px'
                ]]);
            },
            "format" => "raw",
        ],
        [
            'attribute' => 'Tên hàng',
            'value' => function ($data) {
                return $data->hanghoa->tenhang;
            }
        ],
        [
            'attribute' => 'Số lượng',
            'value' => function ($data) {
                return Html::textInput("soluong[{$data->id}]", $data->soluong, ['class' => 'form-control txt-soluong', 'type' => 'number']);
            },
            'format' => 'raw'
        ],
        [
            'label' => 'Đơn giá',
            'value' => function ($data) {
                return number_format($data->hanghoa->dongia, 0, ',', ',');
            }
        ],
        [
            'label' => 'Thành tiền',
            'value' => function ($data) {
                return number_format($data->thanhtien, 0, ',', ',');
            }
        ],
        [
            'label' => 'Xóa',
            'value' => function ($data) {
                return Html::button('<i class="fa fa-trash-o"></i>', [
                    'class' => 'btn btn-warning btn-xoa-dhct',
                    'id' => 'dhct-' . $data->id
                ]);
            },
            'format' => 'raw'
        ]

    ],
]); ?>
<?php Pjax::end(); ?>
<?php Modal::end() ?>
<?php
//$this->registerCssFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);
//$this->registerCssFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);
$this->registerCssFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/daterange/daterangepicker.css', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);

$this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/daterange/moment.min.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/daterange/daterangepicker.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/js/jsview/indexDonhang.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END])
?>
