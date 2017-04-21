<?php
use \yii\web\Request;
/*$request = new Request();
$baseUrl = str_replace('frontend/web','',$request->baseUrl); */
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'view'=>[
            'theme'=>[
              'pathMap'=>[
                  '@app/views'=>'@frontend/giaodien/giaodien1/views'
              ]  ,
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'suffix'=>'.html',
             'rules' => [
                 ''=>'site/index',
                 '<action:(category|product)>-<code:.*?>-<page:\d+>'=>'site/<action>',
                'gio-hang'=>'site/giohang'
             ],
        ],
        
    ],
    'params' => $params,
];
