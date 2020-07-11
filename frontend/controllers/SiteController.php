<?php
namespace frontend\controllers;

use backend\models\City;
use common\components\General;
use common\components\jdf;
use frontend\models\Adsl;
use frontend\models\Ameliyateforosh;
use frontend\models\FactorNgn;
use frontend\models\Foroshtejary;
use frontend\models\Idc;
use frontend\models\Morakhasi;
use frontend\models\Password;
use frontend\models\Pishnehadenteqad;
use frontend\models\Profile;
use frontend\models\Province;
use frontend\models\TblAddedInformation;
use frontend\models\TblPhone;
use frontend\models\TblServices1;
use frontend\models\User;
use frontend\modules\changepass\models\PasswordForm;
use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;


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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['signup','index','login','logout','contact','about','requestpasswordreset','resetpassword','phone2'
                            ,'password','city','markaz','phone','infosearch','searchshomare'
                        ],
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
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup','index','login','logout','contact','about','requestpasswordreset','resetpassword','phone2'
//                        ,'password','city','markaz','phone','infosearch','searchshomare'
//                        ],
//                        'allow' => true,
//                        'roles' => ['admin'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
////                    'logout' => ['post'],
//                ],
//            ],
//        ];
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
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'login.php';
        if (!Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new LoginForm();



        if ($model->load(Yii::$app->request->post())) {


           if( isset($_POST['chk']) && $_POST['chk']!=null
            && isset($_POST['rand']) && $_POST['rand']!=null){

                if($_POST['chk'] == $_POST['rand']){
                   if($model->login()){

                       $general= new General();
                       $role=$general->role_user();
                       if($role == 'admin'){
                           return $this->goBack();

                       }
                       else{
                           $_SESSION['error']='شما اجازه ورود ندارید.';
                           return $this->render('login', [
                               'model' => $model,
                           ]);
                       }





                   }  else{
                       $_SESSION['error']='کلمه عبور یا نام کاربری اشنباه است.';
                       return $this->render('login', [
                           'model' => $model,
                       ]);
                   }
                }
               else{
                   $_SESSION['error']='کد را درست وارد کنید.';
                   return $this->render('login', [
                       'model' => $model,
                   ]);
               }

            }





        }
        else {
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
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
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
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionPhone()
    {

        $search = '0';
        $pishshomare = TblPhone::find()->all();

        $ostan = Province::find()->all();

        $tblphone = '';


        if (Yii::$app->request->post()) {


            if (isset($_POST['btn']) && $_POST['btn'] != null) {
                if ($_POST['btn'] == 'phon') {

               

                    if (isset($_POST['one_1']) && $_POST['one_1'] != null
                        && isset($_POST['two_2']) && $_POST['two_2'] != null
                    ) {

                  $pish=$_POST['one_1'];
                  $sh=$_POST['two_2'];
                        $searchshomare1 = TblPhone::find()->where(['pishshomare'=>$_POST['one_1']])
                        ->andWhere(['enable'=>'1'])->andWhere(['enableview'=>'1'])->all();


                        if ($searchshomare1 != null) {


                            foreach ($searchshomare1 as $search) {
//                                var_dump($search->sabtenam);exit;

                                if ($search->sabtenam == 'ADSL' || $search->sabtenam == 'VDSL') {

                             
                            
                                if ($_POST['two_2'] >= $search->reng_az && $_POST['two_2'] <= $search->reng_ta) {


                                    return $this->render('phone', [

                                     
                                        'pish' => $pish,
                                        'sh' => $sh,
                                        'tblphone' => $tblphone,
                                        'ostan' => $ostan,
                                        'pishshomare' => $pishshomare,
                                        'search' => $search,
                                    ]);
                                } else {

                                    $_SESSION['error'] = '4خطا:هیچ مرکزی موجود نیست';
                                    return $this->render('phone', [

                                        'tblphone' => $tblphone,
                                        'ostan' => $ostan,
                                        'pishshomare' => $pishshomare,
                                        'search' => $search,
                                    ]);

                                }
                            }
                                elseif($search->sabtenam != 'ADSL' || $search->sabtenam != 'VDSL'){
                                    $search='0';

                                    $_SESSION['error']='خطا :هیچ مرکزی موجود نیست.';
                                    return $this->render('phone', [

                                        'tblphone' => $tblphone,
                                        'ostan' => $ostan,
                                        'pishshomare' => $pishshomare,
                                        'search' => $search,
                                    ]);
                                }

                            }
                        }
                    }
                    else{
                        $_SESSION['error']='خطا:شماره یا پیش شماره را وارد نکرده اید.';
                        return $this->render('phone', [

                            'tblphone' => $tblphone,
                            'ostan' => $ostan,
                            'pishshomare' => $pishshomare,
                            'search' => $search,
                        ]);

                    }




                    }
                elseif($_POST['btn'] == 'search11') {

                    if ($_POST['ostan'] != null && isset($_POST['ostan'])
                        && $_POST['shahr'] != null && isset($_POST['shahr']) &&
                        $_POST['name_markaz'] != null && isset($_POST['name_markaz'])
                    ) {


                        $os = $_POST['ostan'];
                        $shahr = $_POST['shahr'];
                        $markaz = $_POST['name_markaz'];


                        if ($os == 1) {

                            $tblphone = TblPhone::find()->all();

                            return $this->render('phone', [

                                'tblphone' => $tblphone,
                                'ostan' => $ostan,
                                'pishshomare' => $pishshomare,
                                'search' => $search,
                            ]);

                        } elseif($os != 1) {
                            if ($shahr == 1 || $shahr == 0) {
                                $tblphone = TblPhone::find()->where(['ostan' => $os])->all();
                                return $this->render('phone', [

                                    'tblphone' => $tblphone,
                                    'ostan' => $ostan,
                                    'pishshomare' => $pishshomare,
                                    'search' => $search,
                                ]);

                            } else {
                                if ($markaz == 1) {

                                    $tblphone = TblPhone::find()->where(['ostan' => $os])->andWhere(['shahr' => $shahr])->all();

                                    return $this->render('phone', [

                                        'tblphone' => $tblphone,
                                        'ostan' => $ostan,
                                        'pishshomare' => $pishshomare,
                                        'search' => $search,
                                    ]);

                                } else {
                                    $tblphone = TblPhone::find()->where(['ostan' => $os])->andWhere(['shahr' => $shahr])->andWhere(['name_markaz' => $markaz])->all();
                                    return $this->render('phone', [

                                        'tblphone' => $tblphone,
                                        'ostan' => $ostan,
                                        'pishshomare' => $pishshomare,
                                        'search' => $search,
                                    ]);
                                }

                            }
                        }

                    } else {
                        $_SESSION['error'] = 'برای جستجو حداقل فیلد استان را وارد کنید.';
                        return $this->render('phone', [

                            'ostan' => $ostan,
                            'tblphone' => $tblphone,
                            'pishshomare' => $pishshomare,
                            'search' => $search,
                        ]);
                    }


                }
                elseif ($_POST['btn']=='b1'){



                    if(isset($_POST['avdsl']) && $_POST['avdsl']!=null
                        && isset($_POST['pishshomare']) && $_POST['pishshomare']!=null
                        && isset($_POST['shomare']) && $_POST['shomare']!=null
                        && isset($_POST['tarikh_tavalod']) && $_POST['tarikh_tavalod']!=null
                        && isset($_POST['name']) && $_POST['name']!=null
                        && isset($_POST['mahale_sodur']) && $_POST['mahale_sodur']!=null
                        && isset($_POST['lastname']) && $_POST['lastname']!=null
                        && isset($_POST['shenasname']) && $_POST['shenasname']!=null
                        && isset($_POST['mahale_sodur']) && $_POST['mahale_sodur']!=null
                        && isset($_POST['namepedar']) && $_POST['namepedar']!=null
                        && isset($_POST['name_malek']) && $_POST['name_malek']!=null
                        && isset($_POST['lastname_malek']) && $_POST['lastname_malek']!=null
                        && isset($_POST['codemeli_malek']) && $_POST['codemeli_malek']!=null
                        && isset($_POST['email']) && $_POST['email']!=null
                        && isset($_POST['codeposti']) && $_POST['codeposti']!=null
                        && isset($_POST['cellphone']) && $_POST['cellphone']!=null
                        && isset($_POST['adress']) && $_POST['adress']!=null
                        && isset($_POST['id_service']) && $_POST['id_service']!=null

                    ){

                        if(isset($_POST['added_name']) && $_POST['added_name']!=null){

                        }
                       $model=new Adsl();

                        


                       


                    }

                }

                }




        }
            return $this->render('phone', [

                'ostan' => $ostan,
                'tblphone' => $tblphone,
                'pishshomare' => $pishshomare,
                'search' => $search,
            ]);


    }

    public function actionPassword(){

        $model = new \frontend\models\PasswordForm();




            if($model->load(Yii::$app->request->post()))
            {
                $modeluser = \common\models\User::find()->where(['username'=>$model->username])->one();

        if($modeluser!=null){
                if($model->validate())
                {

                    try
                    {
                        $modeluser->password_hash = Yii::$app->security->generatePasswordHash($_POST['PasswordForm']['newpass']);
                        if($modeluser->save())
                        {
                            Yii::$app->getSession()->setFlash(
                                'success','Password changed'
                            );
                            return $this->redirect(['index']);
                        }
                        else
                        {
                            Yii::$app->getSession()->setFlash(
                                'error','Password not changed'
                            );
                            return $this->redirect(['index']);
                        }
                    }
                    catch(Exception $e)
                    {
                        Yii::$app->getSession()->setFlash(
                            'error',"{$e->getMessage()}"
                        );
                        return $this->render('changepasword',[
                            'model'=>$model
                        ]);
                    }
                }
                else
                {
                    return $this->render('changepasword',[
                        'model'=>$model
                    ]);
                }



                        }

        else
        {
            return $this->render('changepasword',[
                'model'=>$model
            ]);
        }

            }
            else
            {
                return $this->render('changepasword',[
                    'model'=>$model
                ]);
            }


    }

    public function actionCity()
    {

        $name = $_GET['name'];
        $id=Province::findOne(['name'=>$name]);
        if ($name == '1') {
            $f = '';
            $city = City::find()->all();

            $f .= '<select  style="width: 150px;margin-top: 10px;color:black" name="shahr" onchange="getFunction2(this.value,'.$id->id.')">';
            $f .= ' <option value="0">انتخاب کنید</option>';
            $f .= ' <option value="1">همه</option>';
            foreach ($city as $c) {
                $f .= '<option value="' . $c->name . '">' . $c->name . '</option>';
            }
            $f .= ' </select>';
            return $f;
        }


    else{

        $id = Province::findOne(['name' => $name]);
        $city = City::find()->where(['province_id' => $id->id])->all();
        $f = '';
        if ($city != null) {
            $f .= '<select  style="width: 150px;margin-top: 10px;color:black" name="shahr" onchange="getFunction2(this.value,'.$id->id.')">';
            $f .= ' <option value="0">انتخاب کنید</option>';
            $f .= ' <option value="1">همه</option>';
            foreach ($city as $c) {
                $f .= '<option value="' . $c->name . '">' . $c->name . '</option>';
            }
            $f .= ' </select>';
        } else {

            $f .= '<select  style="width: 150px;margin-top: 10px;color:black" name="shahr" onchange="getFunction2(this.value,'.$id->id.')">';
            $f .= ' <option value="0">انتخاب کنید</option>';
            $f .= ' <option value="1">همه</option>';
            $f .= '</select>';
        }
        return $f;
    }
    }

    public function actionMarkaz()
    {

        $name = $_GET['name'];
         $id = $_GET['ostan'];
        $ostan=Province::findOne($id);

//        if($name == 0){
//            $f = '';
//            $f .= '<select  style=" width: 100%;margin-top: 10px" name="name_markaz">';
//            $f .= ' <option value="1">همه</option>';
//            $f .= ' </select>';
//            return $f;
//        }

        if ($name =='1') {
            
            $f = '';
            $markaz = TblPhone::find()->where(['ostan'=>$ostan])->all();

            $f .= '<select  style=" width: 150px;margin-top: 10px;color:black" name="name_markaz">';
            $f .= ' <option value="1">همه</option>';
            foreach ($markaz as $m) {
                $f .= '<option value="' . $m->name_markaz . '">' . $m->name_markaz . '</option>';
            }
            $f .= ' </select>';
            return $f;
        }


        else{

           

            $city = TblPhone::find()->where(['shahr' => $_GET['name']])->all();
            $f = '';
            if ($city != null) {
                
                $f .= '<select  style="width: 150px;margin-top: 10px;color:black" name="name_markaz" >';
                $f .= ' <option value="1">همه</option>';
                foreach ($city as $c) {
                    $f .= '<option value="' . $c->name_markaz . '">' . $c->name_markaz . '</option>';
                }
                $f .= ' </select>';
            } else {

                $f .= '<select  style=" width: 150px;margin-top: 10px;color:black" name="name_markaz">';
                $f .= ' <option value="1">همه</option>';
                $f .= '</select>';
            }
            return $f;
        }
    }


    public  function actionInfosearch(){
        return $this->render('infoSearch');
    }

    public  function actionModiriyat(){


        if(isset($_POST['btn']) && $_POST['btn']!=null){
        
            $x=explode(',',$_POST['btn']);
            if($x[0] == 'adsl' || $x[0]== 'vdsl' || $x[0]== 'owa' || $x[0]== 'iptv' || $x[0]== 'td-lte')
            {
                $factors=Adsl::find()->where(['type'=>$x[0]])->andWhere(['eshterak'=>$x[1]])->one();
                if($factors!=null){
                    
                    return $this->render('allfactors',[
                        
                        'factors'=>$factors,
                    ]);
                }
                
                
            }
            
            elseif($x[0] == 'ngn' || $x[0]== 'mvno' || $x[0]== 'cdn' || $x[0]== 'vas' )
            {
                $factors=FactorNgn::find()->where(['type'=>$x[0]])->andWhere(['eshterak'=>$x[1]])->one();
                if($factors!=null){

                    return $this->render('allfactors',[

                        'factors'=>$factors,
                    ]);
                }


            }

            elseif($x[0] == 'idc' || $x[0]== 'vpn' || $x[0]== 'x' || $x[0]== 'domain'  || $x[0]== 'host' )
            {
                $factors=Idc::find()->where(['type'=>$x[0]])->andWhere(['eshterak'=>$x[1]])->one();
                if($factors!=null){

                    return $this->render('allfactors',[

                        'factors'=>$factors,
                    ]);
                }


            }

            elseif($x[0] == 'y'  )
            {
                $factors=Foroshtejary::find()->where(['type'=>$x[0]])->andWhere(['eshterak'=>$x[1]])->one();
                if($factors!=null){

                    return $this->render('allfactors',[

                        'factors'=>$factors,
                    ]);
                }


            }

            elseif($x[0] == 'g' || $x[0]== 'z'  )
            {
                $factors=Ameliyateforosh::find()->where(['type'=>$x[0]])->andWhere(['eshterak'=>$x[1]])->one();
                if($factors!=null){

                    return $this->render('allfactors',[

                        'factors'=>$factors,
                    ]);
                }


            }
            
        }

        return $this->render('modiriyat');
    }

    public  function actionModiriyat2(){

        if(isset($_GET['type']) && $_GET['type']!=null){

       $f='';
       $i=1;
            if($_GET['type'] == 'adsl' || $_GET['type'] == 'vdsl'
                || $_GET['type'] == 'owa' || $_GET['type']== 'td-lte'
                ||  $_GET['type'] == 'iptv'){
                


                $search=Adsl::find()->where(['type'=>$_GET['type']])->all();
                
                if($search!=null){

                    $f .='<table class="table table-hover">';
                    $f .='         <thead style="background:#30487b;color: white;border: 2px solid rgba(0,0,0,.5);font-weight: bold;font-size: 16px">';
                    $f .=' <tr >';
                    $f .=' <td style="padding: 10px!important;width: 3%">#</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">اشتراک</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">نام فروشنده</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">سمت</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">استان</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">شهر</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">تاریخ درخواست</td>';
                    $f .=' <td style="padding: 10px!important;width: 7%"">انتخاب</td>';
                    $f .=' </tr> </thead> <tbody id="myTable">';

                    foreach ($search as $item){
                       $id_user= $item->id_user;
                        $find=Profile::find()->where(['id_user'=>$id_user])->one();
                        if($find!=null){





                            if($i%2 == 0){
                                $f .='<tr style="background-color: ghostwhite">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                                 <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }
                            else{

                                $f .='<tr style="background-color: white">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                                    <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';


                            }
                            
                            $i++;



                        }
                        
                    }

                }
                $f .=' </tbody> </table>';
                return $f;

           
                
            }
            elseif($_GET['type'] == 'ngn' || $_GET['type']== 'mvno'
                || $_GET['type'] == 'cdn' || $_GET['type']== 'vas'){

                $search=FactorNgn::find()->where(['type'=>$_GET['type']])->all();
                if($search!=null){

                    $f .='<table class="table table-hover">';
                    $f .='         <thead style="background:#30487b;color: white;border: 2px solid rgba(0,0,0,.5);font-weight: bold;font-size: 16px">';
                    $f .=' <tr >';
                    $f .=' <td style="padding: 10px!important;width: 3%">#</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">اشتراک</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">نام فروشنده</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">سمت</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">استان</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">شهر</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">تاریخ درخواست</td>';
                    $f .=' <td style="padding: 10px!important;width: 7%"">انتخاب</td>';
                    $f .=' </tr> </thead> <tbody id="myTable">';

                    foreach ($search as $item){
                        $id_user= $item->id_user;
                        $find=Profile::find()->where(['id_user'=>$id_user])->one();
                        if($find!=null){





                            if($i%2 == 0){
                                $f .='<tr style="background-color: ghostwhite">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                          <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }
                            else{

                                $f .='<tr style="background-color: white">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                                     <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }

                            $i++;



                        }

                    }

                }
                $f .=' </tbody> </table>';
                return $f;



            }

            elseif($_GET['type'] == 'idc' || $_GET['type']== 'vpn'
                || $_GET['type'] == 'host' || $_GET['type']== 'domain'
                || $_GET['type']== 'x'
            ){

                $search=Idc::find()->where(['type'=>$_GET['type']])->all();
                if($search!=null){

                    $f .='<table class="table table-hover">';
                    $f .='         <thead style="background:#30487b;color: white;border: 2px solid rgba(0,0,0,.5);font-weight: bold;font-size: 16px">';
                    $f .=' <tr >';
                    $f .=' <td style="padding: 10px!important;width: 3%">#</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">اشتراک</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">نام فروشنده</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">سمت</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">استان</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">شهر</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">تاریخ درخواست</td>';
                    $f .=' <td style="padding: 10px!important;width: 7%"">انتخاب</td>';
                    $f .=' </tr> </thead> <tbody id="myTable">';

                    foreach ($search as $item){
                        $id_user= $item->id_user;
                        $find=Profile::find()->where(['id_user'=>$id_user])->one();
                        if($find!=null){





                            if($i%2 == 0){
                                $f .='<tr style="background-color: ghostwhite">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                               <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }
                            else{

                                $f .='<tr style="background-color: white">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                                <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }

                            $i++;



                        }

                    }

                }
                $f .=' </tbody> </table>';
                return $f;



            }
            elseif($_GET['type'] == 'y'){

                $search=Foroshtejary::find()->where(['type'=>$_GET['type']])->all();
                if($search!=null){

                    $f .='<table class="table table-hover">';
                    $f .='         <thead style="background:#30487b;color: white;border: 2px solid rgba(0,0,0,.5);font-weight: bold;font-size: 16px">';
                    $f .=' <tr >';
                    $f .=' <td style="padding: 10px!important;width: 3%">#</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">اشتراک</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">نام فروشنده</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">سمت</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">استان</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">شهر</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">تاریخ درخواست</td>';
                    $f .=' <td style="padding: 10px!important;width: 7%"">انتخاب</td>';
                    $f .=' </tr> </thead> <tbody id="myTable">';

                    foreach ($search as $item){
                        $id_user= $item->id_user;
                        $find=Profile::find()->where(['id_user'=>$id_user])->one();
                        if($find!=null){





                            if($i%2 == 0){
                                $f .='<tr style="background-color: ghostwhite">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->datefa.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                    <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }
                            else{

                                $f .='<tr style="background-color: white">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->datefa.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                                 <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }

                            $i++;



                        }

                    }

                }
                $f .=' </tbody> </table>';
                return $f;



            }
            elseif($_GET['type'] == 'z' || $_GET['type']== 'g'){

                $search=Ameliyateforosh::find()->where(['type'=>$_GET['type']])->all();
                if($search!=null){

                    $f .='<table class="table table-hover">';
                    $f .='         <thead style="background:#30487b;color: white;border: 2px solid rgba(0,0,0,.5);font-weight: bold;font-size: 16px">';
                    $f .=' <tr >';
                    $f .=' <td style="padding: 10px!important;width: 3%">#</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">اشتراک</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">نام فروشنده</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">سمت</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">استان</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">شهر</td>';
                    $f .=' <td style="padding: 10px!important;width: 15%"">تاریخ درخواست</td>';
                    $f .=' <td style="padding: 10px!important;width: 7%"">انتخاب</td>';
                    $f .=' </tr> </thead> <tbody id="myTable">';

                    foreach ($search as $item){
                        $id_user= $item->id_user;
                        $find=Profile::find()->where(['id_user'=>$id_user])->one();
                        if($find!=null){





                            if($i%2 == 0){
                                $f .='<tr style="background-color: ghostwhite">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                                <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';


                            }
                            else{

                                $f .='<tr style="background-color: white">';
                                $f .='<td style="padding-top: 10px!important;">'.$i.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->eshterak.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->name.$find->lastname.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->semat.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->ostan.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$find->shahr.'</td>';
                                $f .='<td style="padding-top: 10px!important;">'.$item->date_farsi.'</td>';
                                $f .='<td class="namayesh" style="padding-top: 10px!important;">
                                  <button  type="submit" class="btn btn-success"  value="'.$item->type.','.$item->eshterak.'"  name="btn"> ';
                                $f .='نمایش جزییات</button>';
                                $f .='</tr>';

                            }

                            $i++;



                        }

                    }

                }
                $f .=' </tbody> </table>';
                return $f;



            }


        }


        
}


    
    public  function actionGozareshat(){
    return $this->render('gozareshat');
}

    public  function actionSabtmorakhasi(){



         if(Yii::$app->request->post()){
             $model=Morakhasi::find()->where(['id'=>$_POST['j']])->one();
//var_dump($_POST);exit;
             $id=$_POST['j'];
             if($_POST['taeed_'.$id]!=null && isset($_POST['taeed_'.$id])){

                 $model->taeed=$_POST['taeed_'.$id];
                 if($_POST['vaziyat_'.$id]!=null && isset($_POST['vaziyat_'.$id])){
                     $model->vaziyat=$_POST['vaziyat_'.$id];
                 }
                 if($model->save()){
                     $_SESSION['error']='اطلاعات ثبت شد';
                     return $this->render('sabtmorakhasi');
                 }else
                 {
                     $_SESSION['error']='اطلاعات ثبت نشد';
                     return $this->render('sabtmorakhasi');
                 }
                 
             }else{
                 $_SESSION['error']='لطفا تیک تایید یا عدم تایید را بزنید';
                 return $this->render('sabtmorakhasi');
             }
      

}else{
             return $this->render('sabtmorakhasi');

         }




    }

    public  function  actionPishnehad_enteqad(){

        $model=new Pishnehadenteqad();
        if(Yii::$app->request->post()){
            $model1=Pishnehadenteqad::find()->where(['id'=>$_POST['j']])->one();
            $model->type_darkhast=$model1->type_darkhast;
            $model->vahede_marbute=$model1->vahede_marbute;
            $model->title=$model1->title;
            $model->date_farsi=$model1->date_farsi;
            $model->date=$model1->date;
            $model->text=$model1->text;
            $model->result=$_POST['result_'.$_POST['j']];
            $model->time_result=date('Y/m/d');
            $model->id_parent=$_POST['j'];
            $date1=new jdf();
            $model->time_result_farsi=$date1->date('Y/m/d');
            $model->id_user=$model1->id_user;

            if($model->save()){
                $_SESSION['error']='عملیات با موفقیت ذخیره شد';
                return $this->render('pishnehad_enteqad');
            }else{
//                var_dump($model->getErrors());exit;
                $_SESSION['error']='عملیات با موفقیت ذخیره نشد';
                return $this->render('pishnehad_enteqad');
            }
        }
        return $this->render('pishnehad_enteqad');
    }

    public function actionServices()
    {

        $f='';
        if(isset($_GET['name'])&& isset($_GET['type']) ){
            if($_GET['name']!=null && $_GET['type']!=null ){
                $name=$_GET['name'];
                $type=$_GET['type'];

                $id_services=TblServices1::find()->where(['sabtnam'=>$type])->andWhere(['name'=>$name])
                    ->andWhere(['enable'=>1])->andWhere(['enableview'=>1])->all();
                if($id_services!=null){


                    $f.='<select style="width: 300px" name="id_service">';

                    foreach ($id_services as $is){
                        $f.='<option value="'.$is->id.'">'.'سرعت:'.$is->speed.'حجم:'.$is->hajm.'مدت:'.$is->time.' قیمت:'.$is->price.'</option>';

                    }

                    $f.='</select> ';

                }


            }
        }

        return $f;

    }

    public function actionAdded()
    {

        $f='';
        if(isset($_GET['name'])&& isset($_GET['type']) ){
            if($_GET['name']!=null && $_GET['type']!=null ){
                $name=$_GET['name'];
                $type=$_GET['type'];

                $id_added=TblAddedInformation::find()->where(['sabtnam'=>$type])->andWhere(['name'=>$name])
                    ->andWhere(['enable'=>1])->andWhere(['enableview'=>1])->all();
                if($id_added!=null){


                    $f.='<select  style="width: 400px" name="id_added">';

                    foreach ($id_added as $ia){
                        $f.='<option value="'.$ia->id.'">'.' نوع '. $ia->name .':'.$ia->service.' سرعت:'.$ia->speed.'حجم: '.$ia->hajm.' مدت: '.$ia->time.' قیمت:'.$ia->price.'</option>';

                    }

                    $f.='</select> ';

                }


            }
        }

        return $f;

    }

}
