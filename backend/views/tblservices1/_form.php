<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblServices1 */
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


<div style="padding: 1%">
<div class="tbl-services1-form">

    <?php $form = ActiveForm::begin(); ?>




    <div class="form-group field-tblservices1-sabtnam required has-success">
        <label class="control-label">نمونه خدمات</label>
        <input name="TblServices1[sabtnam]" value="" type="hidden"><div id="tblservices1-sabtnam"  aria-required="true" aria-invalid="false">
            <label><input name="ts" value="ADSL" type="radio" onclick="getFunction2(1)"> ADSL</label>
            <label><input name="ts" value="OWA" type="radio" onclick="getFunction2(1)"> OWA</label>
            <label><input name="ts" value="VDSL" type="radio" onclick="getFunction2(1)"> VDSL</label>
            <label><input name="ts" value="TD-LTE" type="radio" onclick="getFunction2(1)"> TD-LTE</label>
            <label><input name="ts" value="NGN" type="radio" onclick="getFunction2(2)"> NGN</label></div>
            <label><input name="ts" value="IPTV" type="radio" onclick="getFunction2(3)"> IPTV</label></div>
            <label><input name="ts" value="y" type="radio" onclick="getFunction2(4)"> فروش تجاری</label></div>

        <div class="help-block"></div>
    </div>








<div id="sayer" style="display: none">


    <div>
        <div class="form-group field-tblservices1-name required">
            <label class="control-label" for="tblservices1-name">نام</label>
            <input id="tblservices1-name" class="form-control" name="name" maxlength="300" aria-required="true" type="text">


        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">

            <?= $form->field($model, 'speed')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'hajm')->textInput(['maxlength' => true]) ?>

        </div>

        <div class="col-lg-6">

            <div class="form-group field-tblservices1-time">
                <label class="control-label" for="tblservices1-time">زمان</label>
                <input id="tblservices1-time" class="form-control" name="time1" maxlength="300" type="text">

                <div class="help-block"></div>
            </div>

<!--            --><?//= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

<!--            --><?//= $form->field($model, 'price')->textInput(['maxlength' => true])->hint('لطفا قیمت را به ریال وارد کنید') ?>


            <div class="form-group field-tblservices1-price">
                <label class="control-label" for="tblservices1-price">قیمت</label>
                <input id="tblservices1-price" class="form-control" name="price1" type="text">
                <div class="hint-block">لطفا قیمت را به ریال وارد کنید</div>
                <div class="help-block"></div>
            </div>

        </div>

    </div>


</div>


    <div id="ngn" style="display: none">


        <div>
            <div class="form-group field-tblservices1-name required">
                <label class="control-label" for="tblservices1-name">نام</label>
                <input id="tblservices1-name" class="form-control" name="name4" maxlength="300" aria-required="true" type="text"
                value="آی پی آسیا تک را روی کدام سیستم دارید." disabled>


            </div>
        </div>



        <div class="contaner">

            <table  class="tb" style="width: 20%!important;">


                <tr >

                    <th style="width: 7%">نوع خدمات</th>
                    <th style="width: 7%">  انتخاب کنید</th>

                </tr>

                        <tr style="background-color: rgba(0,0,0,.1)">

                            <td style="width: 7%">ADSL</td>
                            <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('ADSL')" >انتخاب</span></td>

                            </tr>


                        <tr style="background-color: white">
                            <td style="width: 7%">VDSL</td>
                            <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('VDSL')" >انتخاب</span></td>

                        </tr>

                       <tr style="background-color: rgba(0,0,0,.1)">

                           <td style="width: 7%">OWA</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('OWA')" >انتخاب</span></td>

                       </tr>


                       <tr style="background-color: white">
                           <td style="width: 7%">TD-LTE</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('TD-LTE')" >انتخاب</span></td>

                       </tr>
                       <tr style="background-color: rgba(0,0,0,.1)">

                           <td style="width: 7%">NGN</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('NGN')" >انتخاب</span></td>

                       </tr>


                       <tr style="background-color: white">
                           <td style="width: 7%">MVNO</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('MVNO')" >انتخاب</span></td>

                       </tr>
                       <tr style="background-color: rgba(0,0,0,.1)">

                           <td style="width: 7%">CDN</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('CDN')" >انتخاب</span></td>

                       </tr>


                       <tr style="background-color: white">
                           <td style="width: 7%">ICD</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('ICD')" >انتخاب</span></td>

                       </tr>
                       <tr style="background-color: rgba(0,0,0,.1)">

                           <td style="width: 7%">IPTV</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('IPTV(AOD-VOD)')" >انتخاب</span></td>

                       </tr>


                       <tr style="background-color: white">
                           <td style="width: 7%">VPN</td>
                           <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('VPN')" >انتخاب</span></td>

                      </tr>
                     <tr style="background-color: rgba(0,0,0,.1)">

                         <td style="width: 7%">DOMAIN</td>
                         <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('DOMAIN')" >انتخاب</span></td>

                     </tr>


                     <tr style="background-color: white">
                         <td style="width: 7%">HOST</td>
                         <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('HOST')" >انتخاب</span></td>

                     </tr>
                     <tr style="background-color: rgba(0,0,0,.1)">

                         <td style="width: 7%">PWA</td>
                         <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('PWA')" >انتخاب</span></td>

                     </tr>


                     <tr style="background-color: white">
                         <td style="width: 7%">پهنای  باند اختصاصی</td>
                         <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('x')" >انتخاب</span></td>

                     </tr>
                     <tr style="background-color: rgba(0,0,0,.1)">

                         <td style="width: 7%">فروش تجاری</td>
                         <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('y')" >انتخاب</span></td>

                     </tr>


                     <tr style="background-color: white">
                         <td style="width: 7%">عاملیت فروش</td>
                         <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('z')" >انتخاب</span></td>

                     </tr>
                     <tr style="background-color: white">
                         <td style="width: 7%"> فروشنده محلی</td>
                         <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak('g')" >انتخاب</span></td>

                     </tr>



            </table>
</div>

<div id="chekbox1"></div>
            
            <input id="chekbox1_input" name="type_ngn" style="display:none">

</div>




<div id="y" style="display: none">


    <div>
        <div class="form-group field-tblservices1-name required">
            <label class="control-label" for="tblservices1-name">نام</label>
            <input id="tblservices1-name" class="form-control" name="name2" maxlength="300" aria-required="true" type="text"
                   value="تقاضای دریافت چه سرویس هایی را دارید." disabled>


        </div>
    </div>



    <div class="contaner">

        <table  class="tb" style="width: 20%!important;">


            <tr >

                <th style="width: 7%">نوع خدمات</th>
                <th style="width: 7%">  انتخاب کنید</th>

            </tr>

            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">ADSL</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('ADSL')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">VDSL</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('VDSL')" >انتخاب</span></td>

            </tr>

            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">OWA</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('OWA')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">TD-LTE</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('TD-LTE')" >انتخاب</span></td>

            </tr>
            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">NGN</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('NGN')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">MVNO</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('MVNO')" >انتخاب</span></td>

            </tr>
            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">CDN</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('CDN')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">ICD</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('ICD')" >انتخاب</span></td>

            </tr>
            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">IPTV</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('IPTV(AOD-VOD)')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">VPN</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('VPN')" >انتخاب</span></td>

            </tr>
            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">DOMAIN</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('DOMAIN')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">HOST</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('HOST')" >انتخاب</span></td>

            </tr>
            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">PWA</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('PWA')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">پهنای  باند اختصاصی</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('x')" >انتخاب</span></td>

            </tr>
            <tr style="background-color: rgba(0,0,0,.1)">

                <td style="width: 7%">فروش تجاری</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('y')" >انتخاب</span></td>

            </tr>


            <tr style="background-color: white">
                <td style="width: 7%">عاملیت فروش</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('z')" >انتخاب</span></td>

            </tr>
            <tr style="background-color: white">
                <td style="width: 7%"> فروشنده محلی</td>
                <td style="width: 7%;text-align: center"><span class="span_target"  onclick="Eshterak1('g')" >انتخاب</span></td>

            </tr>



        </table>
    </div>

    <div id="chekbox11"></div>

    <input id="chekbox11_input" name="type_y" style="display:none">

</div>

<div id="iptv" style="display: none">

    <div>
        <div class="form-group field-tblservices1-name required">
            <label class="control-label" for="tblservices1-name">نوع SBT</label>
            <input id="tblservices1-name" class="form-control" name="x" maxlength="300" aria-required="true" type="text"
                   value="STB" disabled>


        </div>
        <div class="form-group field-tblservices1-name required">
            <label class="control-label" for="tblservices1-name">نام</label>
            <input id="tblservices1-name" class="form-control" name="name3" maxlength="300" aria-required="true" type="text"
                   value="">


        </div>



        <div class="form-group field-tblservices1-time">
            <label class="control-label" for="tblservices1-time">زمان</label>
            <input id="tblservices1-time" class="form-control" name="time2" maxlength="300" type="text">

            <div class="help-block"></div>
        </div>

        <div class="form-group field-tblservices1-price">
            <label class="control-label" for="tblservices1-price">قیمت</label>
            <input id="tblservices1-price" class="form-control" name="price2" type="text">
            <div class="hint-block">لطفا قیمت را به ریال وارد کنید</div>
            <div class="help-block"></div>
        </div>

  


    </div>







</div>



    <div style="padding: 1%"> <?= $form->field($model, 'enable')->radioList([1=>'بله',0=>'خیر']) ?></div>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>


<script>


    function getFunction2(name) {


        if(name == 1){

            $('#sayer').css("display","block")
            $('#ngn').css("display","none")
            $('#iptv').css("display","none")
            $('#y').css("display","none")
        }

        if(name == 2){

            $('#sayer').css("display","none")
            $('#ngn').css("display","block")
            $('#iptv').css("display","none")
            $('#y').css("display","none")
            }
        if(name == 3){

            $('#sayer').css("display","none")
            $('#ngn').css("display","none")
            $('#iptv').css("display","block")
            $('#y').css("display","none")
        }
        if(name == 4){

            $('#sayer').css("display","none")
            $('#ngn').css("display","none")
            $('#iptv').css("display","none")
            $('#y').css("display","block")
        }
    }


</script>

<script>

    function Eshterak(eshterak) {

        if(eshterak== 'x'){
            var esh='پهنای باند'
        }else if(eshterak== 'y'){
            var esh='فروش تجاری'
        }else if(eshterak== 'z'){
            var esh='عاملیت فروش'
        }else if(eshterak== 'g'){
            var esh='فروشگاه محلی'
        }else {
            var esh=eshterak
        }
// alert(eshterak)
        var chek="<span id='closechek'>" +
            "<img style='width:15px;margin-right:20px;margin-bottom:10px'" +
        " src='<?=Yii::$app->request->hostInfo?>/backend/web/images/close.png' onclick='getclose2()'>"
            + esh + ','+"</span>"
        $('#chekbox1').append(chek)


        $('#chekbox1_input').val($('#chekbox1').text())




    }


</script>

<script>

    function getclose2(){

       
        $('#closechek').remove()
        $('#chekbox1_input').val($('#chekbox1').text())
    }


</script>

<script>

    function Eshterak1(eshterak1) {

        if(eshterak1== 'x'){
            var esh1='پهنای باند'
        }else if(eshterak1== 'y'){
            var esh1='فروش تجاری'
        }else if(eshterak1== 'z'){
            var esh1='عاملیت فروش'
        }else if(eshterak1== 'g'){
            var esh1='فروشگاه محلی'
        }else {
            var esh1=eshterak1
        }



// alert(eshterak)
        var chek="<span id='closechek1'>" +
            "<img style='width:15px;margin-right:20px;margin-bottom:10px'" +
            " src='<?=Yii::$app->request->hostInfo?>/backend/web/images/close.png' onclick='getclose21()'>"
            + esh1 + ','+"</span>"
        $('#chekbox11').append(chek)


        $('#chekbox11_input').val($('#chekbox11').text())




    }


</script>

<script>

    function getclose21(){

        $('#closechek1').remove()
        $('#chekbox11_input').val($('#chekbox11').text())
    }


</script>