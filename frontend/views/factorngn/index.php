<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FactorNgnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Factor Ngns');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factor-ngn-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Factor Ngn'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'type',
            'eshterak',
            'name',
            //'lastname',
            //'codemeli',
            //'shenasname',
            //'tarikh_tavalod',
            //'mahale_sodur',
            //'cellphone',
            //'cellphone2',
            //'phone',
            //'lng',
            //'lat',
            //'adress',
            //'code_posti',
            //'email:email',
            //'shomare_asiyatek',
            //'id_tblshomare',
            //'shomare_darkhasti',
            //'id_services',
            //'id_added',
            //'discription:ntext',
            //'price',
            //'date',
            //'date_farsi',
            //'telegram',
            //'ax_shenasaee',
            //'ax_emza',
            //'ersal_barge_telegram',
            //'ersal_mablaq_payam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
