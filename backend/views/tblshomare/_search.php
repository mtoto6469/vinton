<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblShomareSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-shomare-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_shomare') ?>

    <?= $form->field($model, 'type_shomare') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'ostan') ?>

    <?php // echo $form->field($model, 'keshvar') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'sabtnam') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'enableview') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
