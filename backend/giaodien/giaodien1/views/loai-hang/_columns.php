<?php
use yii\helpers\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tenloaihang',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'code',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'created',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'updated',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'parent',
//    ],
    [
        'label'=>'Trạng thái',
        'value'=>function($data){
            return "<div class='text-center'>".Html::activeCheckbox($data,'trangthai',['label'=>'','id'=>"idcategory-{$data->id}",'class'=>'status-category'])."</div>";
        },
        'format'=>'raw'
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   