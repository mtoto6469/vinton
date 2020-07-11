<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\FactorNgn */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Factor Ngns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factor-ngn-view">

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
            'type',
         'eshterak',
         'name_domain',
            'be_shahr',
          
            'name',
            'lastname',
            'codemeli',
            'shenasname',
            'tarikh_tavalod',
            'mahale_sodur',
            'cellphone',
            'cellphone2',
            'phone',
            'lng',
            'lat',
            'adress',
            'code_posti',
            'email:email',
            'shomare_asiyatek',
            'id_tblshomare',
            'shomare_darkhasti',
            'id_services',
            'id_added',
            'discription:ntext',
            'price',
            'date',
            'date_farsi',
            'telegram',
            'ax_shenasaee',
            'ax_emza',
            'ersal_barge_telegram',
            'ersal_mablaq_payam',
        ],
    ]) ?>

</div>
