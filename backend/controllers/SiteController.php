<?php
namespace backend\controllers;

use common\models\base;
use common\models\Hanghoa;
use common\models\Loaihang;
use common\models\Nhacungcap;
use common\models\Phanquyen;
use common\models\Thuonghieu;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\UploadForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['logout','index','importhang'],
                        'allow' => true,
                        'roles' => ['@']

                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                ],
            ]
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    /**
     * @inheritdoc
     */

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        // $model = new UploadForm();

        //  if (Yii::$app->request->isPost) {

        //      $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');

        //      if ($model->upload()) {
        //          // file is uploaded successfully
        //          return;
        //      }
        //  }

        //  return $this->render('upload', ['model' => $model]);
        $this->layout = 'loginLayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionImporthang(){
        $file = UploadedFile::getInstanceByName('filehanghoa');
        if(!is_null($file)){
            $nameFile = base::convertStr(time().$file->name);
            $path= dirname(dirname(__DIR__)).'/files/'.$nameFile;
            $file->saveAs($path);

            $inputFileType = \PHPExcel_IOFactory::identify($path);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $data= $objReader->load($path)->getSheet(0)->toArray(null,true,true,true);
            if(count($data)>=2){
                foreach ($data as $index => $item) {
                    if($index<=1)
                        continue;
                    $hanghoa = new Hanghoa();
                    $hanghoa->mahang=$item['A'];
                    $hanghoa->tenhang=$item['B'];
                    $hanghoa->soluong=$item['C'];
                    $hanghoa->dongia=$item['D'];
                    $hanghoa->tinhtrang=$item['E'];
                    $hanghoa->noibat=$item['F']!=null?'noibat':'khongnoibat';
                    $hanghoa->banchay=$item['G']!=null?'banchay':'khongbanchay';
                    $hanghoa->code=base::convertStr($item['B']);

                    $loaihang= Loaihang::find()->where(['code'=>base::convertStr($item['H'])])->one();
                    if(count($loaihang)==0){
                        $loaihang =new Loaihang();
                        $loaihang->tenloaihang=$item['H'];
                        $loaihang->parent=0;
                        $loaihang->stt=0;
                        $loaihang->trangthai=1;
                        $loaihang->save();
                    }
                    $hanghoa->loaihang_id= $loaihang->id;

                    $nhacungcap= Nhacungcap::find()->where(['code'=>base::convertStr($item['I'])])->one();
                    if(count($nhacungcap)==0){
                        $nhacungcap =new Nhacungcap();
                        $nhacungcap->tennhacungcap=$item['I'];
                        $nhacungcap->save();
                    }
                    $hanghoa->nhacungcap_id= $nhacungcap->id;

                    $thuonghieu= Thuonghieu::find()->where(['code'=>base::convertStr($item['J'])])->one();
                    if(count($thuonghieu)==0){
                        $thuonghieu =new Thuonghieu();
                        $thuonghieu->tenthuonghieu=$item['J'];
                        $thuonghieu->save();
                    }
                    $hanghoa->thuonghieu_id= $thuonghieu->id;

                    $hanghoa->ngaynhap=base::dmy2ymd($item['K']);
                    $hanghoa->save();
//                    $hanghoa->=$item['A'];
//                    $hanghoa->=$item['A'];
                }
            }
        }
        return $this->render('importhang');
    }
}
