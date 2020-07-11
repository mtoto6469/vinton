<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use common\components\jdf;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$sesssion = Yii::$app->session;
if (!$sesssion->isActive) {
    $sesssion->open();
}
if (isset($_SESSION['error'])){
    if( $_SESSION['error']!= null){
        echo'<div class="alert alert-danger">'. $_SESSION['error'].'</div>';

    }$_SESSION['error']= null;
}


$this->title = 'ثبت نام';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">


    <?php $form = ActiveForm::begin([]); ?>



    <div class="col-lg-6 col-md-6">

            <?= $form->field($model, 'username')->textInput(['value'=>''])->label('نام کاربری') ?>

            <?= $form->field($model, 'password')->passwordInput(['value'=>''])->label('پسورد') ?>

            <?= $form->field($model, 'email')->label('ایمیل خود را وارد کنید') ?>

            <?= $form->field($model, 'roles')->dropDownList($roles, ['prompt'=>'نقش کاربر را مشخص کنید.',])->label('') ?>


           <?= $form->field($model, 'ostan')->dropDownList($ostan,['prompt'=>'انتخاب کنید','onchange'=>'getcity()'])->label('استان') ?>


                 <div id="city">
                        <div class="form-group  required">
                    <label class="control-label" >شهر</label>
                        <select id="signupform-city" class="form-control" name='city3' aria-required="true">

                    <option value="0">انتخاب کنید</option>


                   </select>

                    <div class="help-block"></div>
               </div>
               </div>


        <?= $form->field($model, 'cellphone1')->textInput()->label('تلفن همراه') ?>
        <span style="color:darkred" id="result_mob"></span>

        <?= $form->field($model, 'phone')->textInput()->label('تلفن ثابت')  ?>

        <?= $form->field($model, 'id_phone')->dropDownList($name_markaz,['prompt'=>'انتخاب کنید'])->label('مرکز فعالیت مورد نظر')  ?>

        <?= $form->field($modelupload, 'imageFile2')->fileInput()->label('آپلود عکس کارت ملی')  ?>

        </div>

        <div class="col-lg-6 col-md-6">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('نام خود را وارد کنید')  ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true])->label('نام خانوادگی خود را وارد کنید') ?>

            <?= $form->field($model, 'semat')->dropDownList([
                'prompt'=>' انتخاب کنید',
                '0'=>' کارشناس فروش',
                '1'=>' کارشناس نصب',
                '2'=>' کارشناس نصب درصدی',
                '3'=>' کارشناس ثبت نام',
                '4'=>' عاملین فروش',
            
            
            
            ])->label('سمت')  ?>



            <?= $form->field($model, 'namepedar')->textInput(['maxlength' => true])->label('نام پدر را وارد کنید')  ?>

            <?= $form->field($model, 'codemeli')->textInput()->label('کدملی را وارد کنید')  ?>

            





            <?= $form->field($model, 'id_mantaqe')->dropDownList($reng,['prompt'=>'انتخاب کنید'])->label('تعیین محدوده') ?>



            <?= $form->field($model, 'saatkari_az')->dropDownList(
                [
                    'prompt'=>'انتخاب کنید',
                    '01:00'=>'01:00',
                    '02:00'=>'02:00',
                    '03:00'=>'03:00',
                    '04:00'=>'04:00',
                    '05:00'=>'05:00',
                    '06:00'=>'06:00',
                    '07:00'=>'07:00',
                    '08:00'=>'08:00',
                    '09:00'=>'09:00',
                    '10:00'=>'10:00',
                    '11:00'=>'11:00',
                    '12:00'=>'12:00',
                    '13:00'=>'13:00',
                    '14:00'=>'14:00',
                    '15:00'=>'15:00',
                    '16:00'=>'16:00',
                    '17:00'=>'17:00',
                    '18:00'=>'18:00',
                    '19:00'=>'19:00',
                    '20:00'=>'20:00',
                    '21:00'=>'21:00',
                    '22:00'=>'22:00',
                    '23:00'=>'23:00',
                    '00:00'=>'00:00',



                ]
            )->label('ساعت کاری از:')  ?>

            <?= $form->field($model, 'saatkari_ta')->dropDownList(
                [
                    'prompt'=>'انتخاب کنید',
                    '01:00'=>'01:00',
                    '02:00'=>'02:00',
                    '03:00'=>'03:00',
                    '04:00'=>'04:00',
                    '05:00'=>'05:00',
                    '06:00'=>'06:00',
                    '07:00'=>'07:00',
                    '08:00'=>'08:00',
                    '09:00'=>'09:00',
                    '10:00'=>'10:00',
                    '11:00'=>'11:00',
                    '12:00'=>'12:00',
                    '13:00'=>'13:00',
                    '14:00'=>'14:00',
                    '15:00'=>'15:00',
                    '16:00'=>'16:00',
                    '17:00'=>'17:00',
                    '18:00'=>'18:00',
                    '19:00'=>'19:00',
                    '20:00'=>'20:00',
                    '21:00'=>'21:00',
                    '22:00'=>'22:00',
                    '23:00'=>'23:00',
                    '00:00'=>'00:00',



                ]
            )->label('ساعت کاری تا:')  ?>

          
            


            <?= $form->field($model, 'shomarepersenel')->textInput(['maxlength' => true])->label('شماره پرسنلی')  ?>

           

      

        

            <?= $form->field($modelupload, 'imageFile')->fileInput()->label(' آپلود عکس پرسنلی ')  ?>






            
</div>

        <?= $form->field($model, 'hoquq')->textInput(['autofocus' => true])->label('حقوق') ->hint('لطفا به ریال وارد کنید') ?>
        <?= $form->field($model, 'adress')->textarea(['autofocus' => true])->label('آدرس را وارد کنید')  ?>







        <div class="form-group" style="padding: 2%">
            <?= Html::submitButton('ثبت نام', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
        </div>


        <?php ActiveForm::end(); ?>

</div>

  </div>


<script>

    function getcity() {
        var name = $('#signupform-ostan').val();
  

        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/city') ?>',
            data: {name: name},
            success: function (data) {

                $('#city').html(data);
            }
        });



    }
</script>