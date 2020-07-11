<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPhone */

$this->title = $model->name_markaz;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Phones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-phone-view">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'ویرایش'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'حذف'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pishshomare',
            'reng_az',
            'reng_ta',
            'ostan',
            'shahr',
            'name_markaz',
            [
                'attribute' => 'vaziyat',

                'value'=> function ($model) {
                    if($model->vaziyat== '0')
                    {

                        return 'غیرقابل پوشش';

                    }
                    elseif ($model->vaziyat== '1') {
                        return 'قابل پوشش';
                    }
                    elseif ($model->vaziyat== '2') {
                        return 'غیرمحدود';
                    }
                    elseif ($model->vaziyat== '3') {
                        return 'محدود';
                    }
                },
            ],
            [
                'attribute' =>  'vaziyat_forosh',

                'value'=> function ($model) {
                    if($model->vaziyat_forosh== '0')
                    {

                        return 'غیرقابل فروش';

                    }
                    elseif ($model->vaziyat_forosh== '1') {
                        return 'قابل فروش';
                    }

                },
            ],

            'sabtenam',
            [
                'attribute' => 'enable',

                'value'=> function ($model) {
                    if($model->enable == 1)
                    {

                        return 'بله';

                    }
                    else {
                        return 'نه';
                    }
                },
            ],

//            [
//                'attribute' => 'enableview',
//
//                'value' => function ($model){
//
//
//                    if($model->enable == 1)
//                    {
//
//                        return 'بله';
//
//                    }
//                    else {
//                        return 'نه';
//                    }
//
//                },
//
//            ],
        ],
    ]) ?>

</div>
