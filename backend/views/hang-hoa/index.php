<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\User;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SearchHanghoa */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hanghoas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hanghoa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Hanghoa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['class'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'mahang',
            'tenhang',
            'soluong',
            [

                'attribute'=>'dongia',
                'label'=>User::EVENT_AFTER_LOGIN,
                'content'=>function($model){
                    /**
                     * @var $model \common\models\Hanghoa
                     */
                    return number_format($model->dongia,0,',','.');
                }
            ],
            [
                'attribute'=>'tinhtrang',
                'content'=>function($model){
                    return \common\models\base::getTinhTrang($model->tinhtrang);
                }
            ],
            // 'noibat',
            // 'banchay',
            // 'motangangon',
            // 'motachitiet:ntext',
            // 'luotxem',
            [
                'attribute'=>'loaihang_id',
                'content'=>function($model){
                    return \common\models\base::getNameLoaiHang($model->loaihang_id);
                }
            ],
            // 'nhacungcap_id',
            // 'thuonghieu_id',
            // 'code',
            // 'created',
            // 'updated',
            // 'ngaynhap',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
            