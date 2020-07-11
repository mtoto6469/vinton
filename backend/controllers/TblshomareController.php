<?php

namespace backend\controllers;

use backend\models\Province;
use backend\models\Sabtnam;
use Yii;
use backend\models\TblShomare;
use backend\models\TblShomareSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblshomareController implements the CRUD actions for TblShomare model.
 */
class TblshomareController extends Controller
{
    public $enableCsrfValidation=false;
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
     * Lists all TblShomare models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblShomareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblShomare model.
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
     * Creates a new TblShomare model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblShomare();
//        $ostan=ArrayHelper::map(Province::find()->all(),'name','name');
      

        if ($model->load(Yii::$app->request->post()) ) {

               if(isset($_POST['shomare']) && $_POST['shomare']!=null){
                if($_POST['shomare'] == 'ir'){
                    $model->keshvar= 'ایران';
                    $model->ostan=$_POST['ostan'];
                }else{
                    $model->keshvar= $_POST['keshvar2'];
                    $model->ostan=$_POST['ostan2'];
                }
               }else{
                   $_SESSION['error']='لطفا تمامی فیلد هارا پر کنید';
                   return $this->render('create', [
                       'model' => $model,

//                      'ostan'=> $ostan,
                   ]);
               }


              if( $model->save()){
                  return $this->redirect(['view', 'id' => $model->id]);
              }
              else{
                  return $this->render('create', [
                      'model' => $model,

//                      'ostan'=> $ostan,
                  ]);
              }






        }

        return $this->render('create', [
            'model' => $model,
    
//            'ostan'=> $ostan,
        ]);
    }

    /**
     * Updates an existing TblShomare model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ostan=ArrayHelper::map(Province::find()->all(),'name','name');
   
        if ($model->load(Yii::$app->request->post())  ) {

            if(isset($_POST['shomare']) && $_POST['shomare']!=null){
                if($_POST['shomare'] == 'ir'){
                    $model->keshvar= 'ایران';
                    $model->ostan=$_POST['ostan'];
                }else{
                    $model->keshvar= $_POST['keshvar2'];
                    $model->ostan=$_POST['ostan2'];
                }
            }else{
                $_SESSION['error']='لطفا تمامی فیلد هارا پر کنید';
                return $this->render('create', [
                    'model' => $model,

//                      'ostan'=> $ostan,
                ]);
            }

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{

                return $this->render('update', [
                    'model' => $model,

//                    'ostan'=> $ostan,
                ]);
            }


        }

        return $this->render('update', [
            'model' => $model,
        
//            'ostan'=> $ostan,
        ]);
    }

    /**
     * Deletes an existing TblShomare model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->enableview=0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblShomare model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblShomare the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblShomare::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
