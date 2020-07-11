<?php

namespace backend\controllers;

use backend\models\TblPhone;
use backend\models\Upload;
use Yii;
use backend\models\Gallery;
use backend\models\GallerySearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;


/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends Controller
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

 
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
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
        $model = new Gallery();
        $modelupload = new Upload();

        if ($model->load(Yii::$app->request->post())) {


            $modelupload ->imageFile = UploadedFile::getInstance( $modelupload , 'imageFile');

            if($modelupload->imageFile !=null) {

//                if ($modelupload->validate()) {
                   
                    $modelupload->imageFile->saveAs(Yii::getAlias('@upload') . '/upload/logo/' . $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension);

                    $model->img = $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension;

                    if ($model->save()){



                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                
            }
            else {

                return $this->render('create', [
                    'model' => $model,
                    'modelupload' => $modelupload
                ]);

            }


        }
    
            return $this->render('create', [
                'model' => $model,
                'modelupload'=>$modelupload
            ]);
        }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        $modelupload = new Upload();
      

        if ($model->load(Yii::$app->request->post())) {


            $modelupload ->imageFile = UploadedFile::getInstance( $modelupload , 'imageFile');


                if ($modelupload->validate()) {

                    $modelupload->imageFile->saveAs(Yii::getAlias('@upload') . '/upload/logo/' . $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension);

                    $model->img = $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension;

                    $model->save();

                    return $this->redirect(['view', 'id' => $model->id]);

                } else {

                    return $this->render('update', [
                        'model' => $model,
                        'modelupload' => $modelupload,

                    ]);

                }




        }





        return $this->render('update', [
            'model' => $model,
            'modelupload' => $modelupload,

        ]);
    }

    public function actionDelete($id)
    {
       $model= $this->findModel($id);
        $model->enableview=0;
        $model->save();
        unlink(Yii::getAlias('@upload') . '/upload/logo/'.$model->img);


      

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }





}
