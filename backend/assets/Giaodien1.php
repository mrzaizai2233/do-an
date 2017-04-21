<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class Giaodien1 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700",
        "http://fonts.googleapis.com/css?family=Oswald:400,700,300",
        "/backend/giaodien/giaodien1/assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css",
        "/backend/giaodien/giaodien1/assets/vendors/font-awesome/css/font-awesome.min.css",
        "/backend/giaodien/giaodien1/assets/vendors/bootstrap/css/bootstrap.min.css",
        "/backend/giaodien/giaodien1/assets/vendors/intro.js/introjs.css",
        "/backend/giaodien/giaodien1/assets/vendors/calendar/zabuto_calendar.min.css",
        "/backend/giaodien/giaodien1/assets/vendors/animate.css/animate.css",
        "/backend/giaodien/giaodien1/assets/vendors/jquery-pace/pace.css",
        "/backend/giaodien/giaodien1/assets/vendors/iCheck/skins/all.css",
        "/backend/giaodien/giaodien1/assets/vendors/jquery-news-ticker/jquery.news-ticker.css",
          "/backend/giaodien/giaodien1/assets/css/themes/style1/pink-violet.css",
        "/backend/giaodien/giaodien1/assets/css/style-responsive.css",


    ];
    public $js = [
        'js/tinymce/tinymce.min.js',
//        "/backend/giaodien/giaodien1/assets/js/jquery-1.10.2.min.js",
        "/backend/giaodien/giaodien1/assets/js/jquery-migrate-1.2.1.min.js",
        "/backend/giaodien/giaodien1/assets/js/jquery-ui.js",
//        "/backend/giaodien/giaodien1/assets/vendors/bootstrap/js/bootstrap.min.js",
        "/backend/giaodien/giaodien1/assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js",
        "/backend/giaodien/giaodien1/assets/js/html5shiv.js",
        "/backend/giaodien/giaodien1/assets/js/respond.min.js",
        "/backend/giaodien/giaodien1/assets/vendors/metisMenu/jquery.metisMenu.js",
        "/backend/giaodien/giaodien1/assets/vendors/slimScroll/jquery.slimscroll.js",
        "/backend/giaodien/giaodien1/assets/vendors/jquery-cookie/jquery.cookie.js",
        "/backend/giaodien/giaodien1/assets/vendors/iCheck/icheck.min.js",
        "/backend/giaodien/giaodien1/assets/vendors/iCheck/custom.min.js",
        "/backend/giaodien/giaodien1/assets/vendors/jquery-news-ticker/jquery.news-ticker.js",
        "/backend/giaodien/giaodien1/assets/js/jquery.menu.js",
        "/backend/giaodien/giaodien1/assets/js/print/jquery.printElement.js",
        "/backend/giaodien/giaodien1/assets/vendors/jquery-pace/pace.min.js",
        "/backend/giaodien/giaodien1/assets/vendors/holder/holder.js",
        "/backend/giaodien/giaodien1/assets/vendors/responsive-tabs/responsive-tabs.js",

//        "/backend/giaodien/giaodien1/assets/vendors/intro.js/intro.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.categories.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.pie.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.tooltip.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.resize.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.fillbetween.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.stack.js",
//        "/backend/giaodien/giaodien1/assets/vendors/flot-chart/jquery.flot.spline.js",
//        "/backend/giaodien/giaodien1/assets/vendors/calendar/zabuto_calendar.min.js",
//        "/backend/giaodien/giaodien1/assets/js/index.js",
//
        "/backend/giaodien/giaodien1/assets/js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
