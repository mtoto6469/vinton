


<?php
if(isset($factors) && $factors!=null){
    $id_user=\frontend\models\Profile::find()->where(['id_user'=>$factors->id_user])->one();
    if(    $id_user!=null) {


        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-2">

                    <img src="<?= Yii::$app->request->hostInfo ?>/frontend/web/images/asiateck.jpg" height="74"
                         width="161"/>
                </div>
                <div class="col-md-8">
                    <p class="p-center">فرم قرارداد اینترنت پر سرعت آسیاتک(عاملیت فروش وینتون)</p>
                </div>
                <div class="col-md-2">

                    <img src="<?= Yii::$app->request->hostInfo ?>/frontend/web/images/vinton.png" height="58"
                         width="130"/>
                </div>
            </div>

        </div>
        <div class="container">
        <p> شرکت انتقال داده های آسیاتک به شماره پروانه :16-94-100</p>

        <table style="width: 100%;">
            <tr style="width: 100%;">
                <th style=" width: 17%;border: 1px solid black;">نوع خدمات: <?= $factors->type ?> </th>

                <?php
                if($factors->vazeyat_sabt == 0){?>
                    <th style=" width: 17%;border: 1px solid black;">وضیعت ثبت نام:بیش ثبت نام  </th>

                    <?php
                }elseif($factors->vazeyat_sabt == 1){?>
                    <th style=" width: 17%;border: 1px solid black;">وضیعت ثبت نام:  ثبت نهایی</th>
                    <?php

                }
                ?>


                <?php
        if ($factors->type == 'adsl' || $factors->type == 'vdsl') {

            $exp = explode('_', $factors->eshterak);
            $markaz = \frontend\models\TblPhone::find()->where(['pishshomare' => $exp[0]])->andWhere(['sabtenam'=>$factors->type ])
                ->all();
            if ($markaz != null) {

                foreach ($markaz as $mn) {
                    if ($mn->reng_az <= $exp[1] && $mn->reng_ta >= $exp[1]) {
                        ?>

                        <th style="width: 24%;border: 1px solid black;"> مرکز مخابراتی: <?= $mn->name_markaz ?></th>
                        <?php
                    }

                } ?>

                <?php
            } else {
                ?>
                <th style="width: 24%;border: 1px solid black;"> مرکز مخابراتی: __</th>
                <?php
            }

        }
            ?>


                <th style="width: 25%;border: 1px solid black;"> شماره اشتراک: <?= $factors->eshterak ?></th>
<!--                <th style="width: 17%;border: 1px solid black;">کلمه عبور:</th>-->
                <th style="width: 17%;border: 1px solid black;"> تاریخ: <?= $factors->date_farsi ?></th>
            </tr>
        </table>
        <p class="p-button">مشخصات فروشنده</p>


        <div class="main-field">
            <label style="margin: 5px;">نام شخص حقوقی/حقیقی:شرکت انتقال داده های آسیاتک(عاملیت فروش وینتون)</label>
            <label style="margin-right: 250px; margin-left: 200px"> شماره
                تماس:<?= $id_user->cellphone . '_' . $id_user->phone ?> </label>
            <label style="margin-right: 5px;"> کارشناس فروش:<?= $id_user->name . $id_user->lastname ?></label>
            <label style="margin-right: 300px;">کارشناس ثبت نام:</label>
            <label style="margin-right: 300px;"> طریقه ی آشنایی:</label>
        </div>
        <p class="p-button">مشخصات استفاده کننده</p>
        <table class="row-table1-table">
            <tr class="row-table1">
                <th><p>نام : <?= $factors->name ?></p></th>
                <th><p>شماره شناسنامه : <?= $factors->shenasname ?></p></th>
                <th><p>نام پدر : <?= $factors->name_pedar ?></p></th>
                <th><p>محل صدور : <?= $factors->mahale_sodur ?></p></th>
            </tr>
            <tr class="row-table1">
                <td><p>نام خانوادگی : <?= $factors->lastname ?></p></td>
                <td><p>تاریخ تولد : <?= $factors->tarikh_tavalod ?></p></td>
                <td><p>کد ملی : <?= $factors->codemeli ?></p></td>
                <td></td>
            </tr>
        </table>

        <?php
        if ($factors->type == 'adsl' || $factors->type == 'vdsl') {?>

        <p class="p-button">مشخصات صاحب خط</p>
        <table class="row-table1-table">
            <tr class="row-table-2">
                <th><p>نام و نام خانوادگی مالک خط : <?= $factors->name_malek . $factors->lastname_malek ?></p></th>
                <th><p>کد ملی : <?= $factors->codemeli_malek ?></p></th>

            </tr>
        </table>

        <?php
    }
            ?>
            <p class="p-button">اطلاعات تماس</p>
            <table class="table3">

                <tr>
                    <th style="width: 40px;"><p>شماره همراه : <?= $factors->cellphone ?></p></th>
                    <th style="width: 30px;"><p> کد پستی :<?= $factors->codeposti ?> </p></th>
                    <th style="width: 40px;"><p>ایمیل : <?= $factors->email ?></p></th>
                    <?php
                    if($factors->vazeyat_sabt == 0){?>

                        <th style=" width: 100px!important;border: 1px solid black;">شماره تلفن:<?=$factors->phone?>  </th>
                        <?php
                    }?>
                </tr>


                <tr>
                    <td style="border-left:0; "><p>آدرس محل قرار داد : <?= $factors->adress ?></p></td>
                    <td style="border-left: 0;border-right:0; "></td>
                    <td style="border-right:0; "></td>
                </tr>

            </table>
            <p class="p-button">اطلاعات افزوده</p>
            <table class="table-first">
                <tr>
                    <th style="width: 30%;">
                        <p>مدرک شناسایی :  <img style="width: 25px" src="<?=Yii::$app->request->hostInfo?>/upload/"<?=$factors->ax_shenasaee?>></p></th>
                    <?php
                 if ($factors->type == 'adsl' || $factors->type == 'vdsl' || $factors->type == 'td-lte') {


                     $expl=explode(',',$factors->id_added);
                     $count=count($expl);
                    $servic='__';
                     $nasb=0;
                     $modem=0;
                     $ip=0;
                         for ($i=0;$i<$count;$i++){

                             $search=\frontend\models\TblAddedInformation::find()->where(['sabtnam'=>$factors->type])
                           ->andWhere(['id'=>$expl[$i]])->one();

                             if($search!=null){
                                 if($search->name='مودم'){
                                     $modem++;
                                     if($search->service != 'void' || $search->service!='null' ){
                                         $servic=$search->service;
                                     }

                                 }elseif ($search->name='نصب'){
                                     $nasb++;
                                 }else{
                                     $ip++;
                                 }
                             }
                     }
                     if($modem != 0){?>
                     <th style="width: 20%;"><p>مودم : دارد</p></th>
                     <?php
                 }else{
                         ?>
                     <th style="width: 20%;"><p>مودم : ندارد</p></th>
                     <?php
                 }

                     if($ip!= 0){?>
                         <th style="width: 20%;"><p>سرویس IP : دارد</p></th>
                         <?php
                     }else{?>
                         <th style="width: 20%;"><p>سرویس IP : ندارد</p></th>
                         <?php
                     }

                     if($nasb != 0){?>
                         <th style="width: 20%;"><p>نصب : دارد</p></th>
                         <?php
                     }else{?>
                         <th style="width: 20%;"><p>نصب : ندارد</p></th>
                         <?php
                     }

                     ?>





                </tr>
            </table>
            <div class="div-table">
                <p>نوع مودم :<?=$servic?></p>
                <div class="h-line"></div>


                <?php

                }?>
                <?php

                ?>
                <p>نوع طرح :</p>
                <p>نام WIFI :</p>
                <div class="v-line"></div>
                <div class="tozihat">توضیحات :<?=$factors->discription?></div>
            </div>

            <p class="p-button">اطلاعات مالی</p>
            <div class="div-table2">
                <div class="row">
                    <div class="col-md-4">
                        <p>جمع فاکتور :<?=$factors->price?> تومان</p>
                        <div class="h-line1"></div>

                        <?php
                        if( $factors->ersal_barge_telegram  == 1){?>
                            <p>  ارسال برگه ثبت نام از طریق تلگرام : دارد</p>
                            <?php

                        }else{?>
                            <p>  ارسال برگه ثبت نام از طریق تلگرام : ندارد</p>

                            <?php
                        }
                        ?>
                        <div class="h-line2"></div>


                        <?php
                        if( $factors->ersal_mablaq_payamak == 1){?>
                            <p>   ارسال مبلغ از طریق پیامک : دارد</p>
                            <?php

                        }else{?>
                            <p>   ارسال مبلغ از طریق پیامک : ندارد</p>

                            <?php
                        }
                        ?>

                        <div class="v-line1"></div>
                    </div>
                    <div class="col-md-5">
                        <p>هزینه خام سرویس :</p>
                        <p>هزینه با احتساب مالیات و ارزش افزوده :</p>
                        <p>هزینه کارشناس نصب :</p>
                    </div>
                    <div class="col-md-3">
                        <p>هزینه مودم :</p>
                        <p>سایر خدمات :</p>
                    </div>
                </div>
            </div>
            <br>
            <p>اینجانب با تایید موارد بالا و آگاهی کامل از شرایط استفاده از سرویس های مورد درخواست متقاضی دریافت خدمات
                فوق هستم.خاطر نشان می گردد متن کامل قرار داد مشترکین در سایت 1544 قابل رویت می باشد</p>
            <br>
            <table class="table-hidden">
                <tr>
                    <th>نام ونام خانوادگی :</th>
                    <th>تاریخ :</th>
                    <th>مهر وامضا خرید :</th>
                    <th>مهر و امضا تحویل :</th>
                </tr>
            </table>

            <div class="h-dotid"></div>


            <img src="images/32.png" height="32" width="32"/><h4 class="inline-block">ملاحظات</h4>
            <p></p>
            <ul class="ul-style">
                <li>
                    <p>مدت زمان راه اندازی متغییر و بسته به حجم کاری مرکز مخابراتی شما می باشد و در صورت بروز مشکل شما
                        می توانیید کلییه مراتب را از طریق راه های ارتباطی پیگیری نمائید.</p>
                </li>

                <li><p>در صورت خریداری نشدن مودم در هنگام ثبت نام هزینه آن در هنگام نصب گرفته میشود و قیمت آن بسته به
                        قیمت روز محاسبه میگردد.به صورت کلی تهیه مودم از طریق نمایندگی به صورت اجبار نیست.در صورت خریداری
                        شدن مودم در هنگام ثبت نام و بروز مشکلاتی از قبیل ندادن سرویس به شماره معرفی شده و اگر مودم باز
                        شده باشد 30% از قیمت آن کاسته میشود و مابقی مبلغ عودت داده می شود.</p>
                </li>
                <li><p>در صورت انصراف از قرار داد فوق مبلغ هزینه راه اندازی اولیه به هیچ عنوان عودت داده نمی شود، چون پس
                        از عقد قرار داد فوق مبلغ به حساب شرکت واریز می گردد.</p></li>

                <li><p>در صورت بروز مشکل بعد از نصب جهت پشتیبانی 24 ساعته با شماره 1544 تماس حاصل نموده و یا در ساعات
                        اداری شما ، می توانید با شماره عاملیت 33140740 ویا 77174940 تماس حاصل نمایید، تا کارشناسان فنی
                        به بررسی مشکل بپردازند.</p></li>

                <li><p class="inline-block">برای بهره مندی از سرویس های ویژه و یا معرفی مشترک و دریافت سرویس های ویژه
                        لطفا فقط مراتب مربوط را از طریق کارشناس مربوطه که در بالای صفحه نام ایشان ذکر شده تماس حاصل
                        فرمایید.</p></li>
            </ul>
            <h3>کانال های ارتباطی</h3>
            <div class="row">
                <div class="col-md-3">
                    <img src="<?= Yii::$app->request->hostInfo ?>/frontend/web/images/chanel-asia.png" height="115"
                         width="99"/>
                    <a class="asiateck" href="http://www.1544.ir">www.1544.ir</a>
                    <label class="asico">@asiateckco</label>
                    <label class="asia-ir">asiatech.ir</label>
                </div>
                <div class="col-md-9"></div>
                <div class="col-md-3">

                    <img class="vinton-chanel"
                         src="<?= Yii::$app->request->hostInfo ?>/frontend/web/images/chanel-vinton.png" height="118"
                         width="96"/>
                    <a class="vinton-link" href="http://www.vinton.ir">www.vinton.ir</a>
                    <label class="vinton-club">@vintonclub</label>
                    <label class="vinton-club2">vintonclub</label>
                </div>
            </div>

        </div>


        <?php
    }
}
?>

<div style="padding: 5%">





</div>