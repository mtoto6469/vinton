<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\models\Adsl */
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
<?php

$url=Yii::$app->urlManager;
?>

<div style="direction: rtl;text-align: right; margin: 2%;" xmlns="http://www.w3.org/1999/html">


<div class="adsl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>


    <div class="form-group field-adsl-type required">
        <label class="control-label" for="adsl-type">type</label>
        <input id="adsl-type" class="form-control" name="Adsl[type]" value="<?=$type?>" aria-required="true" type="text">

        <div class="help-block"></div>
    </div>
    <input value="<?=$ranzh?>">

    <?php
    if($type=='adsl' || $type=='vdsl'){?>
 

    <?= $form->field($model, 'eshterak')->textInput(['value'=>$shomare.'_'.$pishshomare]) ?>
    <?php
    if($eshterak!=null){


    foreach ($eshterak as $item) {

    if ($shomare >= $item->reng_az && $shomare <= $item->reng_ta) {


        echo 'شناسه:' . $id = $item->id . '</br>';
        echo 'استان:' . $ostan = $item->ostan . '</br>';
        echo 'شهر:' . $shahr = $item->shahr . '</br>';
        echo 'نام مرکز:' . $name_markaz = $item->name_markaz . '</br>';

        $vazeyate_forosh = $item->vaziyat_forosh;

        if ($vazeyate_forosh == '0') {
            echo 'وضعیت فروش:غیرقابل فروش' . '</br>';
        }
        if ($vazeyate_forosh == '1') {
            echo 'وضعیت فروش: قابل فروش' . '</br>';
        }
        $vazeyat = $item->vaziyat;
        if ($vazeyat == '3') {

            echo 'وضعیت مرکز:محدود' . '</br>';
            ?>


            <a class="btn btn-success" href="<?= $url->createAbsoluteUrl(['adsl/factor1',
                'type' => $type,
                'shomare' => $shomare,
                'pishshomare' => $pishshomare,
                'status' => 0]) ?>">پیش ثبت نام</a>
            </br>
            <?php

        } elseif ($vazeyat == '1') {

            echo 'وضعیت مرکز:قابل پوشش' . '</br>';
        } elseif ($vazeyat == '2') {

            echo 'وضعیت مرکز:غیرمحدود' . '</br>';
        } elseif ($vazeyat == '0') {

            echo ' وضعیت مرکز:غیرقابل پوشش' . '</br>';
        }

    }else echo 'برای این شماره مرکزی وجود ندارد ';
       

        }

}else echo 'برای این شماره مرکزی وجود ندارد ';

  }else{
    echo $form->field($model, 'eshterak')->textInput(['value'=>$type]) ;
    }
    ?>
    <div class="form-group field-adsl-vazeyat_sabt" style="display: none">
        <label class="control-label" for="adsl-vazeyat_sabt">Vazeyat Sabt</label>
        <input id="adsl-vazeyat_sabt" class="form-control" name="Adsl[vazeyat_sabt]" value="<?=$status?>" type="text">

        <div class="help-block"></div>
    </div>
    
    <?php
    
    
      if($status==0){?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_pedar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cellphone')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>      

          <div class="form-group">
              <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
          </div>


      <?php }
    elseif($status==1) {
        ?>

        <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات استفاده کننده</div>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'name_pedar')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'codemeli')->textInput() ?>

        <?= $form->field($model, 'shenasname')->textInput() ?>

        <?= $form->field($model, 'tarikh_tavalod')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mahale_sodur')->textInput(['maxlength' => true]) ?>

        <?php
        if ($type == 'adsl' || $type == 'vdsl') {
            ?>

            <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات صاحب خط</div>

            <?= $form->field($model, 'name_malek')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'lastname_malek')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'codemeli_malek')->textInput() ?>

            <?php
        } else { ?>
            <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات تماس</div>
            <?php

            echo $form->field($model, 'phone')->textInput();
        }
   
        ?>








    <?= $form->field($model, 'cellphone')->textInput() ?>







        <p>آیا روی این خط تلگرام دارید.</p>

    <div class="btn btn-success" onclick="myFunction2(1)">بله</div>
   <div class="btn btn-danger" onclick="myFunction2(0)">خیر</div>

  <div class="form-group field-adsl-telegram" style="display: none">
            <label class="control-label" for="adsl-telegram">Telegram</label>
            <input id="adsl-telegram" class="form-control" name="Adsl[telegram]" type="text" value="">

            <div class="help-block"></div>
  </div>

        <div class="form-group field-adsl-cellphone2" style="display:none">
            <label class="control-label" for="adsl-cellphone2">Cellphone2</label>
            <input id="adsl-cellphone2" class="form-control" name="Adsl[cellphone2]" type="text" >

            <div class="help-block"></div>
        </div>

    <?php
    if($type=='adsl' || $type=='vdsl' || $type == 'iptv') {


        echo $form->field($model, 'adress')->textInput(['maxlength' => true]);
    }
        else{

            echo $form->field($model, 'adress')->textInput(['maxlength' => true]);
            echo $form->field($model, 'lng')->textInput(['maxlength' => true]);

            echo $form->field($model, 'lat')->textInput(['maxlength' => true]);
        }

        ?>

    <?= $form->field($model, 'codeposti')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات سرویس </div>


     <?php

        $service=\frontend\models\TblServices1::find()->where(['sabtnam'=>$type])->select('DISTINCT `name`')->all();
        foreach ($service as $s){?>



      <label><input type="radio" onclick="getservice('<?=$s->name?>')" name="rad"><?=$s->name?></label>

      <?php

        }?>


<div id="servic">

</div>

    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات افزوده </div>



    <?= $form->field($model, 'ax_shenasaee')->textInput(['maxlength' => true]) ?>

        <?php

        $added=\frontend\models\TblAddedInformation::find()->where(['sabtnam'=>$type])->select('DISTINCT `name`')->all();
        foreach ($added as $a){?>



            <label><input type="checkbox" onclick="getadded('<?=$a->name?>')" name="add"><?=$a->name?></label>

            <?php

        }?>


        <div id="added">

        </div>

    <?= $form->field($model, 'discription')->textarea(['maxlength' => true]) ?>

    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات مالی </div>

    <?= $form->field($model, 'price')->textInput() ?>

        <p>آیامایلید برگه با تلگرام ارسال شود.</p>

        <div class="btn btn-success" onclick="myFunction3(1)">بله</div>
        <div class="btn btn-danger" onclick="myFunction3(0)">خیر</div>

        <div class="form-group field-adsl-ersal_barge_telegram" style="display: none">
            <label class="control-label" for="adsl-ersal_barge_telegram">ersal_barge_telegram</label>
            <input id="adsl-ersal_barge_telegram" class="form-control" name="Adsl[ersal_barge_telegram]" type="text" value="">

            <div class="help-block"></div>
        </div>






        <p>آیامایلید مبلغ پیامک شود.</p>

        <div class="btn btn-success" onclick="myFunction4(1)">بله</div>
        <div class="btn btn-danger" onclick="myFunction4(0)">خیر</div>

        <div class="form-group field-adsl-ersal_mablaq_payamak" style="display: none">
            <label class="control-label" for="adsl-ersal_mablaq_payamak">ersal_mablaq_payamak</label>
            <input id="adsl-ersal_mablaq_payamak" class="form-control" name="Adsl[ersal_mablaq_payamak]" type="text" value="">

            <div class="help-block"></div>
        </div>




    <?= $form->field($model, 'ax_emza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_farsi')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>




    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   <?php }?>



    </div>

</div>

<script>

    function getservice(name) {
        var type =$('#adsl-type').val()


        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('adsl/services') ?>',
            data: {
                name: name,
                type:type
            },
            success: function (data) {

                $('#servic').html(data);
            }
        });

    }



</script>
<script>

    function getadded(name) {
        var type =$('#adsl-type').val()


        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('adsl/added') ?>',
            data: {
                name: name,
                type:type
            },
            success: function (data) {

                $('#added').html(data);
            }
        });

    }



</script>


<script>
    function myFunction2(telegram) {

    if(telegram == 1){
        $('#adsl-telegram').val('1')
        $('.field-adsl-cellphone2').css("display","none");
    }
        if(telegram == 0){
            $('#adsl-telegram').val('0')
            $('.field-adsl-cellphone2').css("display","block");
        }




    }
</script>

<script>
    function myFunction3(telegram) {

        if(telegram == 1){
            $('#adsl-ersal_barge_telegram').val('1')


        }
        if(telegram == 0){
            $('#adsl-ersal_barge_telegram').val('0')

        }




    }
</script>



<script>
    function myFunction4(telegram) {

        if(telegram == 1){
            $('#adsl-ersal_mablaq_payamak').val('1')


        }
        if(telegram == 0){
            $('#adsl-ersal_mablaq_payamak').val('0')

        }




    }
</script>