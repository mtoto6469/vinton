<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bag */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bag-view">

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
            'id_profile',
            'sabtnam',
            'shomaresabtnam',
            'name',
            'lastname',
            'namepedar',
            'codemeli',
            'shomareshenasname',
            'tarikhtavalod',
            'mahalesodur',
            'name_malek',
            'lastname_malek',
            'codemeli_malek',
            'cellphone',
            'phone',
            'adress',
            'lng',
            'lat',
            'codeposti',
            'email:email',
            'id_services',
            'id_added',
            'madrak_ax',
            'discription:ntext',
            'tarikh_kharid',
            'vazeiyate_sabtnam',
        ],
    ]) ?>

</div>
