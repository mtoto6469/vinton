<?php

namespace backend\controllers;

use backend\models\TblRange;
use Codeception\Lib\Generator\Helper;
use Yii;
use backend\models\TblCoordinates;
use backend\models\TblCoordinatesSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CoordinatesController implements the CRUD actions for TblCoordinates model.
 */
class CoordinatesController extends Controller
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
//                    [
//                        'actions' => [],
//                        'allow' => true,
//                    ],
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
     * Lists all TblCoordinates models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblCoordinatesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblCoordinates model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblCoordinates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $sesssion = Yii::$app->session;
        if (!$sesssion->isActive) {
            $sesssion->open();
        }
        $model = new TblCoordinates();
        $coor= new TblRange();
         $coor= $coor->find()->where(["enabel"=>1])->all();

        $range=ArrayHelper::map($coor , "id" , "name");
        if ($model->load(Yii::$app->request->post())) {

            $check=$model->find()->where(["id_range"=>$model->id_range])->all();
            if($check!=null){

                $_SESSION['error'] ="<br />"."نقاط این منطقه قبلا مشخص شده است";
                return $this->render('create', [
                    'model' => $model,
                    "range"=>$range
                ]);

            }else{


                if($_POST['lng'] != null && $_POST['lat']!=null) {

                    $lat = $_POST['lat'];
                    $lng = $_POST['lng'];

                    $lat = explode(",", $lat);
                    $lng = explode(",", $lng);
                    $countlat = count($lat);
                    $countlng = count($lng);


                    if ($countlat >= 4 && $countlng >= 4) {


                        $i = 0;
                        $id_r = $model->id_range;
                        foreach ($lat as $var) {
                            $i++;
                        }


                        for ($j = 0; $j < $i; $j++) {
                            $model2 = new TblCoordinates();
                            $model2->lat = $lat[$j];
                            $model2->lng = $lng[$j];
                            $model2->enabel = 1;
                            $model2->enabel_view = 1;
                            $model2->sh1 = "khali";
                            $model2->sh2 = "khali";
                            $model2->id_range = $id_r;

                            if ($model2->save()) {

                                $_SESSION['error'] = "تمامی نقاط با موفقیت ذخیره شد";


                            } else {
//                        var_dump($model2->getErrors());exit;
                                $_SESSION['error'] = "در ذخیره اطلاعات مشکلی بوجود آمده است";
                                return $this->render('create', [
                                    'model' => $model,
                                    "range" => $range
                                ]);
                            }

                        }
                        return $this->redirect(['view', 'id' => $model2->id]);
                    }else{
                        $_SESSION['error']="خطا:حداقل باید چهار نقطه را روی نقشه مشخص کنید";
                        return $this->render('create', [
                            'model' => $model,
                            "range"=>$range
                        ]);
                    }

                }else{
                    $_SESSION['error']="حداقل باید چهار نقطه را روی نقشه مشخص کنید";
                    return $this->render('create', [
                        'model' => $model,
                        "range"=>$range
                    ]);
                }
            }





//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                "range"=>$range
            ]);
        }
    }

    /**
     * Updates an existing TblCoordinates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $session=Yii::$app->session;
        if(!$session->isActive){
            $session->open();
        }
        $model = new TblCoordinates();
        $coor= new TblRange();
        $coor= $coor->find()->where(["enabel"=>1])->all();
        $range=ArrayHelper::map($coor , "id" , "name");
        if ($model->load(Yii::$app->request->post())) {
            $check=$model->find()->where(["id_range"=>$model->id_range])->all();
            foreach ($check as $del){
                $del->delete();
            }
            if($_POST['lat'] != null && $_POST['lat']!=null){
                $lat=$_POST['lat'];
                $lng=$_POST['lng'];

                $lat=explode(",",$lat);
                $lng=explode(",",$lng);
                $countlat = count($lat);
                $countlng = count($lng);



                if ($countlat >= 4 && $countlng >= 4) {
                $i = 0;
                $id_r=$model->id_range;
                foreach ($lat as $var){
                    $i++;
                }


                for ($j=0;$j<$i;$j++){
                    $model2 = new TblCoordinates();
                    $model2->lat=$lat[$j];
                    $model2->lng=$lng[$j];
                    $model2->enabel=1;
                    $model2->enabel_view=1;
                    $model2->sh1="khali";
                    $model2->sh2="khali";
                    $model2->id_range=$id_r;
                    if($model2->save()){
                        $_SESSION['error'] ="تمامی نقاط با موفقیت ذخیره شد";
                    }else{
                        $_SESSION['error'] ="در ذخیره اطلاعات مشکلی بوجود آمده است";
                        return $this->render('update', [
                            'model' => $model,
                            "range"=>$range
                        ]);
                    }

                }

                return $this->redirect(['view', 'id' => $model2->id]);

              }else{
                    $_SESSION['error'] ="خطا:حداقل باید چهار نقطه را روی نقشه مشخص کنید";
                    return $this->render('update', [
                        'model' => $model,
                        "range"=>$range
                    ]);
                }

            }else{
                $_SESSION['error'] ="حداقل باید چهار نقطه را روی نقشه مشخص کنید";
                return $this->render('update', [
                    'model' => $model,
                    "range"=>$range
                ]);
            }

//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                "range"=>$range
            ]);
        }
    }

    /**
     * Deletes an existing TblCoordinates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->enabel_view=0;
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the TblCoordinates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblCoordinates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblCoordinates::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
