<?php

namespace backend\controllers;

use Yii;
use backend\models\Sabtnam;
use backend\models\SabtnamSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SabtnamController implements the CRUD actions for Sabtnam model.
 */
class SabtnamController extends Controller
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
     * Lists all Sabtnam models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SabtnamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sabtnam model.
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
     * Creates a new Sabtnam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sabtnam();

        if ($model->load(Yii::$app->request->post())) {

            $chek = Sabtnam::find()->where(['name'=>$model->name])->count();
            if($chek==0){
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                else{

                    $_SESSION['error']='خطا: لطفا مجددا اطلاعات را وارد کنید.';
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }else{
                $_SESSION['error']='خطا: قبلا ' .$model->name. ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
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
     * Updates an existing Sabtnam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

//            $chek = Sabtnam::find()->where(['name'=>$model->name])->count();
//            if($chek==0){
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
                else{

                    $_SESSION['error']='خطا: لطفا مجددا اطلاعات را وارد کنید.';
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
//            }else{
//                $_SESSION['error']='خطا: قبلا ' .$model->name. ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
//                return $this->render('update', [
//                    'model' => $model,
//                ]);
//            }



           
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sabtnam model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sabtnam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sabtnam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sabtnam::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
