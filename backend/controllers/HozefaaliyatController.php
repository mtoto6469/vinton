<?php

namespace backend\controllers;

use Yii;
use backend\models\Hozefaaliyat;
use backend\models\HozefaaliyatSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HozefaaliyatController implements the CRUD actions for Hozefaaliyat model.
 */
class HozefaaliyatController extends Controller
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


    public function actionIndex()
    {
        $searchModel = new HozefaaliyatSearch();
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
        $model = new Hozefaaliyat();

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


    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->enableview=0;
        $model->save();
        
        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Hozefaaliyat::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
