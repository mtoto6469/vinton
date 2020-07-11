<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KhadamatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="khadamat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_bastar') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'mizan_darkhasti') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'sabtnam') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'enableview') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
