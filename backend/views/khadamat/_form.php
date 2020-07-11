<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Khadamat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
<div class="khadamat-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="form-group field-khadamat-sabtnam required">
        <label class="control-label">منوی ثبت نام</label>
        <input name="Khadamat[sabtnam]" value="" type="hidden">
        <div id="khadamat-sabtnam" aria-required="true">
            <label><input name="Khadamat[sabtnam]" value="IDC" type="radio"> IDC</label>
            <label><input name="Khadamat[sabtnam]" value="VPN"  type="radio"> VPN</label>
            <label><input name="Khadamat[sabtnam]" value="x"  type="radio">پهنای  باند اختصاصی</label>


        </div>
    </div>

    <div class="col-lg-6">

    <?= $form->field($model, 'type_bastar')->textInput(['maxlength' => true])->label('نوع بستر') ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true])->label('مدت')  ?>

        </div>
    <div class="col-lg-6">

        <?= $form->field($model, 'mizan_darkhasti')->textInput(['maxlength' => true])->label('میزان درخواستی')  ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label('قیمت')  ?>
        </div>




    <?= $form->field($model, 'enable')->radioList(
        ['1'=> 'قابل نمایش', '0' => 'غیرقابل نمایش' ],
        ['style'=> 'padding:10px']
         )->label('قابل نمایش')  ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>