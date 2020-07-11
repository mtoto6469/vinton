<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPresenceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-presence-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'dateIr') ?>

    <?= $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'login') ?>

    <?php // echo $form->field($model, 'logout') ?>

    <?php // echo $form->field($model, 'dateEdit') ?>

    <?php // echo $form->field($model, 'enabel') ?>

    <?php // echo $form->field($model, 'enabel_view') ?>

    <?php // echo $form->field($model, 'sh1') ?>

    <?php // echo $form->field($model, 'sh2') ?>

    <?php // echo $form->field($model, 'sh3') ?>

    <?php // echo $form->field($model, 'sh4') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
