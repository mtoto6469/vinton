<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Host */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

<div class="host-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-lg-6">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'faza')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'terafik')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-lg-6">

        <?= $form->field($model, 'systemamel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'controll_panel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'pahnayeband')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'price')->textInput(['maxlength' => true])->hint('لطفا عدد را به ریال وارد کنید.') ?>

    </div>

    <div style="margin-right: 2%">
    <?= $form->field($model, 'discription')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable')->radioList([1=>'بله', 0=> 'خیر']) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
</div>