<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Adsl */

$this->title = Yii::t('app', 'Create Adsl');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Adsls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adsl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
