<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Khadamat */

$this->title = Yii::t('app', 'ویرایش: {nameAttribute}', [
    'nameAttribute' => $model->type_bastar,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Khadamats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="khadamat-update">

    <h1 style="margin-bottom: 30px"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
     
    ]) ?>

</div>
