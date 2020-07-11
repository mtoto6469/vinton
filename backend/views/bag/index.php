<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BagSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bag-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bag'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_profile',
            'sabtnam',
            'shomaresabtnam',
            'name',
            //'lastname',
            //'namepedar',
            //'codemeli',
            //'shomareshenasname',
            //'tarikhtavalod',
            //'mahalesodur',
            //'name_malek',
            //'lastname_malek',
            //'codemeli_malek',
            //'cellphone',
            //'phone',
            //'adress',
            //'lng',
            //'lat',
            //'codeposti',
            //'email:email',
            //'id_services',
            //'id_added',
            //'madrak_ax',
            //'discription:ntext',
            //'tarikh_kharid',
            //'vazeiyate_sabtnam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
