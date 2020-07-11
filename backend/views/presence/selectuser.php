<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use infinitydesign\jalaliDatePicker\jalaliDatePicker;



/* @var $this yii\web\View */
/* @var $model backend\models\TblPresence */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-presence-form">

    <?php $form = ActiveForm::begin(); ?>

  <?php
  $gen = new \common\components\General();
  echo $gen->alret();
  echo "نام یا فامیلی یا کد پرسنلی را وارد کنید";
  echo "<br />";
 echo yii\jui\AutoComplete::widget([
      

      'name' => 'tblprofile-name',
      'options' => [
          'class' => 'form-control'
      ],
      'clientOptions' => [
          'source' => $result,
      ],
  ]);
    ?>


    <div class="col-lg-6">
        <div class="form-group field-tbltarget-datefa required ">
            <label class="control-label" for="tbltarget-datefa">    تاریخ این ماه </label>
            <input id="datepicker8" class="form-control" name="TblPresence[dateStart]"
                   maxlength="300" aria-required="true" aria-invalid="true" type="text" placeholder = '1396/05/05'>


        </div>
    </div>
    <div class="col-lg-6">

        <div class="form-group field-tbltarget-datefa required ">
            <label class="control-label" for="tbltarget-datefa"> تا  تاریخ </label>
            <input id="datepicker7" class="form-control" name="TblPresence[dateEnd]"
                   maxlength="300" aria-required="true" aria-invalid="true" type="text" placeholder = '1396/05/05'>

        </div>
    </div>

<br />
    <br />
    <br />




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'نمایش کارکرد نیرو') : Yii::t('app', 'نمایش کارکرد نیرو'), ['class' => $model->isNewRecord ? 'form-control btn btn-success' : 'form-control btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
