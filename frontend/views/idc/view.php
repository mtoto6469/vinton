<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Idc */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Idcs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id_user',
            'id_khadamat',
            'id_domain',
            'name_domain',
            'eshterak',
            'name',
            'lastname',
            'namepedar',
            'codemeli',
            'shomareshenasname',
            'tarikh_tavalod',
            'cellphone',
            'cellphone2',
            'lng',
            'lat',
            'adress',
            'codeposti',
            'email:email',
            'name_sherkat',
            'shenase_meli',
            'sabt_sherkat',
            'nemune_mohr',
            'madarek_hoviyati',
            'price',
            'date',
            'date_farsi',
            'type',
            'telegram',
            'ersal_barge_telegram',
            'ersal_payamak',
            'ersal_email:email',
            'datasanter',
        ],
    ]) ?>

</div>
