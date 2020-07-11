<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblShomare */
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
<div class="row">
<div class="tbl-shomare-form">


    <?php $form = ActiveForm::begin(); ?>




    <div class="col-lg-6">


    <?= $form->field($model, 'name_shomare')->dropDownList([
        'اعتباری'=>'اعتباری',
        'دائمی'=>'دائمی',
        'ثابت'=>'ثابت',
    ]) ?>

        <?= $form->field($model, 'number')->textInput() ?>



        <p>کشور مورد نظر را انتخاب کنید</p>

        <label><input type="radio" onclick="myFunction2(1)" name="shomare" value="ir"> ایران</label>
        <label><input type="radio" onclick="myFunction2(0)" name="shomare" value="other">سایر کشورها</label>



        <div class="one" style="display: none;">
            <div class="form-group field-tblshomare-keshvar has-success">
                <label class="control-label" for="tblshomare-keshvar">کشور</label>
                <input id="tblshomare-keshvar" class="form-control" name="keshvar" value=" ایران" aria-invalid="false" type="text" disabled>

                <div class="help-block"></div>
            </div>  
        </div>


        <div class="two" style="display: none">
            <div class="form-group field-tblshomare-keshvar has-success">
                <label class="control-label" for="tblshomare-keshvar">کشور</label>
                <input id="tblshomare-keshvar" class="form-control" name="keshvar2"  aria-invalid="false" type="text" >

                <div class="help-block"></div>
            </div>  
        </div>



        <div style="margin:2% ">




            <?= $form->field($model, 'enable')->radioList([1=>'بله',0=>'خیر'])->label('قابل نمایش') ?>



            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

        </div>



    </div>

   <div class="col-lg-6">

       <?= $form->field($model, 'type_shomare')->dropDownList([

           'معمولی'=>'معمولی',
           'رند'=>'رند',
           'طلایی'=>'طلایی',
       ]) ?>

       <?= $form->field($model, 'price')->textInput(['maxlength' => true])->hint('لطفا شماره را به ریال وارد کنید.') ?>

       <div class="one" style="display: none;margin-top: 50px" >

           <div class="form-group field-tblshomare-ostan has-success">
               <label class="control-label" for="tblshomare-ostan">استان</label>
               <select id="tblshomare-ostan" class="form-control" name="ostan" aria-invalid="false">
                   <option value="">انتخاب کنید</option>
                   <option value="آذربايجان شرقي">آذربايجان شرقي</option>
                   <option value="آذربايجان غربي">آذربايجان غربي</option>
                   <option value="اردبيل">اردبيل</option>
                   <option value="اصفهان">اصفهان</option>
                   <option value="البرز">البرز</option>
                   <option value="ايلام">ايلام</option>
                   <option value="بوشهر">بوشهر</option>
                   <option value="تهران">تهران</option>
                   <option value="چهارمحال بختياري">چهارمحال بختياري</option>
                   <option value="خراسان جنوبي">خراسان جنوبي</option>
                   <option value="خراسان رضوي">خراسان رضوي</option>
                   <option value="خراسان شمالي">خراسان شمالي</option>
                   <option value="خوزستان">خوزستان</option>
                   <option value="زنجان">زنجان</option>
                   <option value="سمنان">سمنان</option>
                   <option value="سيستان و بلوچستان">سيستان و بلوچستان</option>
                   <option value="فارس">فارس</option>
                   <option value="قزوين">قزوين</option>
                   <option value="قم">قم</option>
                   <option value="كردستان">كردستان</option>
                   <option value="كرمان">كرمان</option>
                   <option value="كرمانشاه">كرمانشاه</option>
                   <option value="كهكيلويه و بويراحمد">كهكيلويه و بويراحمد</option>
                   <option value="گلستان">گلستان</option>
                   <option value="گيلان">گيلان</option>
                   <option value="لرستان">لرستان</option>
                   <option value="مازندران">مازندران</option>
                   <option value="مركزي">مركزي</option>
                   <option value="هرمزگان">هرمزگان</option>
                   <option value="همدان">همدان</option>
                   <option value="يزد">يزد</option>
               </select>

               <div class="help-block"></div>
           </div>

       </div>

       <div class="two" style="display: none;margin-top: 50px" >

           <div class="form-group field-tblshomare-ostan has-success">
               <label class="control-label" for="tblshomare-ostan">استان</label>
               <input id="tblshomare-ostan" class="form-control" name="ostan2"  type="text">

               <div class="help-block"></div>
           </div>

       </div>


   </div>





    <?php ActiveForm::end(); ?>
</div>


</div>



<script>


function myFunction2(name) {



    if(name == 1){
    $('.one').css("display","block")

    $('.two').css("display","none")
    }
    if(name == 0){
        $('.two').css("display","block")

        $('.one').css("display","none")
    }

}



</script>