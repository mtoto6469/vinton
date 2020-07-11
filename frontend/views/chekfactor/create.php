<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Chekfactor */

$this->title = Yii::t('app', 'Create Chekfactor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chekfactors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chekfactor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
