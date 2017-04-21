<?php

namespace backend\controllers;

use common\models\Chucnang;
use common\models\Phanquyen;
use common\models\Vaitro;
use common\models\VaitroChucnang;
use common\models\Vaitronguoidung;
use Yii;
use common\models\User;
use common\models\Search\SearchUser;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'view', 'delete','phanquyen','luuphanquyen'],
                        'allow' => true,
                        'matchCallback'=>function($rule,$action){
                            if(Yii::$app->user->identity->username=="superadmin"){
                                return true;
                            }
                            return false;
////                            $action=Yii::$app->controller->action->id;
////                            $controller=str_replace ('-','',Yii::$app->controller->id);
////                            $role=$action.'_'.$controller;
////                            return (new Phanquyen())->isAccess($role);
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new SearchUser();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "User #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new User model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $vaitronguoidung = New Vaitronguoidung();
        $vaitro = Vaitro::find()->all();
        $model = new User();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new User",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'vaitronguoidung'=>$vaitronguoidung,
                        'vaitro'=>$vaitro

                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new User",
                    'content'=>'<span class="text-success">Create User success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new User",
                    'content'=>$this->renderAjax('create', [
                        'vaitronguoidung'=>$vaitronguoidung,
                        'model' => $model,
                        'vaitro'=>$vaitro
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'vaitronguoidung'=>$vaitronguoidung,
                    'model' => $model,
                    'vaitro'=>$vaitro

                ]);
            }
        }
       
    }

    /**
     * Updates an existing User model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $vaitro = Vaitro::find()->all();
        $request = Yii::$app->request;
        $model = $this->findModel($id);
        $idvaitro=[];

        foreach ( $model->vaitronguoidungs  as $index => $item) {
            $idvaitro[]=$item->vaitro_id;
        }
        $vaitronguoidung = New Vaitronguoidung();
        $vaitronguoidung->setIsNewRecord(false);
        $vaitronguoidung->vaitro_id=$idvaitro;
        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update User #".$id,
                    'content'=>$this->renderAjax('update', [
                        'vaitronguoidung'=>$vaitronguoidung,
                        'model' => $model,
                        'vaitro'=>$vaitro,

                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "User #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update User #".$id,
                    'content'=>$this->renderAjax('update', [
                        'vaitronguoidung'=>$vaitronguoidung,
                        'model' => $model,
                        'vaitro'=>$vaitro,

                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'vaitronguoidung'=>$vaitronguoidung,
                    'model' => $model,
                    'vaitro'=>$vaitro,

                ]);
            }
        }
    }

    /**
     * Delete an existing User model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing User model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionPhanquyen(){
        $datas = VaitroChucnang::find()->select('vaitro_id,chucnang_id')->all();
        $dataCheck=[];
        $idchucnangs=[];
        $idvaitro=[];
        $vtcn=[];
        $vaiTros = Vaitro::find()->all();
        $nhomChucNang = Chucnang::find()->groupBy(['nhom'])->all();

        $chucNangTheoNhom=[];
        foreach ($nhomChucNang as $index => $chucNang) {
            $chucNangTheoNhom[$chucNang->nhom]= Chucnang::find()->where(['nhom'=>$chucNang->nhom])->all();
            foreach ($chucNangTheoNhom[$chucNang->nhom] as $item){
                $idchucnangs[]=$item->id;
            }
        }
        

//        foreach ($idchucnangs as $index => $idchucnang) {
//            foreach ($idvaitros as $index => $idvaitro) {
//                foreach ($datas as $index => $data) {
//                    echo "[{$idchucnang}][{$idvaitro}]=[{$data->chucnang_id}][{$data->vaitro_id}]<br/>";
//                    if($idchucnang==$data->chucnang_id && $idvaitro==$data->vaitro_id){
//                        $dataCheck[$idchucnang][$idvaitro]=1;
//                    }
//                    else
//                    {
//                        $dataCheck[$idchucnang][$idvaitro]=0;
//                    }
//                }
//            }
//        }

    return $this->render('phanquyen',[
        'vaiTros'=>$vaiTros,
        'chucNangTheoNhom'=>$chucNangTheoNhom,
        'nhomChucNang'=>$nhomChucNang,
        'datas'=>$datas
    ]);
    }
    public function actionLuuphanquyen(){
        if(isset($_POST["vaitrochucnang"])){
            VaitroChucnang::deleteAll();
            foreach ($_POST['vaitrochucnang'] as $idchucnang => $item) {
                foreach ($_POST['vaitrochucnang'][$idchucnang] as $idvaitro =>$value) {
                    $vaitrochucnang = new VaitroChucnang();
                    $vaitrochucnang->chucnang_id=$idchucnang;
                    $vaitrochucnang->vaitro_id=$idvaitro;
                    $vaitrochucnang->save();
                }
            }
        }
    }
}
