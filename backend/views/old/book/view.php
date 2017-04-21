<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Category;
/* @var $this yii\web\View */
/* @var $model backend\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute'=>'cate',
                'value'=>Category::getParentName($model->cate) ? Category::getParentName($model->cate) : 'Không tìm thấy',
                'format'=>'raw'
            ],
            'slug',
            'image',
            'desc',
            'content:ntext',
            'price',
            'quantiny',
            'author',
            'page',
            'status',
            'publish_at',
            [
                'attribute'=>'created_at',
                'value'=>date('d-m-Y',$model->created_at),
            ],
            [
                'attribute'=>'updated_at',
                'value'=>date('d-m-Y',$model->updated_at),
            ],
        ],
    ]) ?>

</div>
