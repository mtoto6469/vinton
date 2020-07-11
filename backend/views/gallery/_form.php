<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelupload, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'alert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasvand')->dropDownList([ '0'=> 'لوگو', '1'=> 'فوتر', ], ['prompt' => 'انتخاب کنید']) ?>
    
    <?= $form->field($model, 'pasvand')->radioList([ '1'=> 'قابل نمایش','0'=> 'غیر قابل نمایش', ], ['prompt' => 'انتخاب کنید']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
