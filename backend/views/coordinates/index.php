<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblCoordinatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Coordinates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-coordinates-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Coordinates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_range',
            'lat',
            'lng',
            'enabel',
            // 'enabel_view',
            // 'sh1',
            // 'sh2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
