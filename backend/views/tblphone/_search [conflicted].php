<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPhoneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-phone-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pishshomare') ?>

    <?= $form->field($model, 'reng_az') ?>

    <?= $form->field($model, 'reng_ta') ?>

    <?= $form->field($model, 'ostan') ?>

    <?php // echo $form->field($model, 'shahr') ?>

    <?php // echo $form->field($model, 'name_markaz') ?>

    <?php // echo $form->field($model, 'vaziyat') ?>

    <?php // echo $form->field($model, 'vaziyat_forosh') ?>

    <?php // echo $form->field($model, 'sabtenam') ?>

    <?php // echo $form->field($model, 'enable') ?>

    <?php // echo $form->field($model, 'enableview') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
