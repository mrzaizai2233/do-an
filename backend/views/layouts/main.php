<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.8.23/jquery-ui.js"></script>
        <?= Html::csrfMetaTags() ?>
            <title>
                <?= Html::encode($this->title) ?>
            </title>
            <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'category', 'url' => ['/category/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
                <div class="container-fluid">
                    <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
                        <?= Alert::widget() ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Menu</h3>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <?= Html::a('Quản lý danh mục',['/category/index'])?>
                                        </li>
                                        <li class="list-group-item">
                                            <?= Html::a('Quản lý sách',['/book'])?>
                                        </li>
                                        <li class="list-group-item">
                                        <?= Html::a('Quản lý file',['/file'])?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <?= $content ?>
                            </div>
                </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company
                    <?= date('Y') ?>
                </p>
                <p class="pull-right">
                    <?= Yii::powered() ?>
                </p>
            </div>
        </footer>
        <?php $this->endBody() ?>
<!--        <script type="text/javascript">-->
<!--        $(document).ready(function() {-->
<!--            tinymce.init({-->
<!--                selector: '', // change this value according to your HTML-->
<!--                plugins: [-->
<!--                // "codemirror advlist autolink lists link image charmap print preview hr anchor pagebreak",-->
<!--                "searchreplace wordcount visualblocks visualchars fullscreen",-->
<!--                "insertdatetime media nonbreaking save table contextmenu directionality",-->
<!--                "emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"-->
<!--                ],-->
<!--                toolbar1: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",-->
<!--                toolbar2: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",-->
<!--                a_plugin_option: true,-->
<!--                a_configuration_option: 400,-->
<!--                relative_urls: false, -->
<!--                remove_script_host : true,-->
<!--                external_filemanager_path:'http://yiiad.dev:81/backend/web/filemanager/',-->
<!--                external_plugins: { 'filemanager' : 'http://yiiad.dev:81/backend/web/filemanager/plugin.min.js'}-->
<!---->
<!--            });-->
<!--        });-->
<!--        </script>-->
    </body>

    </html>
    <?php $this->endPage() ?>
