<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="host-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'faza') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'terafik') ?>

    <?php // echo $form->field($model, 'systemamel') ?>

    <?php // echo $form->field($model, 'controll_panel') ?>

    <?php // echo $form->field($model, 'pahnayeband') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'discription') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'enableview') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
