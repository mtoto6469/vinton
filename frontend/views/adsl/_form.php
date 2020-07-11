<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Adsl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adsl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>


    <?= $form->field($model, 'vazeyat_sabt')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli')->textInput() ?>

    <?= $form->field($model, 'shenasname')->textInput() ?>

    <?= $form->field($model, 'tarikh_tavalod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mahale_sodur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_malek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname_malek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli_malek')->textInput() ?>

    <?= $form->field($model, 'cellphone')->textInput() ?>

    <?= $form->field($model, 'cellphone2')->textInput() ?>

    <?= $form->field($model, 'telegram')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codeposti')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ax_shenasaee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ax_emza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ersal_barge_telegram')->textInput() ?>

    <?= $form->field($model, 'ersal_mablaq_payamak')->textInput() ?>

    <?= $form->field($model, 'id_services')->textInput() ?>

    <?= $form->field($model, '1d_added')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
