<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hozefaaliyat */

$this->title = Yii::t('app', 'ایجاد حوزه فعالیت');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hozefaaliyats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hozefaaliyat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
