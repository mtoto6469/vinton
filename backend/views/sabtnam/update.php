<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sabtnam */

$this->title = Yii::t('app', 'ویرایش : {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sabtnams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sabtnam-update">

    <h1  style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
