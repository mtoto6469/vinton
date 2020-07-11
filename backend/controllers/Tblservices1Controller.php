<?php

namespace backend\controllers;

use backend\models\Sabtnam;
use Yii;
use backend\models\TblServices1;
use backend\models\TblServices1Search;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Tblservices1Controller implements the CRUD actions for TblServices1 model.
 */
class Tblservices1Controller extends Controller
{
    public $enableCsrfValidation = false;
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
                        'actions' => ['view', 'index','create','update','delete'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['view', 'index','create','update','delete'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        $searchModel = new TblServices1Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new TblServices1();

        if ($model->load(Yii::$app->request->post())) {

//            var_dump($_POST->type);exit;
            if(isset($_POST['ts']) && $_POST['ts']!=null){
                $model->sabtnam=$_POST['ts'];
             if($_POST['ts']=='NGN'){
               $model->name='آی پی آسیا تک را روی کدام سیستم دارید.';
                 $model->type=$_POST['type_ngn'];
             }elseif ($_POST['ts']=='y'){
                 $model->type=$_POST['type_y'];
                 $model->name='تقاضای دریافت چه سرویس هایی را دارید.';
             }elseif ($_POST['ts']=='IPTV'){
                 $model->name=$_POST['name3'];
                 $model->time=$_POST['time2'];
                 $model->price=$_POST['price2'];
             }else{
                 $model->name=$_POST['name'];
                 $model->time=$_POST['time1'];
                 $model->price=$_POST['price1'];
             }



              
                if($model->sabtnam == 'NGN' || $model->sabtnam == 'y'){

                        $chek = TblServices1::find()->where(['name' => $model->name])->andWhere(['sabtnam'=>$model->sabtnam])->andWhere(['enableview' => 1])->count();

                        if ($chek == 0) {




                            if ($model->save()) {
                                return $this->redirect(['view', 'id' => $model->id]);
                            } else {

                                $_SESSION['error'] = 'خطا: لطفا مجددا اطلاعات را وارد کنید.';
                                return $this->render('create', [
                                    'model' => $model,

                                ]);
                            }
                        } else {
                            $_SESSION['error'] = 'خطا: قبلا ' . $model->name . ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
                            return $this->render('create', [
                                'model' => $model,

                            ]);
                        }


                }

                if($model->sabtnam == 'IPTV'){
                    $model->type='SBT';

                }

                if( $model->save()){

                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                   
                    $_SESSION['error']='خطا: اطلاعات ذخیره نشد.مجددا امتحان کنید.';
                    return $this->render('create', [
                        'model' => $model,

                    ]);
                }


            }else{
//                error بدهد
            }

           
          
        }

        return $this->render('create', [
            'model' => $model,

        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {

            if(isset($_POST['ts']) && $_POST['ts']!=null){
                $model->sabtnam=$_POST['ts'];
                if($_POST['ts']=='NGN'){
                    $model->name='آی پی آسیا تک را روی کدام سیستم دارید.';
                    $model->type=$_POST['type_ngn'];
                }elseif ($_POST['ts']=='y'){

                    $model->type=$_POST['type_y'];
                    $model->name='تقاضای دریافت چه سرویس هایی را دارید.';

                }elseif ($_POST['ts']=='IPTV'){
                    $model->name=$_POST['name3'];
                }else{
                    $model->name=$_POST['name'];
                }

                if ($model->sabtnam == 'NGN' || $model->sabtnam == 'y') {

                       $chek=TblServices1::find()->where(['name'=>$model->name])->andWhere(['enableview'=>1])->one();
                    if($chek->id == $id){

                        if ($model->save()) {
                            return $this->redirect(['view', 'id' => $model->id]);
                        } else {



                            return $this->render('update', [
                                'model' => $model,

                            ]);
                        }
                    }else{
                        $_SESSION['error'] = 'خطا: شما نمی توانید این فیلد را در این قسمت ویرایش کنید ';

                        return $this->render('update', [
                            'model' => $model,

                        ]);
                    }




                }

                if($model->sabtnam == 'IPTV'){
                $model->type='SBT';

                }

                if ($model->save()) {

                    return $this->redirect(['view', 'id' => $model->id]);
                } else {

                    $_SESSION['error'] = 'خطا: اطلاعات ذخیره نشد.مجددا امتحان کنید.';
                    return $this->render('update', [
                        'model' => $model,

                    ]);
                }


            }

        }
        return $this->render('update', [
            
            'model' => $model,

        ]);
    }


    public function actionDelete($id)
    {
        $model=$this->findModel($id);

        if($model->sabtnam == 'NGN' || $model->sabtnam == 'y') {

            $_SESSION['error'] = 'خطا: نمی توانید این فیلد:'. $model->name. ' را حذف کنید،اگر مایل به تغییر آن هستید ویرایش کنید.';
            return $this->render('update', [
                'model' => $model,

            ]);
        }
        $model->enableview=0;

        $model->save();
        
        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = TblServices1::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
