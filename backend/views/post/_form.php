<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->radioList([
        '1' => 'آخرین اخبار',
        '2' => 'آخرین سرویس ها',
        '3' => 'پیام های روز',

    ]) ?>     

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($modelupload, 'imageFile')->fileInput(['maxlength' => true])->label('آپلود عکس') ?>

    <?= $form->field($model, 'alert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true])->hint('برای جدا کردن کلمات از - استفاده کنید') ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true])->hint('برای جدا کردن کلمات از کاما انگلیسی استفاده کنید') ?>

    <?= $form->field($model, 'discription')->textarea(['maxlength' => true])->hint(' توضیحات بیش از 200 کاراکتر نباشد ') ?>


    <?= $form->field($model, 'enable')->radioList([
        0=>'کارشناس فروش',
        1=>'کارشناس نصب',
        2=>'کارشناس نصب',
        3=>'کارشناس ثبت نام',
        4=>'عاملین فروش',
        5=>'همه',
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
