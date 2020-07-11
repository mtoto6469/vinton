<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblServices1 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Services1s'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-services1-view">

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
            'name',
            'speed',
            'hajm',
            'time',
            'price',


            [
                'attribute' =>   'sabtnam',

                'value'=> function ($model) {
                    if($model->sabtnam == 'y')
                    {

                        return 'فروش تجاری';

                    }
                    elseif($model->sabtnam == 'x') {
                        return 'پهنای باند';

                    }elseif ($model->sabtnam == 'g'){
                        return 'عاملیت فروش';
                    }else{
                        return $model->sabtnam;
                    }
                },
            ],
           
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
            [
                'attribute' => 'type',

                'value'=> function ($model) {
                    if($model->sabtnam == 'NGN'|| $model->sabtnam == 'y')
                    {

                        return $model->type;

                    }
                    elseif($model->sabtnam == 'IPTV') {
                        return $model->type;
                    }else{
                        return '__';
                    }
                },
            ],
        ],
    ]) ?>

</div>
