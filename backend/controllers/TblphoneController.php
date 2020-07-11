<?php

namespace backend\controllers;

use backend\models\City;
use backend\models\Province;
use backend\models\Sabtnam;
use Yii;
use backend\models\TblPhone;
use backend\models\TblPhoneSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\Session;

/**
 * TblphoneController implements the CRUD actions for TblPhone model.
 */
class TblphoneController extends Controller
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
                        'actions' => ['index','view','create','update','delete','city'],
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
     * Lists all TblPhone models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPhoneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPhone model.
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
     * Creates a new TblPhone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPhone();

        $sabtnam = ArrayHelper::map(Sabtnam::find()->all(), 'name', 'name');

        $ostan = ArrayHelper::map(Province::find()->all(), 'name', 'name');
        if ($model->load(Yii::$app->request->post())) {


            $rend_shomare = TblPhone::find()->where(['pishshomare' => $model->pishshomare])->andWhere(['enableview'=>'1'])->all();


            foreach ($rend_shomare as $item) {

                $y11 = $item->reng_az;
                $y21 = $item->reng_ta;
                $start1 = $model->reng_az;
                $end1 = $model->reng_ta;
                if ($y11 <= $start1 && $y21 >= $start1 && $y11 <= $end1 && $y21 >= $end1) {
                    $_SESSION['error'] = ' رنج شماره را درست وارد کنید . شماره ای با این رنج موجود می باشد. ';
                    return $this->render('create', [
                        'model' => $model,
                        'sabtnam' => $sabtnam,
                        'ostan' => $ostan,

                    ]);
                }
            }


//               $x= $model->sabtenam;
//               $model->sabtenam = $x;
//            var_dump($_POST);exit;
                if (isset($_POST['TblPhone']['city'])){
                    if($_POST['TblPhone']['city']!=null){

                        $model->shahr=$_POST['TblPhone']['city'];
                    }

                }
                else{

                    $_SESSION['error']='خطا : لطفا نام شهر را به درستی وارد کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'sabtnam' =>$sabtnam,
                        'ostan' =>$ostan,

                    ]);
                }
            if ($model->reng_az > $model->reng_ta) {

                $_SESSION['error'] = 'خطا : لطفا رنج شماره  را به درستی وارد کنید';
                return $this->render('create', [
                    'model' => $model,
                    'sabtnam' => $sabtnam,
                    'ostan' => $ostan,]);
            }

            if ($model->save()) {


                return $this->redirect(['view', 'id' => $model->id]);
            } else {

                $_SESSION['error'] = 'خطا در ذخیره سازی اطلاعات ، لطفا مجددا امتحان کنید';
                return $this->render('create', [
                    'model' => $model,
                    'sabtnam' => $sabtnam,
                    'ostan' => $ostan,
                ]);
            }


        } else {

            return $this->render('create', [
                'model' => $model,
                'sabtnam' => $sabtnam,
                'ostan' => $ostan,
            ]);
        }

    }






    /**
     * Updates an existing TblPhone model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        $sabtnam=ArrayHelper::map(Sabtnam::find()->all(),'name','name');
        $ostan=ArrayHelper::map(Province::find()->all(),'name','name');
        $id_ostan=Province::findOne(['name'=>$model->ostan]);
        $city=City::find()->where(['province_id' => $id_ostan->id])->all();
        if ($model->load(Yii::$app->request->post())) {



//            $x= implode(',',$model->sabtenam);
//            $model->sabtenam = $x;
            if (isset($_POST['TblPhone']['city'])){
                if($_POST['TblPhone']['city']!=null){

                    $model->shahr=$_POST['TblPhone']['city'];
                }

            }
            else{

                $_SESSION['error']='خطا : لطفا نام شهر را به درستی وارد کنید';
                return $this->render('update', [
                    'model' => $model,
                    'sabtnam' =>$sabtnam,
                    'ostan' =>$ostan,
                    'city'=>$city,
                ]);
            }


            if ($model->reng_az > $model->reng_ta) {

                $_SESSION['error'] = 'خطا : لطفا رنج شماره  را به درستی وارد کنید';
                return $this->render('create', [
                    'model' => $model,
                    'sabtnam' => $sabtnam,
                    'ostan' => $ostan,]);
            }
        if( $model->save())  {


            //            var_dump($model->getErrors());exit;
            return $this->redirect(['view', 'id' => $model->id]);
        }

        else
        {

            $_SESSION['error']='خطا در ذخیره سازی اطلاعات ، لطفا مجددا امتحان کنید';
            return $this->render('update', [
                'model' => $model,
                'sabtnam' =>$sabtnam,
                'ostan' =>$ostan,
                'city'=>$city,
            ]);
        }
        }

        return $this->render('update', [
            'model' => $model,
            'sabtnam' =>$sabtnam,
            'ostan' =>$ostan,
            'city'=>$city,

        ]);
    }

    /**
     * Deletes an existing TblPhone model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=  $this->findModel($id);
        $model->enableview='0';

        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPhone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPhone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPhone::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionCity()
    {
        $name = $_GET['name'];
        $id = Province::findOne(['name' => $name]);
        $query = City::find()->where(['province_id' => $id->id])->all();
        $f = '';
        if ($query != null) {
            $f .= '<div class="form-group field-tblphone-ostan required">';
            $f .= '<label class="control-label" for="tblphone-ostan">شهر</label>';
            $f .= '<select id="tblphone-city" class="form-control" name="TblPhone[city]" aria-required="true">';
            foreach ($query as $q) {
                $f .= '<option value="' . $q->name . '">' . $q->name . '</option>';

            }

            $f .= '</select><div class="help-block"></div> </div>';
        } else {
            $f .= '<div class="form-group field-tblphone-ostan required">';
            $f .= '<label class="control-label" for="tblphone-ostan">شهر</label>';
            $f .= '<select id="tblphone-city" class="form-control" name="TblPhone[city]" aria-required="true">';
            $f .= ' <option value="">انتخاب کنید</option>';
            $f .= '</select><div class="help-block"></div> </div>';
        }
        return $f;
    }
}
