<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AdslSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Adsls');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Adsl'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'eshterak',
            'vazeyat_sabt',
            'name',
            //'lastname',
            //'codemeli',
            //'shenasname',
            //'tarikh_tavalod',
            //'mahale_sodur',
            //'name_malek',
            //'lastname_malek',
            //'codemeli_malek',
            //'cellphone',
            //'cellphone2',
            //'telegram',
            //'phone',
            //'adress',
            //'codeposti',
            //'email:email',
            //'ax_shenasaee',
            //'ax_emza',
            //'discription',
            //'ersal_barge_telegram',
            //'ersal_mablaq_payamak',
            //'id_services',
            //'1d_added',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
