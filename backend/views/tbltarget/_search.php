<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTargetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-target-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'tagetforosh') ?>

    <?= $form->field($model, 'datefa') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'targetshakhs') ?>

    <?php // echo $form->field($model, 'sabtnam') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
