<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPresence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-presence-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'dateIr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'login')->textInput() ?>

    <?= $form->field($model, 'logout')->textInput() ?>

    <?= $form->field($model, 'dateEdit')->textInput() ?>

    <?= $form->field($model, 'enabel')->textInput() ?>

    <?= $form->field($model, 'enabel_view')->textInput() ?>

    <?= $form->field($model, 'sh1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sh2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sh3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sh4')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
