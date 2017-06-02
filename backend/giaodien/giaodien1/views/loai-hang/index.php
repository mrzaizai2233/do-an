<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SearchLoaihang */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loaihangs';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="row">
    <div class="col-md-2">
                    <div id="jsTree">
                    </div>
    </div>
    <div class="col-md-10">
        <div class="loaihang-index">
            <div id="ajaxCrudDatatable">
                <?= GridView::widget([
                    'id' => 'crud-datatable',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'pjax' => true,
                    'columns' => require(__DIR__ . '/_columns.php'),
                    'toolbar' => [
                        ['content' =>
                            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                                ['role' => 'modal-remote', 'title' => 'Create new Loaihangs', 'class' => 'btn btn-default']) .
                            Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                            '{toggleData}' .
                            '{export}'
                        ],
                    ],
                    'striped' => true,
                    'condensed' => true,
                    'responsive' => true,
                    'panel' => [
                        'type' => 'grey',
                        'heading' => '<i class="glyphicon glyphicon-list"></i> Loaihangs listing',
                        'before' => '<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                        'after' => BulkButtonWidget::widget([
                                'buttons' => Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                                    ["bulk-delete"],
                                    [
                                        "class" => "btn btn-danger btn-xs",
                                        'role' => 'modal-remote-bulk',
                                        'data-confirm' => false, 'data-method' => false,// for overide yii data api
                                        'data-request-method' => 'post',
                                        'data-confirm-title' => 'Are you sure?',
                                        'data-confirm-message' => 'Are you sure want to delete this item'
                                    ]),
                            ]) .
                            '<div class="clearfix"></div>',
                    ]
                ]) ?>
            </div>
        </div>
        <?php Modal::begin([
            "id" => "ajaxCrudModal",
            "footer" => "",// always need it for jquery plugin
        ]) ?>
        <?php Modal::end(); ?></div>
</div>
<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/jstree/jstree.min.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]); ?>
<?php $this->registerCssFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/jstree/themes/default/style.min.css', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl . '/../giaodien/giaodien1/assets/library/jstree/index.js', ['depends' => ['backend\assets\Giaodien1'], 'position' => yii\web\View::POS_END]); ?>

