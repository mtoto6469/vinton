<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTarget */

$this->title = Yii::t('app', 'ویرایش: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Targets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tbl-target-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'reng'=>   $reng,
        'searchModel' =>$searchModel,
        'dataProvider'=>$dataProvider,
    ]) ?>

</div>
