<?php

namespace frontend\controllers;

use frontend\models\TblAddedInformation;
use frontend\models\TblServices1;
use frontend\models\TblShomare;
use Yii;
use frontend\models\FactorNgn;
use frontend\models\FactorNgnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FactorngnController implements the CRUD actions for FactorNgn model.
 */
class FactorngnController extends Controller
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
     * Lists all FactorNgn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FactorNgnSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FactorNgn model.
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


//    public function actionCreate($type)
//    {
//
//        return $this->redirect(['factor3',
//
//            'type' => $type,
//        ]);






//    }

    public function actionFactor3($type){

        $model = new FactorNgn();
        if ($model->load(Yii::$app->request->post())) {


        $model->save();
//var_dump($model->getErrors());exit;
                $model1= FactorNgn::find()->where(['id'=>$model->id])->one();
                $model1->eshterak= $model1->eshterak.'_'.$model1->id;
                $model1->save();
                return $this->redirect(['view', 'id' => $model1->id]);







            }


        $sabtnam=\frontend\models\Sabtnam::find()->where(['name'=>$type])->one();
        if($sabtnam!=null){

            $ranzh=$sabtnam->ranzh;

            $model = new FactorNgn();
            return $this->render('factor3', [
                'ranzh'=>$ranzh,
                'model' => $model,

                'type' => $type,

            ]);
        }
        else{
            $ranzh=0;
            $model = new FactorNgn();
            return $this->render('factor3', [
                'ranzh'=>$ranzh,
                'model' => $model,

                'type' => $type,  ]);
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
                    $f.='<div class="form-group field-factorngn-id_services">';
                    $f.='<label class="control-label" for="factorngn-id_services">Id Services</label>';
                    $f.='<select id="factorngn-id_services" class="form-control" name="Factorngn[id_services]">';

                    foreach ($id_services as $is){
                        $f.='<option value="'.$is->id.'">'.$is->type.'</option>';

                    }

                    $f.='</select> <div class="help-block"></div></div>';

                }


            }
        }

        return $f;

    }




    public function actionTypeshomare()
    {




        $f='';
        if(isset($_GET['name'])&& isset($_GET['type']) ){
            if($_GET['name']!=null && $_GET['type']!=null ){
                $name=$_GET['name'];
                $type=$_GET['type'];

                $id_services=TblShomare::find()->where(['type_shomare'=>$name])
                    ->andWhere(['enable'=>1])->andWhere(['enableview'=>1])->one();

                if($id_services!=null){


if ($type == 'mvno'){
    $f.='<div>';
    $f.='<label>x </label>';
    $f.='<input id="x"
                        type="text" value="'.$id_services->type_shomare.'">';

}else{

    $f.='<div class="form-group field-factorngn-id_tblshomare ">';
    $f.='<label class="control-label" for="factorngn-id_tblshomare ">id_tblshomare </label>';


    $f.='<input id="factorngn-id_tblshomare" class="form-control" name="FactorNgn[id_tblshomare]" 
                        type="text" value="'.$id_services->id.'">';







    $f.='<div class="help-block"></div></div>';
}







                    $f.='<div class="help-block"></div></div>';

                }


            }
        }

        return $f;

    }

    public function actionNameshomare()
    {




        $f='';
        if(isset($_GET['name'])&& isset($_GET['type']) && isset($_GET['id'])){
            if($_GET['name']!=null && $_GET['type']!=null && $_GET['id']!=null){
                $name=$_GET['name'];
                $type=$_GET['type'];
                $id=$_GET['id'];

                $id_services=TblShomare::find()->where(['sabtnam'=>$type])->andWhere(['name_shomare'=>$name])->andWhere(['type_shomare'=>$id])
                    ->andWhere(['enable'=>1])->andWhere(['enableview'=>1])->one();

                if($id_services!=null){

                    $f.='<div class="form-group field-factorngn-id_tblshomare ">';
                    $f.='<label class="control-label" for="factorngn-id_tblshomare ">id_tblshomare </label>';


                    $f.='<input id="factorngn-id_tblshomare" class="form-control" name="FactorNgn[id_tblshomare]" 
                        type="text" value="'.$id_services->id.'">';







                    $f.='<div class="help-block"></div></div>';

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
                    $f.='<div class="form-group field-factorngn-id_added">';
                    $f.='<label class="control-label" for="factorngn-id_added">Id added</label>';
                    $f.='<select id="factorngn-id_added" class="form-control" name="Factorngn[id_added]">';

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
        if (($model = FactorNgn::findOne($id)) !== null) {


            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}