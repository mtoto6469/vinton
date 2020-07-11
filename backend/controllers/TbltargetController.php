<?php

namespace backend\controllers;

use backend\models\City;
use backend\models\ProfileSearch;
use backend\models\Province;
use backend\models\Sabtnam;
use backend\models\TblPhone;
use backend\models\TblRange;
use common\components\jdf;
use Yii;
use backend\models\TblTarget;
use backend\models\TblTargetSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TbltargetController implements the CRUD actions for TblTarget model.
 */
class TbltargetController extends Controller
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
     * Lists all TblTarget models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblTargetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblTarget model.
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
     * Creates a new TblTarget model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
        
    {
        $this->layout = 'main2.php';

        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $ostan = ArrayHelper::map(Province::find()->all(), 'name', 'name');
        $reng = ArrayHelper::map(TblRange::find()->all(), 'name', 'name');
        $model = new TblTarget();


        if ($model->load(Yii::$app->request->post()) ) {


            $date_ir = new jdf();
            $time = explode("/", $model->datefa);
            $d = $time[0];
            $m = $time[1];
            $y = $time[2];
            $time2 = $date_ir->jalaliToGregorian($y, $m, $d);

            $Y = $time2[0] . '-';
            $ML =strlen( $time2[1]) ;
            $DL= strlen( $time2[2]);
            if(  $ML == 1){
                $M = 0 . $time2[1] . '-';

            }else{
                $M =$time2[1] . '-';
            }
            if($DL == 1 ){
                $D = 0 . $time2[2];
            }  else{
                $D = $time2[2];
            }



            $g = $Y . $M . $D;

            $model->date = date($g);

            $date_ir1 = new jdf();
            $time1 = explode("/", $model->ta_date_farsi);
            $d1 = $time1[0];
            $m1 = $time1[1];
            $y1 = $time1[2];
            $time21 = $date_ir1->jalaliToGregorian($y1, $m1, $d1);

            $Y1 = $time21[0] . '-';
            $ML1 =strlen( $time21[1]) ;
            $DL1= strlen( $time21[2]);
            if(  $ML1 == 1){
                $M1 = 0 . $time21[1] . '-';

            }else{
                $M1 =$time21[1] . '-';
            }
            if($DL1 == 1 ){
                $D1 = 0 . $time21[2];
            }  else{
                $D1 = $time21[2];
            }

            $g1 = $Y1 . $M1 . $D1;

            $model->ta_date = date($g1);




           if($model->type_karshenas == 0){

//
//               if(isset($_POST['markaz1']) && $_POST['markaz1']!=null){
//
//                   $expload1=explode('_',$_POST['markaz1']);
//                   $count1=count( $expload1);
//                   for($i=0;$i<$count1-1;$i++){
//
//                       $expload2=explode(',',  $expload1[$i]);
//
//                       $model->name_markaz=$expload2[0];
//                       $model->ostan=$expload2[1];
//                       $model->shahr=$expload2[2];
//
//                   }
//
//
//               }

               if(isset($_POST['state']) && $_POST['state']!=null
               && isset($_POST['city']) && $_POST['city'] !=null

               ){
                   $model->ostan=$_POST['state'];
                   $model->shahr=$_POST['city'];
                   $model->name_markaz=$_POST['markaz_name'];

               }
               else
               {
                   $_SESSION['error']='لطفا شهر و استان را مشخص کنید';
                   return $this->render('create', [
                       'model' => $model,
//            'ostan' =>$ostan,
                       'reng'=>   $reng,
                       'searchModel' =>$searchModel,
                       'dataProvider'=>$dataProvider,

                   ]);
               }

           }
      
           if($model->save()){
               return $this->redirect(['view', 'id' => $model->id]);  
           }
            else{
                return $this->render('create', [
                    'model' => $model,
//            'ostan' =>$ostan,
                    'reng'=>   $reng,
                    'searchModel' =>$searchModel,
                    'dataProvider'=>$dataProvider,

                ]);  
            }

            
        }

        return $this->render('create', [
            'model' => $model,
//            'ostan' =>$ostan,
            'reng'=>   $reng,
            'searchModel' =>$searchModel,
            'dataProvider'=>$dataProvider,
        
        ]);
    }

    /**
     * Updates an existing TblTarget model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'main2.php';
        $model = $this->findModel($id);

        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $reng = ArrayHelper::map(TblRange::find()->all(), 'name', 'name');

        if ($model->load(Yii::$app->request->post()) ) {



            $date_ir = new jdf();
            $time = explode("/", $model->datefa);
            $d = $time[0];
            $m = $time[1];
            $y = $time[2];
            $time2 = $date_ir->jalaliToGregorian($y, $m, $d);

            $Y = $time2[0] . '-';
            $ML =strlen( $time2[1]) ;
            $DL= strlen( $time2[2]);
            if(  $ML == 1){
                $M = 0 . $time2[1] . '-';

            }else{
                $M =$time2[1] . '-';
            }
            if($DL == 1 ){
                $D = 0 . $time2[2];
            }  else{
                $D = $time2[2];
            }



            $g = $Y . $M . $D;

            $model->date = date($g);

            $date_ir1 = new jdf();
            $time1 = explode("/", $model->ta_date_farsi);
            $d1 = $time1[0];
            $m1 = $time1[1];
            $y1 = $time1[2];
            $time21 = $date_ir1->jalaliToGregorian($y1, $m1, $d1);

            $Y1 = $time21[0] . '-';
            $ML1 =strlen( $time21[1]) ;
            $DL1= strlen( $time21[2]);
            if(  $ML1 == 1){
                $M1 = 0 . $time21[1] . '-';

            }else{
                $M1 =$time21[1] . '-';
            }
            if($DL1 == 1 ){
                $D1 = 0 . $time21[2];
            }  else{
                $D1 = $time21[2];
            }

            $g1 = $Y1 . $M1 . $D1;

            $model->ta_date = date($g1);




            if($model->type_karshenas == 0){

//
//               if(isset($_POST['markaz1']) && $_POST['markaz1']!=null){
//
//                   $expload1=explode('_',$_POST['markaz1']);
//                   $count1=count( $expload1);
//                   for($i=0;$i<$count1-1;$i++){
//
//                       $expload2=explode(',',  $expload1[$i]);
//
//                       $model->name_markaz=$expload2[0];
//                       $model->ostan=$expload2[1];
//                       $model->shahr=$expload2[2];
//
//                   }
//
//
//               }

                if(isset($_POST['state']) && $_POST['state']!=null
                    && isset($_POST['city']) && $_POST['city'] !=null

                ){
                    $model->ostan=$_POST['state'];
                    $model->shahr=$_POST['city'];
                    $model->name_markaz=$_POST['markaz_name'];

                }
                else
                {
                    $_SESSION['error']='لطفا شهر و استان را مشخص کنید';
                    return $this->render('create', [
                        'model' => $model,
//            'ostan' =>$ostan,
                        'reng'=>   $reng,
                        'searchModel' =>$searchModel,
                        'dataProvider'=>$dataProvider,

                    ]);
                }

            }

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                return $this->render('create', [
                    'model' => $model,
//            'ostan' =>$ostan,
                    'reng'=>   $reng,
                    'searchModel' =>$searchModel,
                    'dataProvider'=>$dataProvider,

                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'reng'=>   $reng,
            'searchModel' =>$searchModel,
            'dataProvider'=>$dataProvider,
        ]);
    }

    /**
     * Deletes an existing TblTarget model.
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


    public function actionCity()
    {
        $name = $_GET['name'];
        $id = Province::findOne(['name' => $name]);
        $query = City::find()->where(['province_id' => $id->id])->all();
        $f = '';
        if ($query != null) {
            $f .= '<div class="form-group field-tblphone-ostan required">';
            $f .= '<label class="control-label" for="tblphone-ostan">شهر</label>';
            $f .= '<select id="tblphone-city" class="form-control" name="city" aria-required="true" onchange="getMarkaz(this.value)">';
            foreach ($query as $q) {
                $f .= '<option value="' . $q->name . '">' . $q->name . '</option>';

            }

            $f .= '</select><div class="help-block"></div> </div>';
        } else {
            $f .= '<div class="form-group field-tblphone-ostan required">';
            $f .= '<label class="control-label" for="tblphone-ostan">شهر</label>';
            $f .= '<select id="tblphone-city" class="form-control" name="city" aria-required="true" onchange="getMarkaz(this.value)">';
            $f .= ' <option value="">انتخاب کنید</option>';
            $f .= '</select><div class="help-block"></div> </div>';
        }
        return $f;
    }

    public function actionMarkaz()
    {
        $name = $_GET['name'];
//        $id = City::find()->where(['name' => $name])->all();
        $query1 = TblPhone::find()->where(['shahr' => $name])->andWhere(['enable'=>'1'])->andWhere(['enableview'=>'1'])->all();
        $f = '';
        if($query1 !=null){




                    $f .= '<div class="form-group field-tblphone-ostan required">';
                    $f .= '<label class="control-label" for="tblphone-ostan">مرکز</label>';
                    $f .= '<select class="form-control" name="markaz_name" aria-required="true" onchange="getValue1(this.value)">';
            foreach ($query1 as $query){
                        $f .= '<option value="' . $query->name_markaz . '">' . $query->name_markaz . '</option>';

            }

                    $f .= '</select><div class="help-block"></div> </div>';

                return $f;

        }
    else {
$f .= '<div class="form-group field-tblphone-ostan required">';
$f .= '<label class="control-label" for="tblphone-ostan">مرکز</label>';
$f .= '<select id="tblphone-city" class="form-control" name="markaz_name" aria-required="true" onchange="getValue1(this.value)">';
$f .= ' <option value="">انتخاب کنید</option>';
$f .= '</select><div class="help-block"></div> </div>';
}
return $f;

    }

    protected function findModel($id)
    {
        if (($model = TblTarget::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
