<?php

namespace backend\controllers;

use backend\models\Profile;
use backend\models\TblPresence;
use backend\models\TblPresenceSearch;
use backend\models\TblProfile;
use common\components\jdf;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * PresenceController implements the CRUD actions for TblPresence model.
 */
class PresenceController extends Controller
{
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
                        'actions' => ['index','view','create','update','delete','selectuser','showful','shwolist'],
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
     * Lists all TblPresence models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPresenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPresence model.
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
     * Finds the TblPresence model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPresence the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPresence::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionShwolist()
    {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $model = new Profile();
        $drop = $model->find()->where(["enableview" => 1])->andWhere(['enableview'=>1])->all();

        foreach ($drop as $var) {
            $result[] = $var->id_user . "-" . $var->name . " " . $var->lastname . " کد پرسنلی : " . $var->shomarepersenel;
        }
        
        if (Yii::$app->request->post()) {

            if ($_POST['tblprofile-name'] == null) {
                $session['error'] .= "لطفا نام کاربر را مشخص کنید";
                return $this->render('shwolist', [
                    'model' => $model,
                    'result' => $result
                ]);
            }

            $id = explode("-", $_POST['tblprofile-name']);
            $idUser = $model->findOne(["id_user" => $id[0]]);
            $dateEnd = $_POST['TblPresence']['dateEnd'];
            $dateStart = $_POST['TblPresence']['dateStart'];
            $shoedateEnd = $dateEnd;
            $shoedateStart = $dateStart;
            $end = explode('/', $dateEnd);
            $Start = explode('/', $dateStart);
            $jdf = new jdf();
            $dateStart = $jdf->jalali_to_gregorian($Start[0], $Start[1], $Start[2]);
            $timeStart = mktime(0, 0, 0, $dateStart[1], $dateStart[2], $dateStart[0]);
            $dateEnd = $jdf->jalali_to_gregorian($end[0], $end[1], $end[2]);
            $timeEnd = mktime(0, 0, 0, $dateEnd[1], $dateEnd[2], $dateEnd[0]);
            $session['timeStart'] = $timeStart;
            $session['timeEnd'] = $timeEnd;
            $query = TblPresence::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 2000,
                ],
            ]);
            $query->andFilterWhere([
                'id_user' => $idUser->id_user,

            ]);

            $query->andFilterCompare('time', $timeStart, '>=')
                ->andFilterCompare('time', $timeEnd, '<=');

            return $this->render('showList', [
                'dataProvider' => $dataProvider,
                'timeStart' => $timeStart,
                'timeEnd' => $timeEnd,
                'idUser' => $idUser->id_user,
                "shoedateEnd" => $shoedateEnd,
                "shoedateStart" => $shoedateStart,

            ]);
        } else {
            return $this->render('shwolist', [
                'model' => $model,
                'result' => $result
            ]);
        }
    }



    public function actionShowful()
    {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }
        $model = new Profile();
        $modelP = new TblPresence();
        $drop = $model->find()->where(["enableview" => 1])->andWhere(['enableview'=>1])->all();
        foreach ($drop as $row){
            $pt= $modelP->find()->where(['id_user'=>$row->id_user])->all();
            $ptt= $modelP->find()->where(['id_user'=>$row->id_user])->count();
            if($pt!=null){
                $send['id_user']=$pt[$ptt-1]->id_user;
                $send['time']=$pt[$ptt-1]->time;
                $send['dateIr']=$pt[$ptt-1]->dateIr;
                $send['name']=$row->name;
                $send['lastName']=$row->lastname;
                $send['lat']=$pt[$ptt-1]->lat;
                $send['lng']=$pt[$ptt-1]->lng;
                $send['timeStamp']=$pt[$ptt-1]->timeStamp;
                if($pt[$ptt-1]->login){
                    $send['login'] = "حاضر";
                }else{
                    $send['login'] = "غیبت";
                }

                $sendFul[]= $send;
            }

        }
        return $this->render('showFul', [
            'model' => $sendFul,
        ]);
    }

    public function actionSelectuser()
    {
        $session = Yii::$app->session;
        if (!$session->isActive) {
            $session->open();
        }

        $model = new Profile();
        $drop = $model->find()->where(["enableview" => 1])->all();

        foreach ($drop as $var) {
            $result[] = $var->id_user . "-" . $var->name . " " . $var->lastname . " کد پرسنلی : " . $var->shomarepersenel;
        }


        if (Yii::$app->request->post()) {

            $id = explode("-", $_POST['tblprofile-name']);
 

            $idUser = $model->findOne(["id_user" => $id[0]]);


            $dateEnd = $_POST['TblPresence']['dateEnd'];
            $dateStart = $_POST['TblPresence']['dateStart'];
            $shoedateEnd = $dateEnd;
            $shoedateStart = $dateStart;
            $end = explode('/', $dateEnd);
            $Start = explode('/', $dateStart);
            $jdf = new jdf();
            $dateStart = $jdf->jalali_to_gregorian($Start[0], $Start[1], $Start[2]);
            $timeStart = mktime(0, 0, 0, $dateStart[1], $dateStart[2], $dateStart[0]);
            $dateEnd = $jdf->jalali_to_gregorian($end[0], $end[1], $end[2]);
            $timeEnd = mktime(0, 0, 0, $dateEnd[1], $dateEnd[2], $dateEnd[0]);
            $session['timeStart'] = $timeStart;
            $session['timeEnd'] = $timeEnd;
            $query = TblPresence::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 2000,
                ],
            ]);
            $query->andFilterWhere([
                'id_user' => $idUser->id_user,

            ]);

            $query->andFilterCompare('time', $timeStart, '>=')
                ->andFilterCompare('time', $timeEnd, '<=');
            return $this->render('show', [
                'dataProvider' => $dataProvider,
                'timeStart' => $timeStart,
                'timeEnd' => $timeEnd,
                'idUser' => $idUser->id_user,
                "shoedateEnd" => $shoedateEnd,
                "shoedateStart" => $shoedateStart,

            ]);
        } else {
            return $this->render('selectuser', [
                'model' => $model,
                'result' => $result
            ]);
        }

    }

    /**
     * Creates a new TblPresence model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPresence();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblPresence model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblPresence model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
