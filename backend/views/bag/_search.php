<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BagSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bag-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_profile') ?>

    <?= $form->field($model, 'sabtnam') ?>

    <?= $form->field($model, 'shomaresabtnam') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'lastname') ?>

    <?php // echo $form->field($model, 'namepedar') ?>

    <?php // echo $form->field($model, 'codemeli') ?>

    <?php // echo $form->field($model, 'shomareshenasname') ?>

    <?php // echo $form->field($model, 'tarikhtavalod') ?>

    <?php // echo $form->field($model, 'mahalesodur') ?>

    <?php // echo $form->field($model, 'name_malek') ?>

    <?php // echo $form->field($model, 'lastname_malek') ?>

    <?php // echo $form->field($model, 'codemeli_malek') ?>

    <?php // echo $form->field($model, 'cellphone') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'codeposti') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'id_services') ?>

    <?php // echo $form->field($model, 'id_added') ?>

    <?php // echo $form->field($model, 'madrak_ax') ?>

    <?php // echo $form->field($model, 'discription') ?>

    <?php // echo $form->field($model, 'tarikh_kharid') ?>

    <?php // echo $form->field($model, 'vazeiyate_sabtnam') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
