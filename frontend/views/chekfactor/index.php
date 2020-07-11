<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ChekfactorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Chekfactors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chekfactor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Chekfactor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_factor',
            'vaziyat',
            'end_taeed',
            //'end_price',
            //'dalil_ekhtelaf_qeymat',
            //'taliq',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
