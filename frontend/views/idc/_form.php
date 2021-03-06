<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Idc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="idc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_khadamat')->textInput() ?>

    <?= $form->field($model, 'eshterak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namepedar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli')->textInput() ?>

    <?= $form->field($model, 'shomareshenasname')->textInput() ?>

    <?= $form->field($model, 'tarikh_tavalod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput() ?>

    <?= $form->field($model, 'cellphone2')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codeposti')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_sherkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shenase_meli')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sabt_sherkat')->textInput() ?>

    <?= $form->field($model, 'nemune_mohr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'madarek_hoviyati')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date_farsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'telegram')->textInput() ?>

    <?= $form->field($model, 'ersal_barge_telegram')->textInput() ?>

    <?= $form->field($model, 'ersal_payamak')->textInput() ?>

    <?= $form->field($model, 'ersal_email')->textInput() ?>

    <?= $form->field($model, 'datasanter')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
