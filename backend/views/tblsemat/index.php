<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblSematSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'سمت کارمندان');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-semat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', ' سمت کارمندان'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin:30px 0 15px;
         font-size:14px; font-weight:bold',]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'semat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
