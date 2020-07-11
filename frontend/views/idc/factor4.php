<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Idc */
/* @var $form yii\widgets\ActiveForm */
?>

<?php

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
<?php

$url=Yii::$app->urlManager;
?>

<div style="text-align: right;margin:4%;direction: rtl">
<div class="idc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group field-idc-type required">
        <label class="control-label" for="idc-type">type</label>
        <input id="idc-type" class="form-control" name="Idc[type]" value="<?=$type?>" aria-required="true" type="text">

        <div class="help-block"></div>
    </div>
    <input value="<?=$ranzh?>">



    <?= $form->field($model, 'eshterak')->textInput(['value'=>$type]) ?>

    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات استفاده کننده </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namepedar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codemeli')->textInput() ?>

    <?= $form->field($model, 'shomareshenasname')->textInput() ?>

    <?= $form->field($model, 'tarikh_tavalod')->textInput(['maxlength' => true]) ?>


    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات تماس </div>

    <?= $form->field($model, 'cellphone')->textInput() ?>

    <p>آیا روی این خط تلگرام دارید.</p>

    <div class="btn btn-success" onclick="myFunction2(1)">بله</div>
    <div class="btn btn-danger" onclick="myFunction2(0)">خیر</div>

    <div class="form-group field-idc-telegram" style="display: none">
        <label class="control-label" for="idc-telegram">Telegram</label>
        <input id="idc-telegram" class="form-control" name="Idc[telegram]" type="text" value="">

        <div class="help-block"></div>
    </div>

    <div class="form-group field-idc-cellphone2" style="display:none">
        <label class="control-label" for="idc-cellphone2">Cellphone2</label>
        <input id="idc-cellphone2" class="form-control" name="Idc[cellphone2]" type="text" >

        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'phone')->textInput() ?>



    <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codeposti')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_sherkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shenase_meli')->textInput(['maxlength' => true]) ?>

    <p>فاکتور به شرکت ثبت شود؟</p>

    <div class="btn btn-success" onclick="myFunction3(1)">بله</div>
    <div class="btn btn-danger" onclick="myFunction3(0)">خیر</div>

    <div class="form-group field-idc-sabt_sherkat" style="display: none" >
        <label class="control-label" for="idc-sabt_sherkat">sabt_sherkat</label>
        <input id="idc-sabt_sherkat" class="form-control" name="Idc[sabt_sherkat]" type="text" value="">

        <div class="help-block"></div>
    </div>

    <div class="sabt_factor_sherkat" style="display: none">

    <?= $form->field($model, 'nemune_mohr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'madarek_hoviyati')->textInput(['maxlength' => true]) ?>



    </div>
    <?= $form->field($model, 'datasanter')->textInput(['maxlength' => true]) ?>
    <?php

    if($type == 'idc' || $type == 'vpn' || $type == 'پهنای باند اختصاصی') {
        if($type == 'idc' || $type == 'vpn') {

            echo $form->field($model, 'lng')->textInput();

            echo $form->field($model, 'lat')->textInput();


        }

        echo $form->field($model, 'id_khadamat')->textInput();
}
    elseif($type == 'domain' || $type == 'host'){?>

   <label style="margin-left: 20px"><input type="radio"  name="t" onclick="getFunction('خرید')" >خرید اولیه</label>
   <label style="margin-left: 20px"><input type="radio"  name="t" onclick="getFunction('تمدید')">تمدید</label>
   <label style="margin-left: 20px"> <input type="radio"  name="t" onclick="getFunction('انتقال')">انتقال</label>

    <?= $form->field($model, 'name_domain')->textInput(['maxlength' => true]) ?>


        <div> ایا هاست مورد نظر را تهیه کرده اید؟</div>
        <div class="btn btn-success" onclick="myFunction5(1)">بله</div>
        <div class="btn btn-danger" onclick="myFunction5(0)">خیر</div>

        <div id="host"></div>

   <div id="domain_id">
       </div>


  <?php  }
    ?>

    

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'date_farsi')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'ersal_barge_telegram')->textInput() ?>

    <?= $form->field($model, 'ersal_payamak')->textInput() ?>

    <?= $form->field($model, 'ersal_email')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>

<script>
    function myFunction2(telegram) {

        if(telegram == 1){
            $('#idc-telegram').val('1')
            $('.field-idc-cellphone2').css("display","none");
        }
        if(telegram == 0){
            $('#idc-telegram').val('0')
            $('.field-idc-cellphone2').css("display","block");
        }




    }
</script>

<script>
    function myFunction3(telegram) {

        if(telegram == 1){
            $('#idc-sabt_sherkat').val('1')
            $('.sabt_factor_sherkat').css("display","block");
        }
        if(telegram == 0){
            $('#idc-sabt_sherkat').val('0')
            $('.sabt_factor_sherkat').css("display","none");
        }




    }
</script>


<script>
    function myFunction5(host) {
     var h='1'
        if(host == 1){


            $.ajax({
                type: 'GET',
                url: '<?php echo \Yii::$app->getUrlManager()->createUrl('idc/host') ?>',
               date:{
                   h:h
               }
                success: function (data) {

                    $('#host').html(data);
                }
            });


            
        }





    }
</script>

<script>

    function getFunction(name) {


        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('idc/domain') ?>',
            data: {
                name: name

            },
            success: function (data) {

                $('#domain_id').html(data);
            }
        });

    }



</script>