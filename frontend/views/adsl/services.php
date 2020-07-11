<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
 <?php $form = ActiveForm::begin(['action'=>'services', 'method' => 'post',]); ?>


$type?>" name="onvan" ></br>

<label><input name="services" value="اینترنت حجمی" type="radio"> internet hajmi</label>
<label><input name="services" value="اینترنت نامحدود" type="radio"> internet namahdud</label>
<label><input name="services" value="اینترنت  غیرحجمی حجمی" type="radio">internet qeyre hajmi</label>


<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'ارسال'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>