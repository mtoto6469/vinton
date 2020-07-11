<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ChekfactorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chekfactor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_factor') ?>

    <?= $form->field($model, 'vaziyat') ?>

    <?= $form->field($model, 'end_taeed') ?>

    <?php // echo $form->field($model, 'end_price') ?>

    <?php // echo $form->field($model, 'dalil_ekhtelaf_qeymat') ?>

    <?php // echo $form->field($model, 'taliq') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
