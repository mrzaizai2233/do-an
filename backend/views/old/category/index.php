<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckBoxColumn'],
            'name',
            'slug',
            [
                'attribute'=>'parent',
                'content'=>function($model){
                    if($model->parent==0){
                        return 'Root';
                    }
                    else {
                        $parent = Category::getParentName($model->parent);
                        return isset($parent) ? $parent : 'Không tìm thấy'; 

                    }
                    
                }
            ],
            [
                'attribute'=>'status',
                'content'=>function($model){
                    if($model->status==0)
                        return '<span class="label label-danger loading" style="cursor:pointer;cursor:hand;width:100px;display:inline-block;">Ẩn</span>';
                    else
                        return '<span class="label label-success  loading" style="cursor:pointer;cursor:hand;width:100px;display:inline-block;">Hiện</span>';
                },
                'headerOptions'=>[
                ],
                'contentOptions'=>[
                        'style'=>'color:red;width:100px'
                ]
            ],
            [
                'attribute'=>'created_at',
                'content'=>function($model){
                    return date('d-m-Y',$model->created_at);
                }
            ],
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<script type="text/javascript">

    $(document).ready(function(e) {
    $('tr td .label').click(function(){
       var id = $(this).closest("tr").data("key");
       var label = $(this);
        label.addClass('show');
         $.ajax({
            url: '/backend/web/category/change-status', 
            type: 'get',      
            data: {'id':id},
            complete: function(){
                label.removeClass('show');
            },
            success: function(data){          
            if(data==1){
                label.removeClass('label-danger');       
               label.addClass('label-success');     
               label.html('Hiện');  
            }   
            else{
                label.removeClass('label-success');       
               label.addClass('label-danger');     
               label.html('Ẩn');  
            }        
                      
            }       
        });    
    });
});
</script>
