<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KhadamatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'خدمات جدید');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="khadamat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', ' افزودن خدمات جدید'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin:30px 0 15px;
         font-size:14px; font-weight:bold',]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type_bastar',
            'time',
            'mizan_darkhasti',
            'price',
            //'sabtnam',
            //'enable',
            //'enableview',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
