<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;

$url= Yii::$app->urlManager;?>


   
   <body class="my-font">
    <div class="container container-background">

        <div class="col-md-12" style="height: 50px;margin-top:10px;background: #006599;border: 2px solid #002180">
            <div class="col-md-6 col-xs-12">
                <div class="col-xs-4"><input placeholder="پیش شماره"  style="width: 100%;font-family: Tahoma;font-size: 12px;padding: 2px;margin-top: 10px"></div>
                <div class="col-xs-1" style="padding: 0 0 ;margin-top: 10px"> <span style="color: white;font-size: 12px;float: right;">تلفن:</span></div>
                <div class="col-xs-4" ><input   style=" width: 80%;margin-top: 10px"><img src="../../web/images/icon/phone.png"   style=" width: 15%;margin-right: 2%;"></div>

            </div>

        </div><!--end blue head-->
        <?php $form = ActiveForm::begin([]); ?>

        <div class="col-xs-12" style="background: #2e4d7b;height: 30px;margin-top: 25px;border-bottom: 5px solid #57cdfd;">
            <span style="color: white;font-size: 13px;">جستجو بر اساس استان و شهر</span>
        </div>

        <div class="col-md-12" style="height: 50px;margin-bottom:10px ;background: #006599;border: 2px solid #002180">
            <div class="col-md-8 col-xs-12">


                <ul style="list-style: none;display:inline-block;margin-right: -30px;" >
                    <li style="display:inline-block;color: white ">
                                     استان:
                    </li>
                    <li style="display:inline-block; width: 150px">
                         <select  style=" width: 100%;margin-top: 10px" name="ostan" onchange="getFunction(this.value)" >

                             <option value="1"  >همه</option>
                             <?php
                             
                             foreach ($ostan as $o){?>

                                 <option value="<?=$o->name?>"><?=$o->name?></option>
                                 
                         <?php
                             }?>



                         </select>

                    </li>
                    <li style="display:inline-block; color: white ">
                       شهر:
                    </li>

                    <li style="display:inline-block; width: 150px">
<div id="city" >
                        <select  style=" width: 100%;margin-top: 10px" name="shahr" onchange="getFunction2(this.value,0)"  >

                            <option value="1">همه</option>


                        </select>

    </div>
                    </li>
                    <li style="display:inline-block;color: white  ">
                     نام مرکز:
                    </li>



                    <li style="display:inline-block; width: 150px">
                        <div id="markaz">
                        <select  style=" width: 100%;margin-top: 10px" name="name_markaz">

                            <option value="1">همه</option>


                        </select>
                            <div id="markaz">
                    </li>
                    <li style="display:inline-block">
                        <button style="background: none!important;border: none!important;"><img src="../../web/images/icon/search.png"   style=" width: 30px;margin-right: 2%;"></button>
                    </li>


            </div>

        </div><!--end blue head-->

    <?php ActiveForm::end(); ?>




        <div class="col-xs-12" style="background: #5077ae;height: 35px;border-top: 1px solid black;border-bottom: 5px solid #006b8f;">
            <span style="color: #d35b5c;font-size: 14px;"><b>مشاهده همه نتایج جستجو</b></span>
        </div>



        <!--نتایج جستجو-->

        <div class="col-xs-12 natayej" >

            <div class="col-xs-12 x-height" style="height: 25px;background: red;padding: 0 0 ;">
                <div class="col-xs-1"  > </div>
                <div class="col-xs-3"  > <h6>مرکز مخابراتی</h6></div>

                <div class="col-xs-1"  > <h6>کد شهر</h6> </div>
                <div class="col-xs-2"  > <h6>از شماره</h6></div>
                <div class="col-xs-2"  > <h6>تا شماره</h6> </div>
                <div class="col-xs-1"  > <h6>وضعیت</h6></div>
                <div class="col-xs-2"  > <h6> وضعیت فروش</h6></div>


            </div>

            <?php


            if($tblphone != null){

                foreach ($tblphone as $tp){?>

            <!--استان-->
<!--                    <ul>-->
<!---->
<!--                        <li></li>-->
<!--                        <li></li>-->
<!--                        <li></li>-->
<!--                        <li></li>-->
<!--                        <li></li>-->
<!---->
<!---->
<!--                    </ul>-->
            <div class="col-xs-12" style="background: #d6e6f6;padding: 0 0 ;">
                <div class="col-xs-1" id="ostan" style="padding: 0 0 ;text-align: center;"> <img  src="../../web/images/icon/mosalas2.png" style="width: 8px;"></div>
                <div class="col-xs-11 span-font" style="padding: 0 0;border-bottom: 1px solid #006b8f;"><span style="">استان:</span>&nbsp;&nbsp;<span style=""><?=$tp->ostan?></span></div>
            </div>
            <!--پایان استان-->

            <!--togle with ostan-->
            <div class="col-xs-12" id="togle-ostan" style="padding: 0 0 ;margin: 0 0 ;">

                <!--شهرستان اول-->
                <div class="col-xs-12" style="background: #d6e6f6;padding: 0 0 ;">
                    <div class="col-xs-1"  id="shahr1" style="padding: 0 0 ;direction: ltr;padding-left: 3%!important;"> <img src="../../web/images/icon/mosalas2.png" style="width: 8px;"></div>
                    <div class="col-xs-11 span-font" style="padding: 0 0;border-bottom: 1px solid #B4B4B4;padding-right: 18px!important;"><span style="">شهر:</span>&nbsp;&nbsp;<span style=""><?=$tp->shahr?></span></div>
                </div>
                <!--شهرستان اول پایان-->

                <!--toggle shahr-->
                <div class="col-xs-12" id="shahr1-toggle" style="padding: 0 0;">

                    <!--مشخصات مرکز اول-->

                    <!--togel markaz1-->
                    <div class="col-xs-12" id="markaz-toggle" style="padding: 0 0 ;">
                        <div class="col-xs-12 markaz-class" style="padding: 0 0 ;">

                            <div class="col-xs-1" style="height: 25px;border: none;background: #d6e6f6;" > </div>
                            <div class="col-xs-3"  > <h6>پاکنی اراک</h6></div>

                            <div class="col-xs-1"  > <h6>086</h6> </div>
                            <div class="col-xs-2"  > <h6>3347813</h6></div>
                            <div class="col-xs-2"  > <h6>3347820</h6> </div>
                            <div class="col-xs-1"  > <h6>فعال</h6></div>
                            <div class="col-xs-2"  > <h6>0</h6></div>



                        </div>

                        <div class="col-xs-12 markaz-class markaz-class2" style="padding: 0 0 ;background: #d3dde9;">

                            <div class="col-xs-1" style="height: 25px;border: none;background: #d6e6f6!important;" > </div>
                            <div class="col-xs-3"  > <h6>پاکنی اراک</h6></div>
                            <div class="col-xs-1"  > <h6>086</h6> </div>
                            <div class="col-xs-2"  > <h6>3354844</h6></div>
                            <div class="col-xs-2"  > <h6>3344550</h6> </div>
                            <div class="col-xs-1"  > <h6>فعال</h6></div>
                            <div class="col-xs-2"  > <h6>0</h6></div>



                        </div>

                    </div>


                    <!--مشخصات مرکز اول پایان-->





                </div><!--toggle shahr-->


            </div><!--end toggle city3-->

            <!--مشخصات مرکز دوم پایان-->





            <?php
                }
            }
            else{

                echo '<div class="alert alert-danger">برای این شهر و این استان هیچ مرکز مخابراتی وجود ندارد</div>' ;
            }



            ?>



        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>



    </body>
</html>

<script>

    function getFunction(name) {



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

<script>

    function getFunction2(name,ostan) {



        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/markaz') ?>',
            data: {name: name,ostan:ostan},
            success: function (data) {

                $('#markaz').html(data);
            }
        });



    }

</script>

