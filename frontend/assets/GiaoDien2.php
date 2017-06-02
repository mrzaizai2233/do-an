<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class GiaoDien1 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "frontend/giaodien/giaodien1/assets/lib/bootstrap/css/bootstrap.min.css",
        "frontend/giaodien/giaodien1/assets/lib/font-awesome/css/font-awesome.min.css",
        "frontend/giaodien/giaodien1/assets/lib/select2/css/select2.min.css",
        "frontend/giaodien/giaodien1/assets/lib/jquery.bxslider/jquery.bxslider.css",
        "frontend/giaodien/giaodien1/assets/lib/owl.carousel/owl.carousel.css",
        "frontend/giaodien/giaodien1/assets/lib/jquery-ui/jquery-ui.css",
        "frontend/giaodien/giaodien1/assets/css/animate.css",
        "frontend/giaodien/giaodien1/assets/css/reset.css",
        "frontend/giaodien/giaodien1/assets/css/style.css",
        "frontend/giaodien/giaodien1/assets/css/responsive.css",
        "frontend/giaodien/giaodien1/assets/css/option3.css",
        "frontend/giaodien/giaodien1/assets/css/toastr.min.css",
    ];
    public $js = [
        
        
        "frontend/giaodien/giaodien1/assets/lib/jquery/jquery-1.11.2.min.js",
        "frontend/giaodien/giaodien1/assets/lib/bootstrap/js/bootstrap.min.js",
        "frontend/giaodien/giaodien1/assets/lib/select2/js/select2.min.js",
        "frontend/giaodien/giaodien1/assets/lib/typehead/bootstrap3-typeahead.min.js",
        "frontend/giaodien/giaodien1/assets/lib/jquery.bxslider/jquery.bxslider.min.js",
        "frontend/giaodien/giaodien1/assets/lib/owl.carousel/owl.carousel.min.js",
        "frontend/giaodien/giaodien1/assets/lib/jquery.countdown/jquery.countdown.min.js",
        
        "frontend/giaodien/giaodien1/assets/lib/jquery-ui/jquery-ui.min.js",
        "frontend/giaodien/giaodien1/assets/js/jquery.actual.min.js",
        "frontend/giaodien/giaodien1/assets/lib/countdown/jquery.plugin.js",
        "frontend/giaodien/giaodien1/assets/lib/countdown/jquery.countdown.js",
        
        "frontend/giaodien/giaodien1/assets/js/theme-script.js",
        "frontend/giaodien/giaodien1/assets/lib/jquery.elevatezoom.js",
        "frontend/giaodien/giaodien1/assets/lib/fancyBox/jquery.fancybox.js",
        "frontend/giaodien/giaodien1/assets/lib/toastr.min.js",
        "frontend/giaodien/giaodien1/assets/lib/ui-toastr-notifications.js",
        "frontend/giaodien/giaodien1/assets/js/hanghoa.js",


    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
