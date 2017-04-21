<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
// echo Yii::$app->urlManager->baseUrl;
$this->title = 'My Yii Application';
?>
<img src="http://yiiad.dev:81/source/123.png">
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
        <?php if($book){
            foreach ($book as $key => $value) {
           

        ?>
            <div class="col-lg-4 " style="height:350px;">
                <h2><?= $value->name ?></h2>

                <p><?= $value->desc ?></p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>

            <?php }}?>
        </div>

    </div>
</div>
