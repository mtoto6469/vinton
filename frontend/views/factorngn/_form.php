<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FactorNgn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factor-ngn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eshterak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli')->textInput() ?>

    <?= $form->field($model, 'shenasname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarikh_tavalod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mahale_sodur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput() ?>

    <?= $form->field($model, 'cellphone2')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code_posti')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shomare_asiyatek')->textInput() ?>

    <?= $form->field($model, 'id_tblshomare')->textInput() ?>

    <?= $form->field($model, 'shomare_darkhasti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_services')->textInput() ?>

    <?= $form->field($model, 'id_added')->textInput() ?>

    <?= $form->field($model, 'discription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date_farsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telegram')->textInput() ?>

    <?= $form->field($model, 'ax_shenasaee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ax_emza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ersal_barge_telegram')->textInput() ?>

    <?= $form->field($model, 'ersal_mablaq_payam')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
