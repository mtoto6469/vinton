<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblAddedInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$sesssion = Yii::$app->session;
if (!$sesssion->isActive) {
    $sesssion->open();
}
if (isset($_SESSION['error1'])){
    if( $_SESSION['error1']!= null){
        echo'<div class="alert alert-danger">'. $_SESSION['error1'].'</div>';

    }$_SESSION['error1']= null;
}


$this->title = Yii::t('app', 'اطلاعات افزوده');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-added-information-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', ' ایجاد اطلاعات افزوده جدید'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin:30px 0 15px;
         font-size:14px; font-weight:bold',])?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'service',
            'sabtnam',
            'price',
            //'enable',
            //'enableview',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
