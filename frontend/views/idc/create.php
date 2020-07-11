<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Idc */

$this->title = Yii::t('app', 'Create Idc');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Idcs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
