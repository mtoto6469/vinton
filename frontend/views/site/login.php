

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use frontend\assets\LoginappAsset;

$sesssion = Yii::$app->session;
if (!$sesssion->isActive) {
    $sesssion->open();
}
if (isset($_SESSION['error'])){
    if( $_SESSION['error']!= null){
        echo'<div class="alert alert-danger" style="position: absolute;top:60%;left: 20%; width: 500px">'. $_SESSION['error'].'</div>';

    }$_SESSION['error']= null;
}

?>
<div class="container">
    <div class="background">
        
        <p class="vin-lable">vinton</p>
        
        <em class="under-vin">Vinton Employee</em>
    </div>

    <div class="back-footer"></div>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <div class="abs-form">


        <div style="border-radius: 5px; width: 170px;border: 0;margin:2% 10%!important; " >

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('نام کاربری') ?>

       </div>

        <div  style="border-radius: 5px; width: 130px;border: 0;margin:0 10%!important;"   class="keyboardInput">
        <?= $form->field($model, 'password')->passwordInput()->label('کلمه عبور') ?>

        </div>

        <div class="info-alert">

            <p style="text-align: center;line-height: 45px; ">لطفا در ورود اطلاعات دقت فرمایید</p>

        </div>

        <div class="sequret">
            <p style="margin-right: 77px;line-height: 80px;color: rgba(0, 26, 150, 0.86)">کد زیر را وارد نمایید:</p>
            <?php


            $rand=substr(rand(),0,4); //only show 4 numbers


            ?>

            <!-- HTML Form -->


            <table width="400px" align="center" bgcolor="#EBEBEB">

                <tr>

                    <td><input  value="<?=$rand?>" id="ran" readonly="readonly" class="captcha" name="rand">

                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>

                    <td>
                        <input  type="text" name="chk" id="chk">
                        
                        <input type="button" class="refresh"  onclick="captch()"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        
                        <input  style="margin: 15px ; margin-left: 140px;" class="btn btn-success  btnfont" value="ورود" type="submit" name="check" onclick="validation();">
                        
                        <a class="acolor">رمز عبور خود را فراموش کرده اید </a>
                        
                    </td>
            </table>



            <?php ActiveForm::end(); ?>





        </div>

    </div>
</div>










  




