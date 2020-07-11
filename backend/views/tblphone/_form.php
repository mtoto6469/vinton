<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPhone */
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

<div class="tbl-phone-form">

    <?php $form = ActiveForm::begin(); ?>




    <div class="row">

        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'pishshomare')->textInput()->hint('لطفا پیش شماره را به شکل صحیح وارد کنید.مثال:021') ?>
        </div>


        <div class="col-md-6 col-lg-6">

        </div>


    </div>



    <div class="row">

        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'ostan')->dropDownList($ostan,['prompt'=>'انتخاب کنید','onchange'=>'getcity()']) ?>
        </div>


        <div class="col-md-6 col-lg-6" >
            <div id="city">
            <div class="form-group field-tblphone-ostan required">
                <label class="control-label" for="tblphone-ostan">شهر</label>
                <select id="tblphone-city" class="form-control" name="TblPhone[city]" aria-required="true" onchange="getMarkaz(this.value)">
                    <option value="">انتخاب کنید</option>
                    <?php if (!$model->isNewRecord) {
                        foreach ($city as $c) {
                            ?>
                            <option value="<?= $c->name ?>"
                                <?php

                                if ($model->shahr == $c->name) {
                                    echo 'selected=""';
                                }

                                ?>
                            ><?= $c->name ?></option>
                        <?php }
                    } ?>

                </select>

                <div class="help-block"></div>
            </div>
            </div>
        </div>


    </div>



    <div class="row">

        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'reng_az')->textInput() ?>
        </div>


        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'reng_ta')->textInput() ?>
        </div>


    </div>


    <div class="row">

        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'name_markaz')->textInput() ?>
        </div>


        <div class="col-md-6 col-lg-6">

        </div>


    </div>

    <?= $form->field($model, 'sabtenam')->radioList(
        [
            'ADSL' => 'ADSL',
            'OWA' => 'OWA',
            'VDSL' => 'VDSL',
            'TD-LTE' => 'TD-LTE',
            'NGN' => 'NGN',
            'MVNO' => 'MVNO',
            'CDN' => 'CDN',
            'IDC' => 'IDC',
            'IPTV' => 'IPTV(AOD-VOD)',
            'VPN' => 'VPN',
            'Domain' => 'Domain',
            'Host' => 'Host',
            'PWA' => 'PWA',
            'x' => 'پهنای  باند اختصاصی',
            'y' => 'فروش تجاری',
            'z' => ' فروشگاه محلی',
            'g' => ' عاملیت فروش',

        ]) ?>



 <?= $form->field($model, 'vaziyat')->radioList(
        ['0'=> 'غیرقابل پوشش', '1' => 'قابل پوشش' ,'2' => 'غیرمحدود' ,'3' => 'محدود' ],
        ['style'=> 'padding:10px']
    ) ?>


    <?= $form->field($model, 'vaziyat_forosh')->radioList(
        ['1'=> 'فروش', '0' => 'غیرقابل فروش' ],
        ['style'=> 'padding:10px']
    ) ?>



    <?= $form->field($model, 'enable')->radioList(
        ['1'=> 'قابل نمایش', '0' => 'غیرقابل نمایش' ],
        ['style'=> 'padding:10px']
    ) ?>



   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>

    function getcity() {
        var name = $('#tblphone-ostan').val();

        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('tblphone/city') ?>',
            data: {name: name},
            success: function (data) {

                $('#city').html(data);
            }
        });



    }
</script>

