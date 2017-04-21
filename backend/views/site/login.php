<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<!DOCTYPE html>
<html lang="en">
<head><title>Đăng nhập quản lý hệ thống</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">

    <link type="text/css" rel="stylesheet" href="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.css">
    <link type="text/css" rel="stylesheet" href="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/bootstrap/css/bootstrap.min.css">
    <!--Loading style vendors-->
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/iCheck/skins/all.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>css/themes/style1/pink-violet.css" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>css/style-responsive.css">
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body id="signin-page">
<div class="page-form">
    <?php $form = ActiveForm::begin((['id' => 'login-form','class'=>'form'])); ?>
        <div class="header-content"><h1>Đăng nhập hệ thống </h1></div>
        <div class="body-content">

            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i>
                    <?=Html::activeInput('input',$model,'username',['class'=>'form-control','placeholder'=>"Tên đăng nhập"])?>
<!--                    <input type="text" placeholder="Username" name="username" class="form-control">-->
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i>
                    <?=Html::activeInput('password',$model,'password',['class'=>'form-control','placeholder'=>"Mật khẩu"])?>
<!--                    <input type="password" placeholder="Password" name="password" class="form-control">-->
                </div>
            </div>
            <div class="form-group pull-left">
                <div class="checkbox-list"><label>
                        <?=Html::activeInput('checkbox',$model,'rememberMe')?>
<!--                        <input type="checkbox">-->
                        &nbsp;
                        Lưu tài khoản</label></div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success">Đăng nhập
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
            <div class="clearfix"></div>
            <div class="forget-password">

            </div>
    <?php ActiveForm::end(); ?>
</div>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>js/jquery-1.10.2.min.js"></script>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>js/html5shiv.js"></script>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>js/respond.min.js"></script>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/iCheck/icheck.min.js"></script>
<script src="<?=Yii::$app->urlManager->getBaseUrl().'/../giaodien/giaodien1/assets/'?>vendors/iCheck/custom.min.js"></script>
<script>//BEGIN CHECKBOX & RADIO
    $('input[type="checkbox"]').iCheck({
        checkboxClass: 'icheckbox_minimal-grey',
        increaseArea: '20%' // optional
    });
    $('input[type="radio"]').iCheck({
        radioClass: 'iradio_minimal-grey',
        increaseArea: '20%' // optional
    });
    //END CHECKBOX & RADIO</script>
</body>
</html>

