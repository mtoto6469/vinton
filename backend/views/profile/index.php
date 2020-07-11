<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ثبت کاربر');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', ' افزودن کاربر جدید'), ['site/signup'], ['class' => 'btn btn-success', 'style' => 'margin:30px 0 15px;
         font-size:14px; font-weight:bold',]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'lastname',

            [
                'attribute' => 'semat',

                'value'=> function ($model) {
                    if($model->semat == '0')
                    {

                        return 'کارشناس فروش';

                    }
                    elseif ($model->semat== '1') {
                        return 'کارشناس نصب';
                    }
                    elseif ($model->semat== '2') {
                        return 'کارشناس نصب درصدی';
                    }
                    elseif ($model->semat== '3') {
                        return 'کارشناس ثبت نام';
                    }
                    elseif ($model->semat== '4') {
                        return 'عاملین فروش';
                    }

                },
            ],
            'namepedar',
            //'codemeli',
            //'id_user',
            //'cellphone',
            //'phone',
            //'id_phone',
            'shahr',
            'ostan',
            //'saatkari_az',
            //'saatkari_ta',
            //'shomarepersenel',
            //'eshterak',
            //'nahveashnaee',
            //'ax_perseneli',
            //'ax_kartmeli',
            //'adress',
            //'tarikhsabt_karmand',
            //'tarikhsabt_karmand2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
