<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AdslSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adsl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'eshterak') ?>

    <?= $form->field($model, 'vazeyat_sabt') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'codemeli') ?>

    <?php // echo $form->field($model, 'shenasname') ?>

    <?php // echo $form->field($model, 'tarikh_tavalod') ?>

    <?php // echo $form->field($model, 'mahale_sodur') ?>

    <?php // echo $form->field($model, 'name_malek') ?>

    <?php // echo $form->field($model, 'lastname_malek') ?>

    <?php // echo $form->field($model, 'codemeli_malek') ?>

    <?php // echo $form->field($model, 'cellphone') ?>

    <?php // echo $form->field($model, 'cellphone2') ?>

    <?php // echo $form->field($model, 'telegram') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'codeposti') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'ax_shenasaee') ?>

    <?php // echo $form->field($model, 'ax_emza') ?>

    <?php // echo $form->field($model, 'discription') ?>

    <?php // echo $form->field($model, 'ersal_barge_telegram') ?>

    <?php // echo $form->field($model, 'ersal_mablaq_payamak') ?>

    <?php // echo $form->field($model, 'id_services') ?>

    <?php // echo $form->field($model, '1d_added') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
