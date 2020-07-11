<?php

namespace backend\controllers;

use backend\models\Sabtnam;
use Yii;
use backend\models\TblAddedInformation;
use backend\models\TblAddedInformationSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TbladdedinformationController implements the CRUD actions for TblAddedInformation model.
 */
class TbladdedinformationController extends Controller
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
     * Lists all TblAddedInformation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblAddedInformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblAddedInformation model.
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
     * Creates a new TblAddedInformation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new TblAddedInformation();
        
        if ($model->load(Yii::$app->request->post())) {


            if ($model->name == 'مودم' || $model->name == 'نیاز به بسته اینترنتی') {

                if ($model->name == 'مودم') {


                    $chek = TblAddedInformation::find()->where(['service' => $model->service])->andWhere(['name' => $model->name])->andWhere(['sabtnam' => $model->sabtnam])->andWhere(['enableview' => 1])->count();
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
                        $_SESSION['error'] = 'خطا: قبلا ' . $model->service . ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
                        return $this->render('create', [
                            'model' => $model,

                        ]);
                    }
                }elseif ( $model->name == 'نیاز به بسته اینترنتی'){


                    $chek = TblAddedInformation::find()->where(['hajm' => $model->hajm])->andWhere(['speed'=>$model->speed])->andWhere(['time'=>$model->time])
                        ->andWhere(['name' => $model->name])->andWhere(['sabtnam' => $model->sabtnam])->andWhere(['enableview' => 1])->count();
                    if ($chek == 0) {
                        if ($model->save()) {
                            return $this->redirect(['view', 'id' => $model->id]);
                        } else {


                            $_SESSION['error'] = 'خطا: لطفا مجددا اطلاعات را وارد کنید.';
                            return $this->render('create', [
                                'model' => $model,
//
                            ]);
                        }
                    } else {
                        $_SESSION['error'] = 'خطا: قبلا ' . $model->name . ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
                        return $this->render('create', [
                            'model' => $model,
//
                        ]);
                    }
                }

            } else {



                $chek = TblAddedInformation::find()->where(['name' => $model->name])->andWhere(['sabtnam'=>$model->sabtnam])->andWhere(['enableview' => 1])->count();

                if ($chek == 0) {

                    if ($model->save()) {

                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
//var_dump($model->getErrors());exit;
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

//                $chek = TblAddedInformation::find()->where(['name' => $model->name])->andWhere(['sabtnam'=>$model->sabtnam])->andWhere(['enableview' => 1])->count();
//
//                if ($chek == 0) {
//
//                    if ($model->save()) {
//
//                        return $this->redirect(['view', 'id' => $model->id]);
//                    } else {
//
//                        $_SESSION['error'] = 'خطا: لطفا مجددا اطلاعات را وارد کنید.';
//                        return $this->render('create', [
//                            'model' => $model,
//
//                        ]);
//                    }
//                } else {
//                    $_SESSION['error'] = 'خطا: قبلا ' . $model->name . ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
//                    return $this->render('create', [
//                        'model' => $model,
//
//                    ]);
//                }
            }


        }


        return $this->render('create', [
            'model' => $model,
//
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


         $service=$model->service;
         $name=$model->name;
        if ($model->load(Yii::$app->request->post())) {


            if ($model->name == 'مودم' || $model->name == 'نیاز به بسته اینترنتی') {


                if ($service == $model->service) {

                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {

                        $_SESSION['error'] = 'خطا: لطفا مجددا اطلاعات را وارد کنید.';
                        return $this->render('update', [
                            'model' => $model,

                        ]);
                    }
                } else {

                $chek = TblAddedInformation::find()->where(['service' => $model->service])->andWhere(['sabtnam' => $model->sabtnam])->andWhere(['enableview' => 1])->count();
                if ($chek == 0) {
                    if ($model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {

                        $_SESSION['error'] = 'خطا: لطفا مجددا اطلاعات را وارد کنید.';
                        return $this->render('update', [
                            'model' => $model,

                        ]);
                    }
                } else {
                    $_SESSION['error'] = 'خطا: قبلا ' . $model->service . ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
                    return $this->render('update', [
                        'model' => $model,

                    ]);
                }
            }
            }else{

                 if($name == $model->name){
                     $model->service='void';

                     if ($model->save()) {

                         return $this->redirect(['view', 'id' => $model->id]);
                     } else {

                         $_SESSION['error'] = 'خطا:1 لطفا مجددا اطلاعات را وارد کنید.';
                         return $this->render('update', [
                             'model' => $model,

                         ]);
                     }
                 }else{
                     $chek = TblAddedInformation::find()->where(['name' => $model->name])->andWhere(['sabtnam'=>$model->sabtnam])->andWhere(['enableview' => 1])->count();
                     if ($chek == 0) {

                         $model->service='void';

                         if ($model->save()) {

                             return $this->redirect(['view', 'id' => $model->id]);
                         } else {

                             $_SESSION['error'] = 'خطا:اطلاعات ناقص است. لطفا مجددا اطلاعات را وارد کنید.';
                             return $this->render('update', [
                                 'model' => $model,

                             ]);
                         }
                     } else {
                         $_SESSION['error'] = 'خطا: قبلا ' . $model->name . ' را وارد کرده اید لطفا برای تغییر اطلاعات آن را ویرایش کنید';
                         return $this->render('update', [
                             'model' => $model,

                         ]);
                     }
                 }




            }


        }

        return $this->render('update', [
            'model' => $model,
//            'sabtnam' =>$sabtnam,
        ]);
    }

    /**
     * Deletes an existing TblAddedInformation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=  $this->findModel($id);



        if($model->name == 'مودم' || $model->name == 'نیاز به بسته اینترنتی') {

            $chek = TblAddedInformation::find()->where(['name'=>$model->name])->andWhere(['sabtnam'=>$model->sabtnam])->andWhere(['enableview' => 1])->count();
//            var_dump($chek);   exit;
            if ($chek == 1) {


                $_SESSION['error1'] = 'خطا: نمی توانید این فیلد را حذف کنید،اگر مایل به تغییر آن هستید ویرایش کنید.';
                return $this->redirect(['index']);
            } else {

                $model->enableview = 0;

                if($model->save()){

                    return $this->redirect(['index']);
                }else{
//                    var_dump($model->getErrors());exit;
                $_SESSION['error1']='حذف نشد.';
                    return $this->redirect(['index']);
                }
            }

        }
        else{

            $_SESSION['error1'] = 'خطا: نمی توانید این فیلد را حذف کنید،اگر مایل به تغییر آن هستید ویرایش کنید.';
            return $this->redirect(['index']);

        }


    }

    /**
     * Finds the TblAddedInformation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblAddedInformation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblAddedInformation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
