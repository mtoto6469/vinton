<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IdcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="idc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_khadamat') ?>

    <?= $form->field($model, 'eshterak') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'namepedar') ?>

    <?php // echo $form->field($model, 'codemeli') ?>

    <?php // echo $form->field($model, 'shomareshenasname') ?>

    <?php // echo $form->field($model, 'tarikh_tavalod') ?>

    <?php // echo $form->field($model, 'cellphone') ?>

    <?php // echo $form->field($model, 'cellphone2') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'codeposti') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'name_sherkat') ?>

    <?php // echo $form->field($model, 'shenase_meli') ?>

    <?php // echo $form->field($model, 'sabt_sherkat') ?>

    <?php // echo $form->field($model, 'nemune_mohr') ?>

    <?php // echo $form->field($model, 'madarek_hoviyati') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'date_farsi') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'telegram') ?>

    <?php // echo $form->field($model, 'ersal_barge_telegram') ?>

    <?php // echo $form->field($model, 'ersal_payamak') ?>

    <?php // echo $form->field($model, 'ersal_email') ?>

    <?php // echo $form->field($model, 'datasanter') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
