<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Khadamat */

$this->title = $model->type_bastar;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Khadamats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="khadamat-view">

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
            'type_bastar',
            'time',
            'mizan_darkhasti',
            'price',


            [
                'attribute' =>  'sabtnam',

                'value'=> function ($model) {
                    if($model->sabtnam == 'x')
                    {

                        return 'پهنای باند اختصاصی';

                    }
                    elseif($model->sabtnam == 'VPN') {
                        return 'VPN';
                    }else{
                        return 'IDC';
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
           
        ],
    ]) ?>

</div>
