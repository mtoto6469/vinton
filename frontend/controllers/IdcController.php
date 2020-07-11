<?php

namespace frontend\controllers;

use frontend\models\Domain;
use frontend\models\Host;
use Yii;
use frontend\models\Idc;
use frontend\models\IdcSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IdcController implements the CRUD actions for Idc model.
 */
class IdcController extends Controller
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
     * Lists all Idc models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdcSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Idc model.
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

    /**
     * Creates a new Idc model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionFactor4($type)
    {
        $model = new Idc();

        if ($model->load(Yii::$app->request->post())) {


            $model->save();
//var_dump($model->getErrors());exit;
            $model1= Idc::find()->where(['id'=>$model->id])->one();
            $model1->eshterak= $model1->eshterak.'_'.$model1->id;
            $model1->save();
            return $this->redirect(['view', 'id' => $model1->id]);



        }
        $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();
        if($sabtnam!=null){

            $ranzh=$sabtnam->ranzh;

            $model = new Idc();
            return $this->render('factor4', [
                'ranzh'=>$ranzh,
                'model' => $model,

                'type' => $type,

            ]);
        }
        else{
            $ranzh=0;
            $model = new Idc();
            return $this->render('factor4', [
                'ranzh'=>$ranzh,
                'model' => $model,

                'type' => $type,  ]);
        }

    }

    public function actionDomain(){


        $f='';
        if(isset($_GET['name']) ){
            if($_GET['name']!=null ){
                $name=$_GET['name'];


                $id=Domain::find()->where(['type'=>$name])
                    ->andWhere(['enable'=>1])->andWhere(['enableview'=>1])->all();
                if($id!=null){
                    $f.='<div class="form-group field-idc-id_domain">';
                    $f.='<label class="control-label" for="idc-id_domain">id_domain</label>';
                    $f.='<select id="idc-id_domain" class="form-control" name="Idc[id_domain]">';

                    foreach ($id as $i){
                        $f.='<option value="'.$i->id.'">'.' نام تجاری '. $i->name .':'.$i->time.' مدت:'.$i->price.' قیمت:'.$i->discription.' توضیحات:'.'</option>';

                    }

                    $f.='</select> <div class="help-block"></div></div>';

                }


            }
        }

        return $f;

    }

    public function actionHost(){

        $f='';
        $id=Host::find()->where(['enable'=>1])->andWhere(['enableview'=>1])->all();
        if($id!=null){
            $f.='<div class="form-group field-idc-id_host">';
            $f.='<label class="control-label" for="idc-id_host">id_host</label>';
            $f.='<select id="idc-id_host" class="form-control" name="Idc[id_host]">';

            foreach ($id as $i){
                $f.='<option value="'.$i->id.'">'.' نام تجاری '. $i->name .':'.$i->time.' مدت:'.$i->price.' قیمت:'.$i->discription.' توضیحات:'
                    .$i->faza.' فضا:'.$i->terafik.' ترافیک:'.$i->systemamel.'سیستم عامل:'.$i->controll_panel.' کنترل پنل:'
                    .$i->pahnayeband.' پهنای باند:'.'</option>';

            }

            $f.='</select> <div class="help-block"></div></div>';

        }

    }





    protected function findModel($id)
    {
        if (($model = Idc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
