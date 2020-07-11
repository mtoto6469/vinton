<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sabtnam */
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

<div class="sabtnam-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->dropDownList(
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

        ],
       ['prompt'=>'انتخاب کنید']) ?>
    <div class="row">

        <div class="col-lg-6">
            <?= $form->field($model, 'ranzh')->textInput()->hint('لطفا به ریال وارد کنید. اگر فیلد مورد نظر رانژ ندارد مقدار /ان را 0 بگذارید') ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'porsant')->textInput()->hint('لطفا به ریال وارد کنید. اگر فیلد مورد نظر رانژ ندارد مقدار /ان را 0 بگذارید')  ?>
        </div>

    </div>

   


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
