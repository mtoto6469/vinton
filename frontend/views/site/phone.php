<?php use yii\widgets\ActiveForm;

$this->beginPage() ?>
<?php $url= Yii::$app->urlManager;

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

<?php $form = ActiveForm::begin(); ?>

<?php

if(isset($pish) && isset($sh) && $pish!=null & $sh!= null){?>
    <input value="<?=$pish?>" style="color: black;visibility: hidden" id="one11">
    <input value="<?=$sh?>" style="color: black;visibility: hidden" id="two11">

<?php   }

?>
<div class="frist">
    
   <div class="big_div">

      <div class="search_phone">

         <ul>

            <li>




               <select  style="width: 120px;color: black" id="one" name="one_1">

                  <option value="">پیش شماره</option>

                   <?php

                   foreach ($pishshomare as $pish){?>

                       <option value="<?=$pish->pishshomare?>"><?=$pish->pishshomare?></option>

                       <?php
                   }?>

               </select>
            </li>
            <li>

               تلفن:
               <input  style="width: 120px;height: 25px; color: black" id="two" name="two_2">

            </li>
            <li>

             <button type="submit" name="btn" value="phon"><img style="width: 25px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/phone.png" onclick="getShomare()"></button>

            </li>



         </ul>


      <div>

         <table class="table1">


             <tr>
                 <th>استان</th>
                 <th>شهر</th>
                 <th>مرکز مخابراتی</th>
                 <th>وضعیت</th>
                 <th>وضعیت فروش</th>
                 <th>ویرایش</th>
                 <th>ثبت نام</th>

             </tr>

<?php

if($search !='0'){?>


    <td><?=$search->ostan?></td>
    <td><?=$search->shahr?></td>
    <td><?=$search->name_markaz?></td>
    <td><?php

       if($search->vaziyat == 0) {
      echo 'غیرقابل پوشش';
       }elseif($search->vaziyat == 1){
           echo 'قابل پوشش';
       }elseif($search->vaziyat == 2){
           echo 'غیرمحدود';
       }elseif($search->vaziyat == 3){
           echo 'محدود';
       }



        ?></td>
    <td><?php

        if($search->vaziyat_forosh == 0) {
            echo 'غیرقابل فروش';
        }elseif($search->vaziyat_forosh == 1){
            echo 'قابل فروش';
        }
        ?></td>

    <td><button>ویرایش</button></td>
    <td><button type="button"  class="" data-toggle="modal" data-target="#myModal" onclick="getModal()">ثبت نام</button></td>

<?php
}
else{?>
                 <td>__</td>
                 <td>__</td>
                 <td>__</td>
                 <td>__</td>
                 <td>__</td>
                 <td>__</td>
                 <td>__</td>
<?php
             }

?>








         </table>





      </div><!-- END search_phone-->


   </div><!-- END big_div-->


      <div class="search_ostan_shahr1" style="margin-top: 20px">

         <div class="titel">جستجو بر اساس استان و شهر</div>

      </div><!-- END search_ostan_shahr-->



      <div class="search_phone">

         <ul>

            <li>



                <select  style=" width: 150px;margin-top: 10px;color:black" name="ostan" onchange="getFunction(this.value)" >
استان:
                    <option value="1"  >همه</option>
                    <?php

                    foreach ($ostan as $o){?>

                        <option value="<?=$o->name?>"><?=$o->name?></option>

                        <?php
                    }?>



                </select>

            </li>
            <li>

                <div id="city" >
                    <select  style="width: 150px;margin-top: 10px;color:black" name="shahr" onchange="getFunction2(this.value,0)"  >
شهر:
                        <option value="1">همه</option>


                    </select>

                </div>
            </li>

             <li>

                 <div id="markaz">
                     <select  style="width: 150px;margin-top: 10px;color:black" name="name_markaz">

                         <option value="1">همه</option>


                     </select>


   </div><!--end blue head-->

             </li>

            <li>

               <button type="submit" name="btn" value="search11"><img style="width: 25px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/search.png"></button>

            </li>

         </ul>

      </div><!-- END search_phone-->








       <div class="search_ostan_shahr1">

           <div class="titel">مشاهده همه نتایج جستجو</div>

       </div><!-- END search_ostan_shahr1-->
       <div class="just_color">

           <div class="ul_list">

               <ul>
                   <li style="margin-right: -1%!important;color: #0d70b7">مرکز مخابراتی</li>
                   <li  style="color: #0d70b7">کد شهر</li>
                   <li style="color: #0d70b7">از شماره</li>
                   <li style="color: #0d70b7">تا شماره</li>
                   <li style="color: #0d70b7">وضعیت</li>
                   <li style="color: #0d70b7">وضعیت فروش</li>
                 
               </ul>

               <ul class="ul_tow  "id="ulxx">

<?php 

if($tblphone!=null) {


    foreach ($tblphone as $tbp) {


        $x = \frontend\models\TblPhone::find()->where(['ostan' => $tbp->ostan])->andWhere(['enable' => '1'])->andWhere(['enableview' => '1'])->all();
        if ($x!= null) {

            foreach ($x as $itemx) {

                $y = \frontend\models\TblPhone::find()->where(['ostan' => $tbp->ostan])
                    ->andWhere(['shahr' => $itemx->shahr])->andWhere(['enable' => '1'])->andWhere(['enableview' => '1'])->all();

                if ($y != null) {
                    $i=0;
                    foreach ($y as $itemy) {
//
//                        $z = \frontend\models\TblPhone::find()->where(['ostan' => $tbp->ostan])->andWhere(['shahr' => $itemx->shahr])
//                            ->andWhere(['name_markaz' => $itemy->name_markaz])->andWhere(['enable' => '1'])->andWhere(['enableview' => '1'])->all();
//                        if ($z != null) {

//                            foreach ($z as $itemz) {
                                ?>


                                <li><a href="#"><img style="width:15px; padding-left:5px"
                                                     src="<?= Yii::$app->request->hostInfo ?>/frontend/web/images/icon/mosalas1.png">استان :<?= $itemy->ostan ?>
                                    </a>
                                    <ul style="text-align: right;margin-left: 5px!important;">
                                        <li style="margin-right: 10px!important;border-top: 1px solid #2e4d7b">
                                            <a href="#"><img class="aa" style="width:15px; padding-left:5px"
                                                             src="<?= Yii::$app->request->hostInfo ?>/frontend/web/images/icon/mosalas1.png">شهر
                                                :<?= $itemy->shahr ?>
                                            </a>
<!--                                            <ul style="text-align: right;margin-left: 10px!important">-->
<!--                                                <li style="border-top: 1px solid rgba(0,0,0,.4);margin:8px!important;">-->
<!--                                                    <img style="width:15px; padding-left:5px"-->
<!--                                                         src="--> <!--/frontend/web/images/icon/mosalas1.png">مرکز-->
<!--                                                    :-->


                                                    <div class="span7 overflo">
                                                        <div class="widget stacked widget-table action-table">

                                                            <div class="widget-content">
                                                                <table class="table table-striped ">
                                                                    <tbody>
                                                                    <?php
                                                                    if($i % 2 == 0){?>
                                                                        <tr>

                                                                            <td class="o1"><?=$itemy->name_markaz?></td>
                                                                            <td class="o1"><?=$itemy->pishshomare?></td>
                                                                            <td class="o1"><?=$itemy->reng_az?></td>
                                                                            <td class="o1"><?=$itemy->reng_ta?></td>
                                                                            <td class="o1"><?=$itemy->vaziyat?></td>
                                                                            <td class="o1"><?=$itemy->vaziyat_forosh?></td>
                                                                        </tr>
                                                                        <?php

                                                                    }else{?>
                                                                        <tr>

                                                                        <td class="o"><?=$itemy->name_markaz?></td>
                                                                        <td class="o"><?=$itemy->pishshomare?></td>
                                                                        <td class="o"><?=$itemy->reng_az?></td>
                                                                        <td class="o"><?=$itemy->reng_ta?></td>
                                                                        <td class="o"><?=$itemy->vaziyat?></td>
                                                                        <td class="o"><?=$itemy->vaziyat_forosh?></td

                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>


                                                                    </tbody>
                                                                </table>
                                                            </div> <!-- /widget-content -->
                                                        </div> <!-- /widget -->
                                                    </div>
<!--                                                </li>-->

<!--                                            </ul>-->
                                        </li>
                                    </ul>
                                </li>
                                <?php

                    }
                }
            }
        }

    }
}

?>


                 

               </ul>


           </div>
       </div><!-- END just_color-->
   </div><!-- END frist-->
<!---------------modal------------------------->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->

                <div style="padding: 1px;background: #fff;">
                    <button type="button" class="close" data-dismiss="modal" style="color: #000;">&times;</button>
                   <div class="modal-header" style="background: #4c7cac">
                       <form style="background: #ffe6cd; text-align: center;">
                           <input style="margin-top: 12px;" type="radio" name="avdsl" value="adsl" id="avdsl" > &nbsp;<span style="color: black;">adsl </span>
                           <input style="margin-top: 12px;" type="radio" name="avdsl" value="vdsl" id="avdsl">&nbsp;<span style="color: black;">vdsl </span>
                           <!--end radio-->
                       </form>
                   </div>

                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <input name="pishshomare" style="display: none" id="pishshomare" >
                    <input name="shomare" style="display: none" id="shomare">

<!--                    Modal body..-->
                    <div class="col-xs-12 onvan" ><b>اطلاعات اولیه مشترک</b></div>
                    <div class="col-xs-12 input_title first_row_we" >

                        <!--ستون اول -->
                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <h6> اشتراک</h6><br>

                            <h6>تاریخ تولد</h6>
                        </div>

                        <!--ستون دوم -->
                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <input style="width: 65%;" id="two22" disabled  >

                            &nbsp;- &nbsp;

                            <input style="background: white;width: 20%;" id="one22" disabled name="shomare" >

                            <br>

                            <input style="margin-top:13px; background: white;width: 80%" name="tarikh_tavalod" ><br>





                        </div>
                        <!--ستون سوم -->
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                            <h6>نام خریدار</h6>
                            <br><h6>سند هویت</h6>
                            <br><h6>محل تولد</h6>
                        </div>

                        <!--ستون چهارم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <input style="width: 80%;margin-top: 6px;" name="name"> <br>
                            <input  placeholder="کد ملی" style="margin-top: 1px;width: 60%;" name="codemeli"><br>
                            <input style="width: 80%;margin-top: 1px;" name="mahale_sodur"><br>

                        </div>

                        <!--ستون پنجم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <h6>نام خانوادگی خریدار</h6>  <br>
                          <h6>شماره شناسنامه</h6><br>
                          <h6>نام پدر</h6><br>

                        </div>

                        <!--ستون ششم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" >


                            <input style="width: 80%;margin-top:5px;" name="lastname">
                            <input style="width: 80%;margin-top: 5px;" name="shenasname">
                            <input style="width: 80%;margin-top:5px;" name="namepedar">
                            <br>



                        </div>


                    </div><!--پایان سطر اول-->




                    <!--secend row-->
                    <div class="col-xs-12 onvan" ><b>اطلاعات صاحب خط</b></div>
                    <div class="col-xs-12 title_color" >


                        <!--ستون اول -->
                        <div class="col-xs-6 col-sm-6 col-md-2" ><h6>نام</h6></div>

                        <!--ستون دوم -->
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                            <input style="width: 85%;margin-top: 7px;margin-bottom: 5px;" name="name_malek">


                        </div>
                        <!--ستون سوم -->
                        <div class="col-xs-6 col-sm-6 col-md-2" ><h6>نام خانوادگی</h6></div>

                        <!--ستون چهارم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                            <input style="width: 85%;margin-top: 7px;margin-bottom: 5px;" name="lastname_malek">
                        </div>

                        <!--ستون پنجم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" ><h6>کد ملی</h6></div>

                        <!--ستون ششم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                            <input style="width: 85%;margin-top: 7px;margin-bottom: 5px;" name="codemeli_malek">

                        </div>



                    </div>
                    <!---->
                    <div class="col-xs-12 onvan" ><b>اطلاعات تماس</b></div>
                    <div class="col-xs-12 title_color" >


                        <!--ستون اول -->
                        <div class="col-xs-6 col-sm-6 col-md-2" ><h6>پست الکترونیک</h6></div>

                        <!--ستون دوم -->
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                            <input style="width: 85%;margin-top: 8px;" name="email" type="email">


                        </div>
                        <!--ستون سوم -->
                        <div class="col-xs-6 col-sm-6 col-md-2" ><h6>کد پستی</h6></div>

                        <!--ستون چهارم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                            <input style="width: 85%;margin-top: 8px;" name="codeposti">
                        </div>

                        <!--ستون پنجم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" ><h6>موبایل اطلاع رسانی</h6></div>

                        <!--ستون ششم-->
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                            <input style="width: 85%;margin-top: 8px;" name="cellphone">

                        </div>
                        <div class="col-xs-12" style="padding: 0;">
                            <div class="col-xs-6 col-sm-6 col-md-2" ><h6>آدرس محل قرار داد</h6></div>
                            <div class="col-xs-6 col-sm-6 col-md-10" style="direction: rtl">
                                <textarea style="width: 32%;margin-top: 7px;margin-bottom: 5px;" name="adress" rows="1"></textarea>
                            </div>
                        </div>


                    </div><!---اطلاعات تماس تمام-->


                    <!---->
                    <div class="col-xs-12 onvan" ><b>اطلاعات سرویس </b></div>
                    <div class="col-xs-12 title_color" style="height: 35px;">

                        <!--ستون اول -->
                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <input type="radio" name="service_name" value="اینترنت حجمی"  onclick="getservice('اینترنت حجمی')" >اینترنت حجمی
                            <input type="radio" name="service_name" value="اینترنت نامحدود"  onclick="getservice('اینترنت نامحدود')">اینترنت نامحدود




                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <input type="radio" name="service_name" value="اینترنت  غیرحجمی" onclick="getservice('اینترنت  غیرحجمی')">اینترنت  غیرحجمی
                            <input type="radio" name="service_name" value="جشنواره ها" onclick="getservice('جشنواره ها')">جشنواره ها

                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <input type="radio" name="service_name" value="DSLBOX" onclick="getservice('DSLBOX')">DSLBOX
                            <input type="radio" name="service_name" value="سایر سرویس ها" onclick="getservice('سایر سرویس ها')">سایر سرویس ها

                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-2" >


                            <div id="servic"></div>

                        </div>

                    </div>
                    <!---->
                    <div class="col-xs-12 onvan" ><b>اطلاعات افزوده</b></div>
                    <div class="col-xs-12 title_color" >





                        <div class="col-xs-6 col-sm-6 col-md-2" >

                            <input type="checkbox" value="مودم" name="added_name" onclick="getadded('مودم')">مودم
                            <input type="checkbox" value="نصب" name="added_name" onclick="getadded('نصب')">نصب
                            <input type="checkbox" value="سرویس ip" name="added_name" onclick="getadded('سرویس ip')">سرویس ip

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-2" >
                             <div id="added" style="display: none"></div>
                        </div>
                    </div>

                    <!--end backgraund pink-->

<!--                    <div class="col-xs-12" style="height: 30px;">-->
<!--                        <div class="end_backgraund" >-->
<!--                            <button class="btn" style="margin: 0 0 ;border: none;height: 25px;border-radius: 0;padding: 2px 7px;">...Brose</button>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-xs-12" style="height: 30px;">

                        <input type="checkbox" name="vehicle" value="Bike" > <span style="font-size: 12px;">باشرایط <a href="#">آیین نامه</a> موافقم.</span>

                    </div>
                    <div class="col-xs-12" style="height: 30px;text-align: center!important;">

                        <div style="margin: 0 auto; width: 30%;margin-top: 2px;">
                            <button class="btn btn_class_we"  type="submit" name="btn" value="b1">ثبت اطلاعات</button>
                            <button class="btn btn_class_we"  data-dismiss="modal">بستن پنجره</button>
                        </div>
                    </div>


<!--                                        Modal body..-->
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!---------------End modal------------------------->

    <!------ Include the above in your HEAD tag ---------->

    <?php ActiveForm::end(); ?>


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
    
    
<script>

    function getModal() {

        var pish = $('#one11').val();
        var sh = $('#two11').val();

        $('#one22').val(pish)
        $('#two22').val(sh)
        $('#pishshomare').val(pish)
        $('#shomare').val(sh)

    }

</script>
    <script>

        function getservice(name) {
            var type =$('#avdsl').val()



            $.ajax({
                type: 'GET',
                url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/services') ?>',
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

        function getadded(name) {
            var type =$('#avdsl').val()


            if(name == 'مودم'){


                $.ajax({
                    type: 'GET',
                    url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/added') ?>',
                    data: {
                        name: name,
                        type:type
                    },
                    success: function (data) {

                        $('#added').html(data);
                        $('#added').css("display","block");
                    }
                });
            }

      


        }



    </script>