<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPresence */

$this->title = Yii::t('app', 'گزارش جدید');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Presences'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-presence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
