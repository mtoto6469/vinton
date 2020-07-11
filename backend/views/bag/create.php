<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bag */

$this->title = Yii::t('app', 'Create Bag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
