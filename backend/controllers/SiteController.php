<?php
namespace backend\controllers;

use backend\models\City;
use backend\models\Province;
use backend\models\SignupForm;
use backend\models\TblPhone;
use backend\models\TblRange;
use backend\models\TblSemat;
use backend\models\Upload;
use backend\models\UserForm;
use common\components\jdf;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
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
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'actions' => ['login', 'error'],
//                        'allow' => true,
//                    ],
//                    [
//                        'actions' => ['logout', 'index','signup','city'],
//                        'allow' => true,
//                        'roles' => ['admin'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

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
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();

    }
//
//   public function actionUser(){
//       $model= new UserForm();
//       if($model->load(yii::$app->request->post() && $model -> validate())){
//
//
//         yii::$app->session->setFlash('success','you have entered');
//
//
//       }return $this->render('userForm',['model'=>$model]);
//
//   }


    /**
     * @return string|\yii\web\Response
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        $modelupload= new Upload();

        

        $ostan = ArrayHelper::map(Province::find()->all(), 'name', 'name');
        $reng = ArrayHelper::map(TblRange::find()->all(), 'id', 'name');
     
        $name_markaz=ArrayHelper::map(TblPhone::find()->all(),'id','name_markaz');
        
        if ($model->load(Yii::$app->request->post())) {

            $modelupload ->imageFile = UploadedFile::getInstance( $modelupload , 'imageFile');
            $modelupload ->imageFile2 = UploadedFile::getInstance( $modelupload , 'imageFile2');


            if($modelupload->imageFile !=null && $modelupload->imageFile2) {

                if ($modelupload->validate()) {

                    $modelupload->imageFile->saveAs(Yii::getAlias('@upload') . '/profil/ax_perseneli/' . $model->codemeli.'.' . $modelupload->imageFile->extension);
                    $modelupload->imageFile2->saveAs(Yii::getAlias('@upload') . '/profil/ax_kartmeli/' . $modelupload->imageFile2->baseName . '.' . $modelupload->imageFile2->extension);



                    $model->ax_persenli = $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension;
                    $model->ax_kartmeli = $modelupload->imageFile2->baseName . '.' . $modelupload->imageFile2->extension;

                   

                   

                } 

            }

            if (isset($_POST['city3'])){
                if($_POST['city3']!=null){
                    
                    $model->shahr=$_POST['city3'];



                    $model->tarikhsabt_karmand = date('Y/m/d');
                    $date=new jdf();
                    $model->tarikhsabt_karmand2=$date->date('Y/m/d');


                }

            }

            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user))
                return $this->redirect(['profile/index']);

            }


              
        }

        $roles= ['admin'=>'مدیر', 'user'=> 'کارمند', 'rigistering'=>'مسئول ثبت نام'];
        return $this->render('signup', [
            'model' => $model,
            'roles' => $roles,
            'reng'=>$reng,
            'name_markaz'=> $name_markaz,
            'ostan' => $ostan,
            'modelupload'=>$modelupload,
          

        ]);
    }



 






    public function actionInit()
    {


        $auth = Yii::$app->authManager;


        $admin = $auth->createRole('admin');

        $auth->add($admin);

        $user = $auth->createRole('user');

        $auth->add($user);

        $rigistering = $auth->createRole('rigistering');

        $auth->add($rigistering);
   }


    public function actionCity()
    {
        $name = $_GET['name'];
        $id = Province::findOne(['name' => $name]);
        $query = City::find()->where(['province_id' => $id->id])->all();
        $f = '';
        if ($query != null) {
            $f .= '<div class="form-group  required">';
            $f .= '<label class="control-label" >شهر</label>';
            $f .= '<select id="signupform-city" class="form-control" name="city3" aria-required="true">';
            foreach ($query as $q) {
                $f .= '<option value="'.$q->name.'">' . $q->name . '</option>';

            }

            $f .= '</select><div class="help-block"></div> </div>';
        } else {
            $f .= '<div class="form-group  required">';
            $f .= '<label class="control-label" >شهر</label>';
            $f .= '<select id="signupform-city" class="form-control" name="city3" aria-required="true">';
            $f .= ' <option value="0">انتخاب کنید</option>';
            $f .= '</select><div class="help-block"></div> </div>';
        }
        return $f;
    }








}
