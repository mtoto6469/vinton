<?php

namespace backend\controllers;

use backend\models\Sabtnam;
use Yii;
use backend\models\Khadamat;
use backend\models\KhadamatSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * KhadamatController implements the CRUD actions for Khadamat model.
 */
class KhadamatController extends Controller
{
    public $enableCsrfValidation= false;
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
                        'actions' => ['index','view','create','update','delete'],
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
     * Lists all Khadamat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KhadamatSearch();
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
        $model = new Khadamat();

   
        if ($model->load(Yii::$app->request->post())  ) {

            if($model->save()){


                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return $this->render('create', [
                    'model' => $model,

                ]);
            }

        }

        return $this->render('create', [
            'model' => $model,
          
        ]);
    }

    /**
     * Updates an existing Khadamat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
     
        if ($model->load(Yii::$app->request->post()) ) {

            if( $model->save()){

                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return $this->render('update', [
                    'model' => $model,

                ]);
            }


        }

        return $this->render('update', [
            'model' => $model,
           
        ]);
    }

    /**
     * Deletes an existing Khadamat model.
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
     * Finds the Khadamat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Khadamat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Khadamat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
