<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Hozefaaliyat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hozefaaliyat-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discription')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable')->radioList([
        '1'=>'بله',
        '0'=>'خیر',
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
