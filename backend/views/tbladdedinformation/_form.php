<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblAddedInformation */
/* @var $form yii\widgets\ActiveForm */




$sesssion = Yii::$app->session;
if (!$sesssion->isActive) {
    $sesssion->open();
}
if (isset($_SESSION['error'])){
    if( $_SESSION['error']!= null){
        echo'<div class="alert alert-danger">'. $_SESSION['error'].'</div>';

    }$_SESSION['error']= null;
}
?>

<div class="tbl-added-information-form">

    <?php $form = ActiveForm::begin(); ?>



    <div class="form-group field-tbladdedinformation-sabtnam required">
        <label class="control-label">منوی ثبت نام</label>
        <input name="TblAddedInformation[sabtnam]" value="" type="hidden">
        <div id="tbladdedinformation-sabtnam" aria-required="true">
            <label><input name="TblAddedInformation[sabtnam]" value="ADSL" type="radio" onclick="getFunction2('1')"> ADSL</label>
            <label><input name="TblAddedInformation[sabtnam]" value="OWA"  type="radio" onclick="getFunction2('2')"> OWA</label>
            <label><input name="TblAddedInformation[sabtnam]" value="VDSL"  type="radio" onclick="getFunction2('1')"> VDSL</label>
            <label><input name="TblAddedInformation[sabtnam]" value="TD-LTE"  type="radio" onclick="getFunction2('1')"> TD-LTE</label>
            <label><input name="TblAddedInformation[sabtnam]" value="NGN"  type="radio" onclick="getFunction2('3')"> NGN</label>
            <label><input name="TblAddedInformation[sabtnam]" value="MVNO"  type="radio" onclick="getFunction2('4')"> MVNO</label>
            <label><input name="TblAddedInformation[sabtnam]" value="IPTV"  type="radio" onclick="getFunction2('5')"> IPTV</label>

        </div>
</div>
    </div>

        <div class="help-block"></div>
    </div>

<div id="name_adsl" style="display: none">

    <div class="form-group field-tbladdedinformation-name required has-success">
        <label class="control-label" for="tbladdedinformation-name">نام خدمات</label>
        <select selected="" id="tbladdedinformation-name" class="form-control" name="1d" aria-required="true" aria-invalid="false" onclick="selna(this.value)">
            <option value="">انتخاب کنید</option>
            <option value="مودم" onclick="getFunction1('1')" >مودم</option>
            <option value="نصب"  onclick="getFunction1('2')">نصب</option>
            <option value="سرویس ip"  onclick="getFunction1('3')" >سرویس ip</option>
        </select>

        <div class="help-block"></div>
    </div>

    </div>

<input value="" id="ne" name="TblAddedInformation[name]" style="visibility: hidden">


    <div id="name_owa" style="display: none">

        <div class="form-group field-tbladdedinformation-name required has-success">
            <label class="control-label" for="tbladdedinformation-name">نام خدمات</label>
            <select selected="" id="tbladdedinformation-name" class="form-control" name="1d" aria-required="true" aria-invalid="false" onclick="selna(this.value)">
                <option value="">انتخاب کنید</option>
                <option value="آی پی" >آی پی</option>
                <option value="نصب" >نصب</option>
                <option value="تجهیزات" >تجهیزات</option>
            </select>

            <div class="help-block"></div>
        </div>

    </div>




<div id="name_ngn" style="display: none">

    <div class="form-group field-tbladdedinformation-name required has-success">
        <label class="control-label" for="tbladdedinformation-name">نام خدمات</label>
        <select selected="" id="tbladdedinformation-name" class="form-control" name="1d" aria-required="true" aria-invalid="false" onclick="selna(this.value)">
            <option value="">انتخاب کنید</option>
            <option value="نصب" >نصب</option>
            <option value="SIP-PHONE" >SIP PHONE</option>
            <option value="SOFT-PHONE" >SOFT PHONE</option>
        </select>

        <div class="help-block"></div>
    </div>

</div>

<div id="name_mvno" style="display: none">

    <div class="form-group field-tbladdedinformation-name required has-success">
        <label class="control-label" for="tbladdedinformation-name">نام خدمات</label>
        <select selected="" id="tbladdedinformation-name" class="form-control" name="1d" aria-required="true" aria-invalid="false" onclick="selna(this.value)">
            <option value="">انتخاب کنید</option>
            <option value="نیاز به نصب و تحویل در محل" onclick="getFunction1('5')">نیاز به نصب و تحویل در محل</option>
            <option value="نیاز به بسته اینترنتی" onclick="getFunction1('4')">نیاز به بسته اینترنتی</option>

        </select>

        <div class="help-block"></div>
    </div>

</div>

<div id="mvno" style="display: none">
    <?= $form->field($model, 'speed')->textInput(['maxlength' => true])->label('سرعت') ?>
    <?= $form->field($model, 'hajm')->textInput(['maxlength' => true])->label('حجم')  ?>
    <?= $form->field($model, 'time')->textInput(['maxlength' => true])->label('زمان')  ?>


</div>


<div id="name_iptv" style="display: none">


    <div class="form-group field-tbladdedinformation-name required has-success">
        <label class="control-label" for="tbladdedinformation-name">نام خدمات</label>
        <select selected="" id="tbladdedinformation-name" class="form-control" name="1d" aria-required="true" aria-invalid="false" onclick="selna(this.value)">
            <option value="">انتخاب کنید</option>
            <option value="نصب" >نصب</option>
           
        </select>

        <div class="help-block"></div>
    </div>
</div>

    <div id="name" style="display: none">
    <?= $form->field($model, 'service')->textInput(['maxlength' => true])->hint('این فیلد می تواند خالی باشد.') ?>

    </div>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true])->hint('لطفا قیمت را به ریال وارد کنید.') ?>
    <?= $form->field($model, 'pursant')->textInput(['maxlength' => true])->hint('لطفا قیمت را به ریال وارد کنید.') ?>





    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>

    function getFunction1(name) {



        if(name == 1){

            $('#name').css("display","block")

        }
        if(name == 2) {

            $('#name').css("display","none")
        }
        if(name == 3){
            $('#name').css("display","none")
        }
        if(name == 4){

            $('#mvno').css("display","block")
        }

    }



</script>


<script>

    function getFunction2(name2) {



        if(name2 == '1'){
            
            $('#name').css("display","none")
            $('#mvno').css("display","none")
            $('#name_adsl').css("display","block")
            $('#name_owa').css("display","none")
            $('#name_ngn').css("display","none")
            $('#name_mvno').css("display","none")
            $('#name_iptv').css("display","none")

        }

        if(name2 == '2') {

            $('#name').css("display","none")
            $('#mvno').css("display","none")
            $('#name_adsl').css("display","none")
            $('#name_ngn').css("display","none")
            $('#name_owa').css("display","block")
            $('#name_mvno').css("display","none")
            $('#name_iptv').css("display","none")
        }
        if(name2 == '3') {

            $('#name').css("display","none")
            $('#mvno').css("display","none")
            $('#name_adsl').css("display","none")
            $('#name_owa').css("display","none")
            $('#name_ngn').css("display","block")
            $('#name_mvno').css("display","none")
            $('#name_iptv').css("display","none")
        }

        if(name2 == '4') {
            $('#name').css("display","none")
            $('#mvno').css("display","none")
            $('#name_mvno').css("display","block")
            $('#name_adsl').css("display","none")
            $('#name_owa').css("display","none")
            $('#name_ngn').css("display","none")
            $('#name_iptv').css("display","none")
        }

        if(name2 == '5') {
            $('#name').css("display","none")
            $('#mvno').css("display","none")
            $('#name_mvno').css("display","none")
            $('#name_adsl').css("display","none")
            $('#name_owa').css("display","none")
            $('#name_ngn').css("display","none")
            $('#name_iptv').css("display","block")
        }

    }


    function selna(name) {
        $('#ne').val(name);
    }



</script>