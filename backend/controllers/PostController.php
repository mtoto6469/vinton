<?php

namespace backend\controllers;

use backend\models\Upload;
use Yii;
use backend\models\Post;
use backend\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $modelupload = new Upload();
        if ($model->load(Yii::$app->request->post())) {

            $modelupload ->imageFile = UploadedFile::getInstance( $modelupload , 'imageFile');

            if($modelupload->imageFile !=null) {

                $modelupload->imageFile->saveAs(Yii::getAlias('@upload') . '/upload/post/' . $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension);

                $model->img = $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension;

                

                if ($model->save()){



                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    return $this->render('create', [
                        'model' => $model,
                        'modelupload' => $modelupload
                    ]);
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
            

   
   

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelupload = new Upload();


        if ($model->load(Yii::$app->request->post())) {


            $modelupload ->imageFile = UploadedFile::getInstance( $modelupload , 'imageFile');


            if ($modelupload->imageFile !=null) {

                $modelupload->imageFile->saveAs(Yii::getAlias('@upload') . '/upload/post/' . $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension);

                $model->img = $modelupload->imageFile->baseName . '.' . $modelupload->imageFile->extension;

               if($model->save()){
                   return $this->redirect(['view', 'id' => $model->id]);
               } else{
                   var_dump($model->getErrors());
                   return $this->render('update', [
                       'model' => $model,
                       'modelupload' => $modelupload,

                   ]);

               }



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

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
        $model->enableview=0;
        $model->save();
        unlink(Yii::getAlias('@upload') . '/upload/post/'.$model->img);


        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
