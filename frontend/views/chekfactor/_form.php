<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Chekfactor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chekfactor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_factor')->textInput() ?>

    <?= $form->field($model, 'vaziyat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'end_taeed')->textInput() ?>

    <?= $form->field($model, 'end_price')->textInput() ?>

    <?= $form->field($model, 'dalil_ekhtelaf_qeymat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taliq')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
