<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use backend\models\City;
use backend\models\Province;
use backend\models\TblPhone;
use backend\models\TblRange;
use backend\models\TblSemat;
use backend\models\Upload;
use common\components\jdf;
use common\models\User;
use Yii;
use backend\models\Profile;
use backend\models\ProfileSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
                'rules' => [

                    [
                        'actions' => ['index','view','city','update','delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelupload = new Upload();

        $modeluser = User::find()->where(['id' => $model->id_user])->one();

        if ($modeluser != null) {



        $roles = ['admin' => 'مدیر', 'user' => 'کارمند', 'rigistering' => 'مسئول ثبت نام'];
        $item = AuthAssignment::find()->where(['user_id' => $modeluser->id])->one();
        $r = $item->item_name;

        $id_ostan = Province::find()->where(['name' => $model->ostan])->one();

        $city = City::find()->where(['province_id' => $id_ostan->id])->all();
        $ostan = ArrayHelper::map(Province::find()->all(), 'name', 'name');
        $reng = ArrayHelper::map(TblRange::find()->all(), 'id', 'name');

        $name_markaz = ArrayHelper::map(TblPhone::find()->all(), 'id', 'name_markaz');


        $username = $modeluser->username;
        $pass = '';
        $email = $modeluser->email;


        if ($model->load(Yii::$app->request->post())) {


            $model->timeWork = $model->saatkari_az . " " . $model->saatkari_ta;
//            $timeWork= $model->timeWork;
//            if($timeWork !=null){
//                $timeWork =explode(" ",$timeWork) ;
//
//
//                $tF=explode(":",$timeWork[0] );
//                $tT=explode(":",$timeWork[1] );
//
//                    $model->hurFrom=$tF[0];
//                    $model->minFrom = $tF[1];
//                    $model->hurTo=$tT[0];
//                    $model->minTo=$tT[1];
//
//            }else{
//                $model->hurFrom=00;
//                $model->minFrom = 00;
//                $model->hurTo=00;
//                $model->minTo=00;
//            }

            $modelupload->imageFile = UploadedFile::getInstance($modelupload, 'imageFile');
            $modelupload->imageFile2 = UploadedFile::getInstance($modelupload, 'imageFile2');


            if ($modelupload->validate()) {


//             var_dump( $modelupload->imageFile);exit;

                $modelupload->imageFile->saveAs(Yii::getAlias('@upload') . '/profil/ax_perseneli/' . $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension);
                $modelupload->imageFile2->saveAs(Yii::getAlias('@upload') . '/profil/ax_kartmeli/' . $modelupload->imageFile2->baseName . '.' . $modelupload->imageFile2->extension);


                $model->ax_perseneli = $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension;
                $model->ax_kartmeli = $modelupload->imageFile2->baseName . '.' . $modelupload->imageFile2->extension;


            } else {


                return $this->render('update', [
                    'model' => $model,
                    'roles' => $roles,
                    'modelupload' => $modelupload,
                    'r' => $r,
                    'reng' => $reng,
                    'ostan' => $ostan,
                    'name_markaz' => $name_markaz,
                    'city' => $city,
                    'username' => $username,
                    'pass' => $pass,
                    'email' => $email,

                ]);

            }

            if (isset($_POST['city3'])) {
                if ($_POST['city3'] != null) {

                    $model->shahr = $_POST['city3'];


                    $model->tarikhsabt_karmand = date('Y/m/d');
                    $date = new jdf();
                    $model->tarikhsabt_karmand2 = $date->date('Y/m/d');


                }

            }

            $x = User::find()->all();
            foreach ($x as $x2) {

                if ($model->username == $username) {

                    $modeluser->username = $model->username;
                } else {
                    if ($x2->username == $model->username) {

                        $_SESSION['error'] = 'نام کاربری که جهت ویرایش وارد کرده اید قبلا استفاده شده است.';
                        return $this->render('update', [
                            'model' => $model,
                            'roles' => $roles,
                            'modelupload' => $modelupload,
                            'username' => $username,
                            'pass' => $pass,
                            'email' => $email,
                            'r' => $r,
                            'reng' => $reng,
                            'ostan' => $ostan,
                            'name_markaz' => $name_markaz,
                            'city' => $city,
                        ]);

                    } else {

                        $modeluser->username = $model->username;
                    }
                }

                if ($model->email == $email) {

                    $modeluser->email = $model->email;
                } else {

                    if ($x2->email == $model->email) {
                        $_SESSION['error'] = 'ایمیلی که جهت ویرایش وارد کرده اید قبلا استفاده شده است.';
                        return $this->render('update', [
                            'model' => $model,
                            'roles' => $roles,
                            'modelupload' => $modelupload,
                            'username' => $username,
                            'pass' => $pass,
                            'email' => $email,
                            'r' => $r,
                            'reng' => $reng,
                            'ostan' => $ostan,
                            'name_markaz' => $name_markaz,
                            'city' => $city,
                        ]);
                    } else {
                        $modeluser->email = $model->email;
                    }

                }


            }


//
//            if($model->password != null) {
//
//                $modeluser->setPassword($model->password) ;
//
//            }


            if ($modeluser->save()) {

                $item->item_name = $model->roles;

                $item->save();

                $profile1 = Profile::find()->all();

                foreach ($profile1 as $p) {

                    if ($p->id_user == $model->id_user) {

                    } else {
                        if ($p->shomarepersenel == $model->shomarepersenel) {

                            $_SESSION['error'] = 'شماره پرسنلی تکراری می باشد.';
                            return $this->render('update', [
                                'model' => $model,
                                'roles' => $roles,
                                'modelupload' => $modelupload,
                                'username' => $username,
                                'pass' => $pass,
                                'email' => $email,
                                'r' => $r,
                                'reng' => $reng,
                                'ostan' => $ostan,
                                'name_markaz' => $name_markaz,
                                'city' => $city,
                            ]);
                        }

                    }
                }
//
                $codemeli = $model->codemeli;
                $conut = strlen($codemeli);
                if ($conut == 10) {
                    $number = 0;
                    $x = 10;
                    for ($i = 0; $i <= 8; $i++) {


                        $number = ($codemeli[$i] * $x) + $number;
                        $x = $x - 1;


                    }
                    $number1 = $number % 11;
                    if ($number1 >= 2) {
                        $number_controller = 11 - $number1;

                        if ($number_controller == $codemeli[9]) {


                        } else {

                            $_SESSION['error'] = 'کد ملی وارد شده معتبر نمی باشد.';
                            return $this->render('update', [
                                'model' => $model,
                                'roles' => $roles,
                                'modelupload' => $modelupload,
                                'username' => $username,
                                'pass' => $pass,
                                'email' => $email,
                                'r' => $r,
                                'reng' => $reng,
                                'ostan' => $ostan,
                                'name_markaz' => $name_markaz,
                                'city' => $city,
                            ]);
                        }

                    } else {

                        if ($number1 == $codemeli[9]) {


                        } else {

                            $_SESSION['error'] = 'کد ملی وارد شده معتبر نمی باشد.';
                            return $this->render('update', [
                                'model' => $model,
                                'roles' => $roles,
                                'modelupload' => $modelupload,
                                'username' => $username,
                                'pass' => $pass,
                                'email' => $email,
                                'r' => $r,
                                'reng' => $reng,
                                'ostan' => $ostan,
                                'name_markaz' => $name_markaz,
                                'city' => $city,
                            ]);
                        }
                    }


                } else {

                    $_SESSION['error'] = 'کد ملی وارد شده باید 10 رقم باشد.';
                    return $this->render('update', [
                        'model' => $model,
                        'roles' => $roles,
                        'modelupload' => $modelupload,
                        'username' => $username,
                        'pass' => $pass,
                        'email' => $email,
                        'r' => $r,
                        'reng' => $reng,
                        'ostan' => $ostan,
                        'name_markaz' => $name_markaz,
                        'city' => $city,
                    ]);
                }


                if ($model->save()) {

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {

                    $_SESSION['error'] = 'مشخصات ذخیره نشد ، لطفا مجددا امتحان کنید.';
                    return $this->render('update', [
                        'model' => $model,
                        'roles' => $roles,
                        'modelupload' => $modelupload,
                        'username' => $username,
                        'pass' => $pass,
                        'email' => $email,
                        'r' => $r,
                        'reng' => $reng,
                        'ostan' => $ostan,
                        'name_markaz' => $name_markaz,
                        'city' => $city,
                    ]);

                }


            } else {

                $_SESSION['error'] = 'نام کاربری یا رمز عبور یا ایمیل ذخیره نشد ، لطفا مجددا امتحان کنید.';
                return $this->render('update', [
                    'model' => $model,
                    'roles' => $roles,
                    'modelupload' => $modelupload,
                    'username' => $username,
                    'pass' => $pass,
                    'email' => $email,
                    'r' => $r,
                    'reng' => $reng,
                    'ostan' => $ostan,
                    'name_markaz' => $name_markaz,
                    'city' => $city,
                ]);

            }


        }
    }
        else{

            $_SESSION['error']='متاسفانه اطلاعات کاربر یافت نشد مجددا کاربر را ثبت کنید';
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'roles'=>$roles,
            'modelupload' => $modelupload,
            'username'=>$username,
            'pass'=>$pass,
            'email'=>$email,
            'r'=>$r,
            'reng'=>  $reng,
            'ostan'=>$ostan,
            'name_markaz'=> $name_markaz,
            'city'=>$city,
        ]);
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model=$this->findModel($id);

$model->username='ddddddd';
$model->password='123456';
$model->email='d@ggh.hjh';
        $model->enableview=0;
       if($model->save()) {
           //        var_dump($model->ax_perseneli);exit;
           unlink(Yii::getAlias('@upload') . '/upload/profil/ax_perseneli/'. $model->ax_perseneli);
           unlink(Yii::getAlias('@upload') . '/upload/profil/ax_kartmeli/'. $model->ax_kartmeli);

           return $this->redirect(['index']);
       }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
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
