<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use frontend\assets\LoginappAsset;

?>
<div class="container">
    <div class="background">
        <p class="vin-lable">vinton</p>
        <em class="under-vin">Vinton Employee</em>
    </div>

    <div class="back-footer"></div>

    <?php $form = ActiveForm::begin(); ?>

    <div class="abs-form">

        <label style="margin-top: 30px;margin-right: 30px;color: #b7b7b7;" >نام کاربری</label>

        <input name="user" style="border-radius: 5px; width: 170px; background-color: #edeeee;);border: 0;">

        <p></p>

        <label style="margin-top: 4px;margin-right: 30px;color: #b7b7b7;">کلمه عبور</label>

        <input  name="pass" class="keyboardInput" style="border-radius: 5px; width: 130px; background-color: #edeeee;border: 0;">

        <img  src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/keyboard.png" class="keyboardInput">

        <div class="info-alert">

            <p style="text-align: center;line-height: 45px; ">لطفا در ورود اطلاعات دقت فرمایید</p>

        </div>

        <div class="sequret">

            <p style="margin-right: 77px;line-height: 80px;color: rgba(0, 26, 150, 0.86)">متن زیر را وارد نمایید:</p>



            <!-- HTML Form -->


                <table width="400px" align="center" bgcolor="#EBEBEB">

                    <tr>

                        <td><input type="text" style="position: absolute;top: 57px; right: 35px;background-color: #d6e6f6;" value="<?=$rand?>" id="ran" readonly="readonly" class="captcha">

                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>

                        <td>
                            <input style="position: absolute;top: 59px; right: 125px;width: 100px;border: 0;background-color: #edeeee;border-radius: 2px;"  type="text" name="chk" id="chk">
                            <input type="button" class="refresh"  onclick="captch()" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input class="btn btn-success  btnfont" value="ورود" type="submit" name="check" onclick="return validation();">
                            <a class="acolor">رمز عبور خود را فراموش کرده اید </a>
                        </td>
                </table>

            <?php ActiveForm::end(); ?>






        </div>

    </div>
</div>


<script type="text/javascript">
    $('.virtualKeyboard').vkb();


        //Javascript Referesh Random String

        function captch() {
            var x = document.getElementById("ran")
            x.value = Math.floor((Math.random() * 10000) + 1);
        }

    //Javascript Captcha validation


    function validation()
    {

        if(document.form1.name.value=="")
        {
            document.getElementById("name").innerHTML="Enter your Name!";
            document.form1.name.focus();
            return false;
        }

        if(document.form1.chk.value=="")
        {
            document.getElementById("error").innerHTML="Enter Captcha!";
            document.form1.chk.focus();
            return false;
        }


        if(document.form1.ran.value!=document.form1.chk.value)
        {
            document.getElementById("error").innerHTML="Captcha Not Matched!";
            document.form1.chk.focus();
            return false;
        }

        return true;
    }



</script>

