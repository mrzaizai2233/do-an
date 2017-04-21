<?php
namespace frontend\controllers;

use common\models\Chitiethang;
use common\models\Donhang;
use common\models\Hanghoa;
use common\models\Loaihang;
use common\models\Nhacungcap;
use common\models\Thuonghieu;
use Faker\Provider\Base;
use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Contact;
use backend\models\Book;
use yii\web\HttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation=false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $hangNoibats = Hanghoa::find()->where('noibat=noibat')->all();
        $hangBanchays = Hanghoa::find()->where('banchay=banchay')->limit(10)->all();
        $loaihangs= Loaihang::find()->all();
        return $this->render('index',[
            'hangNoiBats'=>$hangNoibats,
            'hangBanchays'=>$hangBanchays,
            'loaihangs'=>$loaihangs
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        } 
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        $contact = new Contact();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $contact->name = Yii::$app->request->post()['ContactForm']['name'];
            $contact->email = Yii::$app->request->post()['ContactForm']['email'];
            $contact->subject = Yii::$app->request->post()['ContactForm']['subject'];
            $contact->body = Yii::$app->request->post()['ContactForm']['body'];
            $contact->save();
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
             
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    public function actionCategory($code){
        /**
         * @var $loaihang Loaihang
         */
        $loaihang = Loaihang::find()->where('code=:c',[':c'=>$code])->one();
        If(count($loaihang)>0){
            $nhacungcaps = Nhacungcap::find()->all();
            $thuonghieus = Thuonghieu::find()->all();
            $loaihangs = Loaihang::find()->all();
            $query = Hanghoa::find()->where('loaihang_id=:lh',[':lh'=>$loaihang->id]);
            $pagination = new Pagination([
                'defaultPageSize'=>9,
                'totalCount'=>$query->count()
            ]);
            $models = $query->orderBy('ngaynhap')
                ->offset($pagination->offset)
                ->limit(($pagination->limit))
                ->all();

            $hanghoas = $loaihang->hanghoas;
            return $this->render('category',[
                'nhacungcaps'=>$nhacungcaps,
                'thuonghieus'=>$thuonghieus,
                'hanghoas'=>$models,
                'loaihangs'=>$loaihangs,
                'loaihang'=>$loaihang,
                'pagination'=>$pagination
            ]);

        }
        else {
            throw  new \HttpException(404,"Trang này không tồn tại");
        }
    }
    public function actionProduct($code){
        /**
         * @var $hanghoa Hanghoa
         */

        $hanghoas= Hanghoa::find()->where('code=:c',[':c'=>$code])->one();
        Hanghoa::updateAllCounters(['luotxem'=>1],['id'=>$hanghoas->id]);
//        $hanghoas->luotxem+=1;
//        $hanghoas->save();
        if(count($hanghoas)>0){
            $hanglienquans = Hanghoa::find()->where('loaihang_id=:il or nhacungcap_id=:in or thuonghieu_id=:it',[':il'=>$hanghoas->loaihang_id,':in'=>$hanghoas->nhacungcap_id,':it'=>$hanghoas->thuonghieu_id])->groupBy('id')->all();
            $hangbanchays = Hanghoa::find()->where('banchay=banchay')->all();
            $loaihangs = Loaihang::find()->all();
            $nhieuluotviews= Hanghoa::find()->orderBy(['luotxem'=>SORT_DESC])->limit(3)->all();
            $hangnoibats = Hanghoa::find()->where('noibat = noibat')->all();
            return $this->render('product',[
                'hanghoas'=>$hanghoas,
                'hanglienquans'=>$hanglienquans,
                'hangbanchays'=>$hangbanchays,
                'loaihangs'=>$loaihangs,
                'nhieuluotviews'=>$nhieuluotviews,
                'hangnoibats'=>$hangnoibats,
            ]);
        }
        else {

        }
    }
    public function actionAddcart(){
        if(isset($_POST['soluong'])&&isset($_POST['idProduct'])){
            (int)$soluong = $_POST['soluong'];
            $code = $_POST['idProduct'];
            $hanghoa = Hanghoa::find()->where('code=:c',[':c'=>$code])->one();

            $giohangs=[];
            $soluonghangs=[];
            $tongtien=0;
            $tongsl=0;
            if(Yii::$app->session->get('soluonghang')){
                $soluonghangs=Yii::$app->session->get('soluonghang');
            }
            if(Yii::$app->session->get('giohang')){
                $giohangs= Yii::$app->session->get('giohang');
            }
            /**
             * @var $giohang Hanghoa
             */
            if(array_key_exists($hanghoa->id,$soluonghangs)){
                $soluonghangs[$hanghoa->id]+=$soluong;
            }
            else {
                $soluonghangs[$hanghoa->id]=$soluong;
                $giohangs[]=$hanghoa;

            }
            foreach ($giohangs as $giohang){
                foreach ($soluonghangs as $id=>$soluonghang){
                    if($id==$giohang->id){
                        $tongtien += $giohang->dongia * $soluonghang;
                        $tongsl+=$soluonghang;
                    }
                }
            }



            Yii::$app->session->set('tongsl',$tongsl);
            Yii::$app->session->set('giohang',$giohangs);
            Yii::$app->session->set('soluonghang',$soluonghangs);
            Yii::$app->session->set('tongtien',$tongtien);
            echo Json::encode([
               'minicart'=>$this->renderAjax('minicart',['giohang'=>$giohangs,'soluonghang'=>$soluonghangs,'tongtien'=>$tongtien,'tongsl'=>$tongsl]),
                'alert'=>"Bạn đã đặt {$soluong} sản phẩm {$hanghoa->tenhang} </br> <a href='/gio-hang' class='btn btn-success'>Xem giỏ hàng</a> "
            ]);


        } else {
            throw new HttpException(400,"không có thông tin về hàng hóa");
        }


    }
    public function actionGiohang(){
        $gioHangs=[];
        $soLuongHangs=[];
        $tongtien=0;
        $gioHangs=Yii::$app->session->get('giohang')?Yii::$app->session->get('giohang'):null;
        $soLuongHangs=Yii::$app->session->get('soluonghang')?Yii::$app->session->get('soluonghang'):null;
        $tongtien=Yii::$app->session->get('tongtien');

        if(isset(Yii::$app->request->post()['soluong'])){
            $soLuongHangs=[];
            $tongtien=0;
            $tongsl=0;
            foreach (Yii::$app->request->post()['soluong'] as $code => $soluongmoi) {
                $hangHoa=Hanghoa::find()->where(['code'=>$code])->one();
                $soLuongHangs[$hangHoa->id]=$soluongmoi;
                $tongtien+=$hangHoa->dongia * $soluongmoi;
                $tongsl+=$soluongmoi;
            }
            Yii::$app->session->set('soluonghang',$soLuongHangs);
            Yii::$app->session->set('tongtien',$tongtien);
            Yii::$app->session->set('tongsl',$tongsl);
        };
        return $this->render('giohang',[
            'gioHangs'=>$gioHangs,
            'soLuonghangs'=>$soLuongHangs,
            'tongTien'=>$tongtien
        ]);
    }
    public function actionXoatronggiohang($code){
        $gioHangs = Yii::$app->session->get('giohang');
        $soLuongHang = Yii::$app->session->get('soluonghang');
        $tongtien=Yii::$app->session->get('tongtien');
        $tongsl=Yii::$app->session->get('tongsl');
        foreach ($gioHangs as  $key => $gioHang) {
            if($gioHang->code=== $code){
                unset($gioHangs[$key]);
                $tongtien-=$gioHang->dongia*$soLuongHang[$gioHang->id];
                $tongsl-=$soLuongHang[$gioHang->id];
                unset($soLuongHang[$gioHang->id]);
                break;
            }
        }
        Yii::$app->session->set('giohang',$gioHangs);
        Yii::$app->session->set('soluonghang',$soLuongHang);
        Yii::$app->session->set('tongsl',$tongsl);
        Yii::$app->session->set('tongtien',$tongtien);
        $this->redirect(Yii::$app->urlManager->createUrl(['site/giohang']));
    }
    public function actionThanhtoan(){
        $donHang = new Donhang();
        $gioHangs=Yii::$app->session->get('giohang')?Yii::$app->session->get('giohang'):null;
        $soLuongHangs=Yii::$app->session->get('soluonghang')?Yii::$app->session->get('soluonghang'):null;
        $tongtien=Yii::$app->session->get('tongtien');

        if(Yii::$app->request->post()){
            $donHang->load(Yii::$app->request->post());
            if ($donHang->save()) {
                Yii::$app->session->setFlash("thongbao", "Thanh toán thành công");
                $this->redirect('/site/thanhtoan');
                Yii::$app->end();
            }
        }
        return $this->render('thanhtoan',[
            'donhang'=>$donHang,
            'gioHangs'=>$gioHangs,
            'soLuonghangs'=>$soLuongHangs,
            'tongTien'=>$tongtien
        ]);
    }
    public function actionTimkiem(){
        if(isset($_POST["keyword"])){
            $hanghoas = Chitiethang::find()->select('*')->where('mahang LIKE :k or tenhang LIKE :k or tenthuonghieu LIKE :k or tennhacungcap LIKE :k',[':k'=>"%{$_POST['keyword']}%"])->groupBy(['id'])->all();
            return $this->render('timkiem',['hanghoas'=>$hanghoas,]);
        } else {
            throw new HttpException(404,"Trang này không tồn tại");
        }
    }
    public function actionTest(){
        $loaihangs = Loaihang::find()->all();
        foreach ($loaihangs as $index => $item) {
            if($item->parent==0){
//           echo $item->tenloaihang." có ".\common\models\base::checkMutiLV($id)."<br>";
                echo \common\models\base::checkMenuMutiLevel($loaihangs,$item->id,0).'<br>';
               // echo "{$item->tenloaihang} co ".\common\models\base::checkMenuMutiLevel($loaihangs,$id,0)."<br>";
            }
        }
    }
    public function actionGetallloaihang(){
        $loaihangs=Loaihang::findOne(16);
        var_dump($loaihangs);
        $loaihang=new Loaihang();
        $loaihang->deleteMany($loaihangs);

    }
}
