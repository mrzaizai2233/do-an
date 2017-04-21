<?php

namespace backend\controllers;

use common\models\Donhangchitiet;
use common\models\Phanquyen;
use common\models\Search\SearchChitiethang;
use common\models\Search\SearchDonhangchitiet;
use Symfony\Component\BrowserKit\Response;
use Yii;
use common\models\Donhang;
use common\models\Search\SearchDonhang;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonHangController implements the CRUD actions for Donhang model.
 */
class DonHangController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['index', 'create', 'update', 'view', 'delete'],
//                        'allow' => true,
//                        'matchCallback'=>function($rule,$action){
//                            $action=Yii::$app->controller->action->id;
//                            $controller=str_replace ('-','',Yii::$app->controller->id);
//                            $role=$action.'_'.$controller;
//                            return (new Phanquyen())->isAccess($role);
//                        }
//                    ],
//                ],
//            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Donhang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchDonhang();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchDHCT = new Donhangchitiet();
        $idDonhang=-1;
        if(Yii::$app->session->get('idDonHang'))
            $idDonhang=Yii::$app->session->get('idDonHang');

        if(isset($_POST['donhang'])){
            $idDonhang = explode('-',$_POST['donhang'])[1];
            Yii::$app->session->set('idDonHang',$idDonhang);
        }
        $dataProviderDHCT = $searchDHCT->getDonhangchitiet($idDonhang);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'SearchChitiethang_DHCT'=>$searchDHCT,
            'dataProvider_DHCT'=>$dataProviderDHCT
        ]);
    }

    /**
     * Displays a single Donhang model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Donhang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donhang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Donhang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Donhang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Donhang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donhang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donhang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionXoadhct(){
        if(isset($_POST['idDHCT'])){
            $idDhct = explode('-',$_POST['idDHCT'])[1];
            $dhct = Donhangchitiet::findOne($idDhct);
            $dhct->delete();
            echo Json::encode(['idDonHang'=>"donhang-".$dhct->donhang_id]);
        }
    }
    public function actionUpdatedhct(){
        if(isset($_POST['soluong'])){
            $idDhct=key($_POST['soluong']);
            $soLuong=$_POST['soluong'][$idDhct];

            $dhct= Donhangchitiet::findOne($idDhct);
            $dh = Donhang::findone($dhct->donhang_id);
            $thanhtienmoi=$dhct->dongia*$soLuong;
            $thanhtiencu= $dhct->thanhtien;
            $soluongmoi=$soLuong;
            $soluongcu=$dhct->soluong;
            $dhct->updateAttributes(['soluong'=>$soLuong,'thanhtien'=>$thanhtienmoi]);
            $dh->updateAttributes(['soluong'=>($dh->soluong-$soluongcu)+$soluongmoi,'tongtien'=>($dhct->donhang->tongtien-$thanhtiencu)+$thanhtienmoi]);
        }
        echo Json::encode(['idDonHang'=>'donhang-'.$dh->id]);
    }
    public function actionPrint(){
        if(isset($_POST['idDonHang'])){
            $idDonHang= $_POST['idDonHang'];
            $DonHang=Donhang::findOne($idDonHang);
            echo Json::encode([
                'html'=> $this->renderAjax('prinDonhang',['donhangs'=>$DonHang])
            ]);
        }
    }
}
