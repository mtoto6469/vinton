<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Bag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_profile')->textInput() ?>

    <?= $form->field($model, 'sabtnam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shomaresabtnam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namepedar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli')->textInput() ?>

    <?= $form->field($model, 'shomareshenasname')->textInput() ?>

    <?= $form->field($model, 'tarikhtavalod')->textInput() ?>

    <?= $form->field($model, 'mahalesodur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_malek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname_malek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli_malek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'codeposti')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_services')->textInput() ?>

    <?= $form->field($model, 'id_added')->textInput() ?>

    <?= $form->field($model, 'madrak_ax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'discription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tarikh_kharid')->textInput() ?>

    <?= $form->field($model, 'vazeiyate_sabtnam')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
