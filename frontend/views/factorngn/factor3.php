<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FactorNgn */
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

<div class="factor-ngn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group field-factorngn-type required">
        <label class="control-label" for="factorngn-type">Type</label>
        <input id="factorngn-type" class="form-control" name="FactorNgn[type]" maxlength="300" aria-required="true" type="text" value="<?=$type?>">

        <div class="help-block"></div>
    </div>


 
</div>
<input value="<?=$ranzh?>">

<?= $form->field($model, 'eshterak')->textInput(['value'=>$type]) ?>

    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات استفاده کننده </div>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'name_pedar')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'codemeli')->textInput() ?>

<?= $form->field($model, 'shenasname')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'tarikh_tavalod')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'mahale_sodur')->textInput(['maxlength' => true]) ?>

    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات تماس </div>

<?= $form->field($model, 'cellphone')->textInput() ?>


    <p>آیا روی این خط تلگرام دارید.</p>

    <div class="btn btn-success" onclick="myFunction2(1)">بله</div>
    <div class="btn btn-danger" onclick="myFunction2(0)">خیر</div>

    <div class="form-group field-factorngn-telegram" style="display: none">
        <label class="control-label" for="factorngn-telegram">Telegram</label>
        <input id="factorngn-telegram" class="form-control" name="FactorNgn[telegram]" type="text" value="">

        <div class="help-block"></div>
    </div>

    <div class="form-group field-factorngn-cellphone2" style="display: none">
        <label class="control-label" for="factorngn-cellphone2">Cellphone2</label>
        <input id="factorngn-cellphone2" class="form-control" name="FactorNgn[cellphone2]" type="text">

        <div class="help-block"></div>
    </div>

<?= $form->field($model, 'phone')->textInput() ?>

<?= $form->field($model, 'lng')->textInput() ?>

<?= $form->field($model, 'lat')->textInput() ?>

<?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'code_posti')->textInput() ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?php
if($type=='ngn'){?>


<div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات سرویس </div>


    <?php

    $service=\frontend\models\TblServices1::find()->where(['sabtnam'=>$type])->select('DISTINCT `type`')->all();
    foreach ($service as $s){

        $ip_asiyatek=explode(',',$s->type);
        $count=count($ip_asiyatek);

        for($i=0; $i <= $count-1 ;$i++) {


            ?>

            <label><input type="radio" onclick="getservice('<?=$ip_asiyatek[$i] ?>')" name="rad"><?=$ip_asiyatek[$i]?></label>

            <?php

        }
//        var_dump(    $count);  exit;
    }?>


    <div id="servic">

    </div>



    <?php
   echo $form->field($model, 'shomare_asiyatek')->textInput() ;



    $service=\frontend\models\TblShomare::find()->select('DISTINCT `type_shomare`')->all();
    foreach ($service as $s){?>



        <label><input type="radio" onclick="getTypeShomare('<?=$s->type_shomare?>')" name="rad"><?=$s->type_shomare?></label>



 <?php
    }?>

    <div id="typeshomare">

    </div>


    <?= $form->field($model, 'shomare_darkhasti')->textInput(['maxlength' => true]) ?>




    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات افزوده</div>
    <?php

    $added=\frontend\models\TblAddedInformation::find()->where(['sabtnam'=>$type])->select('DISTINCT `name`')->all();
    foreach ($added as $a){?>



        <label><input type="checkbox" onclick="getadded('<?=$a->name?>')" name="add"><?=$a->name?></label>

        <?php

    }?>


    <div id="added">

    </div>

   <?= $form->field($model, 'tedad_sip')->textInput(['maxlength' => true])?>
   <?= $form->field($model, 'tedad_soft')->textInput(['maxlength' => true])?>

<?php
}
elseif($type== 'mvno') {

    $service = \frontend\models\TblShomare::find()->select('DISTINCT `type_shomare`')->all();

    foreach ($service as $s) {
        ?>


        <label><input type="radio" onclick="getTypeShomare('<?= $s->type_shomare ?>')"
                      name="rad"><?= $s->type_shomare ?>
        </label>

        <?php

    } ?>


    <div id="typeshomare">


    </div>
    </br>
    <?php
    $service1 = \frontend\models\TblShomare::find()->select('DISTINCT `name_shomare`')->all();
    foreach ($service1 as $s1) {
        ?>


        <label><input type="radio" onclick="getNameShomare('<?= $s1->name_shomare ?>')"
                      name="rad"><?= $s1->name_shomare ?>
        </label>

        <?php

    } ?>


    <div id="nameshomare">

    </div>
    <?php
    echo $form->field($model, 'tedad')->textInput(['maxlength' => true]);
    echo $form->field($model, 'dis')->textarea(['maxlength' => true]);

    ?>

    <div style="margin: 2%;color: red;font-size: 30px;font-weight: bold;"> اطلاعات افزوده</div>


    <?php


    echo $form->field($model, 'nasbdarmahal')->textInput(['maxlength' => true]);
    ?>


    <p>آیا مایل به دریافت اینترنت هستید.</p>

    <div class="btn btn-success" onclick="myFunction5(1)">بله</div>
    <div class="btn btn-danger" onclick="myFunction5(0)">خیر</div>

    <div class="form-group field-factorngn-niyazbasteinterneti" style="display: none">
        <label class="control-label" for="factorngn-niyazbasteinterneti">niyaz be nasb</label>
        <input id="factorngn-niyazbasteinterneti" class="form-control" name="FactorNgn[niyazbasteinterneti]" type="text"
               value="">

        <div class="help-block"></div>
    </div>

    <div id="afzude" style="display: none">
        <?php
        $added = \frontend\models\TblAddedInformation::find()->where(['sabtnam' => $type])->select('DISTINCT `name`')->all();
        foreach ($added as $a) {
            ?>


            <label><input type="radio" onclick="getadded('<?= $a->name ?>')" name="add"><?= $a->name ?></label>

            <?php

        }
        ?>


        <div id="added">

        </div>


    </div>

    <?php
}
elseif($type== 'cdn'){

   echo $form->field($model, 'name_domain')->textInput(['maxlength' => true]) ;

    echo $form->field($model, 'be_shahr')->dropDownList(
        \yii\helpers\ArrayHelper::map(\frontend\models\TblPhone::find()->where(['sabtenam'=>$type])
            ->andWhere(['enable'=>'1'])->andWhere(['enableview'=>'1'])
            ->all(),'shahr','shahr')) ;
}
?>


<?= $form->field($model, 'ax_shenasaee')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'discription')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'ersal_barge_telegram')->textInput() ?>

<?= $form->field($model, 'ersal_mablaq_payam')->textInput() ?>

<?= $form->field($model, 'ax_emza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'date_farsi')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>

</div>



<script>
    function myFunction2(telegram) {

        if(telegram == 1){
            $('#factorngn-telegram').val('1')
            $('.field-factorngn-cellphone2').css("display","none");

        }
        if(telegram == 0){
            $('#factorngn-telegram').val('0')
            $('.field-factorngn-cellphone2').css("display","block");
        }




    }
</script>

<script>
    function myFunction5(nasb) {

        if(nasb == 1){
            $('#factorngn-niyazbasteinterneti').val('1')
            $('#afzude').css("display","block");


        }
        if(nasb == 0){
            $('#factorngn-niyazbasteinterneti').val('0')
            $('#afzude').css("display","none");
        }




    }
</script>

<script>

 function getservice(name) {




     var type = $('#factorngn-type').val()

     $.ajax({
         type: 'GET',
         url: '<?php echo \Yii::$app->getUrlManager()->createUrl('factorngn/services') ?>',
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

    function getTypeShomare(name) {


        var type = $('#factorngn-type').val()

        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('factorngn/typeshomare') ?>',
            data: {
                name: name,
                type:type
            },
            success: function (data) {

                $('#typeshomare').html(data);
            }
        });


    }



</script>

<script>

    function getNameShomare(name) {


        var type = $('#factorngn-type').val()
        var id= $('#x').val()


        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('factorngn/nameshomare') ?>',
            data: {
                name: name,
                type:type,
                id:id
            },
            success: function (data) {

                $('#nameshomare').html(data);
            }
        });


    }



</script>

<script>

    function getadded(name) {
        var type =$('#factorngn-type').val()


        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('factorngn/added') ?>',
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