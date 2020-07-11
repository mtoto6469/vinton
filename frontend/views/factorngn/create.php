<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FactorNgn */

$this->title = Yii::t('app', 'Create Factor Ngn');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Factor Ngns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factor-ngn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
