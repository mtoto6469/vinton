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
            <label class="control-label">نمونه خدمات</label></br>


            <?php

            foreach ($sabtnam as $item){?>


                <label><input name="TblServices1[sabtnam]" value="<?=$item?>"  type="radio" onclick="getType('<?=$item?>')"><?=$item?></label>

                <?php
            }?>

        </div>

        <div class="help-block">

        </div>


        <div style="padding: 1%">
            <div class="form-group field-tblservices1-name required">
                <label class="control-label" for="tblservices1-name">نام</label>
                <input id="tblservices1-name" class="form-control" name="TblServices1[name]" maxlength="300" aria-required="true" type="text">


            </div>
        </div>





        <div style="padding: 1%;display: none" class="ngn">

            <?= $form->field($model, 'type')->checkboxList([

                'ADSL' => 'ADSL',
                'OWA' => 'OWA',
                'VDSL' => 'VDSL',
                'TD-LTE' => 'TD-LTE',
                'NGN' => 'NGN',
                'MVNO' => 'MVNO',
                'CDN' => 'CDN',
                'ICD' => 'ICD',
                'IDTV(AOD-VOD)' => 'IDTV(AOD-VOD)',
                'VPN' => 'VPN',
                'Domain' => 'Domain',
                'Host' => 'Host',
                'PWA' => 'PWA',
                'پهنای  باند اختصاصی' => 'پهنای  باند اختصاصی',
                'فروش تجاری' => 'فروش تجاری',
                'معرفی عملیات و فروشنده محلی' => 'معرفی عملیات و فروشنده محلی',


            ]) ?>
        </div>







        <div class="row">
            <div class="adsl" style="display: none">
                <div class="col-lg-6">

                    <?= $form->field($model, 'speed')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'hajm')->textInput(['maxlength' => true]) ?>

                </div>

                <div class="col-lg-6">

                    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'price')->textInput(['maxlength' => true])->hint('لطفا قیمت را به ریال وارد کنید') ?>

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