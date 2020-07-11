<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'lastname') ?>

    <?= $form->field($model, 'semat') ?>

    <?= $form->field($model, 'namepedar') ?>

    <?php // echo $form->field($model, 'codemeli') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <?php // echo $form->field($model, 'cellphone') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'id_phone') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'saatkari_az') ?>

    <?php // echo $form->field($model, 'saatkari_ta') ?>

    <?php // echo $form->field($model, 'shomarepersenel') ?>

    <?php // echo $form->field($model, 'eshterak') ?>

    <?php // echo $form->field($model, 'nahveashnaee') ?>

    <?php // echo $form->field($model, 'ax_perseneli') ?>

    <?php // echo $form->field($model, 'ax_kartmeli') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'tarikhsabt_karmand') ?>

    <?php // echo $form->field($model, 'tarikhsabt_karmand2') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
