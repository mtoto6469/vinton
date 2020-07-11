<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblServices1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'اطلاعات سرویس');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-services1-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', ' ایجاد اطلاعات سرویس جدید'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin:30px 0 15px;
         font-size:14px; font-weight:bold',]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            'speed',
//            'hajm',
//            'time',
            //'price',
            //'enable',
            //'enableview',
            'sabtnam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
