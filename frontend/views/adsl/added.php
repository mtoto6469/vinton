<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>








<?php $form = ActiveForm::begin(['action'=>'added', 'method' => 'post',]); ?>

onvan: <input name="onvan"></br>

<label><input name="added" value="نصب" type="radio">نصب</label>
<label><input name="added" value="مودم" type="radio">مودم</label>
<label><input name="added" value="سرویس ip" type="radio">سرویس ip</label>


<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'ارسال'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
