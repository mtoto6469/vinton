<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$sesssion = Yii::$app->session;
if (!$sesssion->isActive) {
    $sesssion->open();
}
if (isset($_SESSION['error'])){
    if( $_SESSION['error']!= null){
        echo'<div class="alert alert-danger">'. $_SESSION['error'].'</div>';

    }$_SESSION['error']= null;
}

$this->title = 'تغییر رمز';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="padding: 5% 15%; ">
<div class="site-login">

<p> کلمه عبور فقط می تواند شامل عدد و کاراکتر باشد </p>


    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 styll">
            <h1 style="text-align: right;padding-bottom: 20px;"><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model,'username',['inputOptions'=>[
                'placeholder'=>'username'
            ]])->textInput() ?>

            <?= $form->field($model,'oldpass',['inputOptions'=>[
                'placeholder'=>'Old Password'
            ]])->passwordInput() ?>

            <?= $form->field($model,'newpass',['inputOptions'=>[
                'placeholder'=>'New Password'
            ]])->passwordInput() ?>

            <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
                'placeholder'=>'Repeat New Password'
            ]])->passwordInput() ?>


            <div class="form-group">
                <?= Html::submitButton('ثبت', ['class' => 'btn btn-primary btnb', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
    </div>