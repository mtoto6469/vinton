<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IdcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Idcs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idc-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Idc'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_khadamat',
            'eshterak',
            'name',
            //'lastname',
            //'namepedar',
            //'codemeli',
            //'shomareshenasname',
            //'tarikh_tavalod',
            //'cellphone',
            //'cellphone2',
            //'lng',
            //'lat',
            //'adress',
            //'codeposti',
            //'email:email',
            //'name_sherkat',
            //'shenase_meli',
            //'sabt_sherkat',
            //'nemune_mohr',
            //'madarek_hoviyati',
            //'price',
            //'date',
            //'date_farsi',
            //'type',
            //'telegram',
            //'ersal_barge_telegram',
            //'ersal_payamak',
            //'ersal_email:email',
            //'datasanter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
