<?php

namespace frontend\controllers;

use backend\models\Sabtnam;
use frontend\models\TblAddedInformation;
use frontend\models\TblPhone;
use frontend\models\TblServices1;
use Yii;
use frontend\models\Adsl;
use frontend\models\AdslSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdslController implements the CRUD actions for Adsl model.
 */
class AdslController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Adsl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdslSearch();
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





    public function actionAdsl($type)
    {
     
        if(Yii::$app->request->post()){


            if($type=='adsl' || $type == 'vdsl') {

                if (isset($_POST['pishshomare']) && isset($_POST['shomare']) && $_POST['pishshomare'] != null && $_POST['shomare'] != null) {

                        $pishshomare = $_POST['pishshomare'];

                        $shomare = $_POST['shomare'];

                        return $this->redirect(['factor1',

                            'shomare' => $shomare,
                            'pishshomare' => $pishshomare,
                            'type' => $type,
                          
                        ]);



                } else {

                    $_SESSION['error'] = 'لطفا شماره را درست وارد کنید';

                    $pishshomare = TblPhone::find()->where(['enable' => '1'])->andWhere(['enableview' => '1'])->all();
                    return $this->render('ADSL', [
                        'pishshomare' => $pishshomare,

                    ]);

                }
            }
            else{
                switch ($type){
                    case 'owa':
                        
                        return $this->redirect(['factor2',
                            'type' => $type,
                        ]);
                    case 'td-lte':
                        return $this->redirect(['factor2',
                            'type' => $type,
                        ]);
                    
                    case 'iptv':
                        return $this->redirect(['factor2',
                        'type'=>$type,]);
                }
            }

        }



            if($type=='adsl' || $type=='vdsl' ){


             

                $pishshomare=TblPhone::find()->where(['enable'=>'1'])->andWhere(['enableview'=>'1'])->all();
                return $this->render('ADSL',[
                       
                        'type'=>$type,
                        'pishshomare'=>$pishshomare,

                    ]);


            }
            else{
                switch ($type){
                    case 'owa':
                        return $this->redirect(['factor2',
                            'type' => $type,
                        ]);
                    case 'td-lte':
                        return $this->redirect(['factor2',
                            'type' => $type,
                        ]);
                    case 'iptv':
                        return $this->redirect(['factor2',
                            'type' => $type,
                        ]);
                }
            }



}

        public function actionFactor1($shomare,$pishshomare,$type)
        {
            $model= new Adsl();
            if($model->load(Yii::$app->request->post())){
                
                

                $model->save();
              return $this->redirect(['view','id'=>$model->id]);

            }



           if(isset($_GET['status']) ){
               if($_GET['status']!=null ){

                   $status =$_GET['status'];
                   if ($status == 0 ) {



                       $eshterak = TblPhone::find()->where(['pishshomare' => $pishshomare])->andWhere(['sabtenam' => $type])->andWhere(['enable' => '1'])->andWhere(['enableview' => '1'])->all();


                       $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();

                       if($sabtnam!=null){

                           $ranzh=$sabtnam->ranzh;

                           $model = new Adsl();
                           return $this->render('factor1', [
                               'ranzh'=>$ranzh,
                               'model' => $model,
                               'eshterak' => $eshterak,
                               'pishshomare' => $pishshomare,
                               'shomare' => $shomare,
                               'type' => $type,
                               'status'=>$status,

                           ]);
                       }
                       else{
                           $ranzh=0;
                           $model = new Adsl();
                           return $this->render('factor1', [
                               'ranzh'=>$ranzh,
                               'model' => $model,
                               'eshterak' => $eshterak,
                               'pishshomare' => $pishshomare,
                               'shomare' => $shomare,
                               'type' => $type,
                               'status'=>$status,  ]);
                       }


                   }
                   else{
                       $eshterak = TblPhone::find()->where(['pishshomare' => $pishshomare])->andWhere(['sabtenam' => $type])->andWhere(['enable' => '1'])->andWhere(['enableview' => '1'])->all();

                       $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();

                       $status=1;


                       if($sabtnam!=null){

                           $ranzh=$sabtnam->ranzh;

                           $model = new Adsl();
                           return $this->render('factor1', [
                               'ranzh'=>$ranzh,
                               'model' => $model,
                               'eshterak' => $eshterak,
                               'pishshomare' => $pishshomare,
                               'shomare' => $shomare,
                               'type' => $type,
                               'status'=>$status,

                           ]);
                       }
                       else{
                           $ranzh=0;
                           $model = new Adsl();
                           return $this->render('factor1', [
                               'ranzh'=>$ranzh,
                               'model' => $model,
                               'eshterak' => $eshterak,
                               'pishshomare' => $pishshomare,
                               'shomare' => $shomare,
                               'type' => $type,
                               'status'=>$status,  ]);
                       }
                   }


               }
               else{

                   $eshterak = TblPhone::find()->where(['pishshomare' => $pishshomare])->andWhere(['sabtenam' => $type])->andWhere(['enable' => '1'])->andWhere(['enableview' => '1'])->all();

                   $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();


                   $status=1;
                   if($sabtnam!=null){

                       $ranzh=$sabtnam->ranzh;

                       $model = new Adsl();
                       return $this->render('factor1', [
                           'ranzh'=>$ranzh,
                           'model' => $model,
                           'eshterak' => $eshterak,
                           'pishshomare' => $pishshomare,
                           'shomare' => $shomare,
                           'type' => $type,
                           'status'=>$status,

                       ]);
                   }
                   else{
                       $ranzh=0;
                       $model = new Adsl();
                       return $this->render('factor1', [
                           'ranzh'=>$ranzh,
                           'model' => $model,
                           'eshterak' => $eshterak,
                           'pishshomare' => $pishshomare,
                           'shomare' => $shomare,
                           'type' => $type,
                           'status'=>$status,  ]);
                   }
               }
           }
           else{
               $eshterak = TblPhone::find()->where(['pishshomare' => $pishshomare])->andWhere(['sabtenam' => $type])->andWhere(['enable' => '1'])->andWhere(['enableview' => '1'])->all();

               $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();


               $status=1;
               if($sabtnam!=null){

                   $ranzh=$sabtnam->ranzh;

                   $model = new Adsl();
                   return $this->render('factor1', [
                       'ranzh'=>$ranzh,
                       'model' => $model,
                       'eshterak' => $eshterak,
                       'pishshomare' => $pishshomare,
                       'shomare' => $shomare,
                       'type' => $type,
                       'status'=>$status,

                   ]);
               }
               else{
                   $ranzh=0;
                   $model = new Adsl();
                   return $this->render('factor1', [
                       'ranzh'=>$ranzh,
                       'model' => $model,
                       'eshterak' => $eshterak,
                       'pishshomare' => $pishshomare,
                       'shomare' => $shomare,
                       'type' => $type,
                       'status'=>$status,  ]);
               }
           }
  
}




    public function actionFactor2($type)
    {
        $model = new Adsl();
        if ($model->load(Yii::$app->request->post())) {
         
           $model->save();
           if($model->type == 'owa' || $model->type == 'td-lte' || $model->type == 'iptv'){
               $model1= Adsl::find()->where(['id'=>$model->id])->one();
               $model1->eshterak= $model1->eshterak.'_'.$model1->id;
               $model1->save();

               return $this->redirect(['view', 'id' => $model1->id]);
           }
            return $this->redirect(['view', 'id' => $model->id]);

        }


        if(isset($_GET['status']) ){
            if($_GET['status']!=null ){

                $status =$_GET['status'];
                if ($status == 0 ) {





                    $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();

                    if($sabtnam!=null){

                        $ranzh=$sabtnam->ranzh;

                        $model = new Adsl();
                        return $this->render('factor1', [
                            'ranzh'=>$ranzh,
                            'model' => $model,
                            'type' => $type,
                            'status'=>$status,

                        ]);
                    }
                    else{
                        $ranzh=0;
                        $model = new Adsl();
                        return $this->render('factor1', [
                            'ranzh'=>$ranzh,
                            'model' => $model,
                            'type' => $type,
                            'status'=>$status,  ]);
                    }
                }
                else{

                    $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();

                    if($sabtnam!=null){

                        $ranzh=$sabtnam->ranzh;

                        $model = new Adsl();
                        return $this->render('factor1', [
                            'ranzh'=>$ranzh,
                            'model' => $model,
                            'status'=>$status,
                            'type' => $type,

                        ]);
                    }
                    else{
                        $ranzh=0;
                        $model = new Adsl();
                        return $this->render('factor1', [
                            'ranzh'=>$ranzh,
                            'model' => $model,
                            'status'=>$status,
                            'type' => $type,  ]);
                    }
                }


            }
            else{


                $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();
                $status=1;
                if($sabtnam!=null){

                    $ranzh=$sabtnam->ranzh;

                    $model = new Adsl();
                    return $this->render('factor1', [
                        'ranzh'=>$ranzh,
                        'model' => $model,
                        'type' => $type,
                        'status'=>$status,

                    ]);
                }
                else{
                    $ranzh=0;
                    $model = new Adsl();
                    return $this->render('factor1', [
                        'ranzh'=>$ranzh,
                        'model' => $model,
                        'status'=>$status,
                        'type' => $type,  ]);
                }
            }
        }
        else{

            $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();

            $ranzh=$sabtnam->ranzh;
            $model = new Adsl();
            $status=1;
            return $this->render('factor1', [
                'ranzh'=>$ranzh,
                'model' => $model,
              
                'type' => $type,
                'status'=>$status,
            ]);
        }








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
                   $f.='<div class="form-group field-adsl-id_services">';
                   $f.='<label class="control-label" for="adsl-id_services">Id Services</label>';
                   $f.='<select id="adsl-id_services" class="form-control" name="Adsl[id_services]">';
                   
                   foreach ($id_services as $is){
                       $f.='<option value="'.$is->id.'">'.'سرعت:'.$is->speed.'حجم:'.$is->hajm.'مدت:'.$is->time.' قیمت:'.$is->price.'</option>';
                       
                   }

                $f.='</select> <div class="help-block"></div></div>';
                  
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
                    $f.='<div class="form-group field-adsl-id_added">';
                    $f.='<label class="control-label" for="adsl-id_added">Id added</label>';
                    $f.='<select id="adsl-id_added" class="form-control" name="Adsl[id_added]">';

                    foreach ($id_added as $ia){
                        $f.='<option value="'.$ia->id.'">'.' نوع '. $ia->name .':'.$ia->service.' سرعت:'.$ia->speed.'حجم: '.$ia->hajm.' مدت: '.$ia->time.' قیمت:'.$ia->price.'</option>';

                    }

                    $f.='</select> <div class="help-block"></div></div>';

                }


            }
        }

        return $f;

    }
    
  

    protected function findModel($id)
    {
        if (($model = Adsl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

}

