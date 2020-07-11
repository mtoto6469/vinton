<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTarget */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-target-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'id_user',
            'name',
            'lastname',
            'semat',
            'shahr',

//            'namepedar',
            //'codemeli',

            //'cellphone',
            //'phone',
//            'id_phone',
           
            //'saatkari_az',
            //'saatkari_ta',
            //'shomarepersenel',
            //'eshterak',
            //'nahveashnaee',
            //'ax_perseneli',
            //'ax_kartmeli',
            //'adress',
            //'tarikhsabt_karmand',
            //'tarikhsabt_karmand2',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}',


//                'buttons' => [
//
//                    'view' => function ($url) {
//                        return Html::a(
//                            ['profile/index']
//
//                        );
//                    },




//                ],
            ],


        ],

    ]); ?>



    <div class="form-group field-tbltarget-sabtnam required">
        <label class="control-label">تعیین کارشناس مورد نظر</label>
        <input name="taeen_karshenas" value="" type="hidden">
        <div id="tbltarget-sabtnam" aria-required="true">
            <label><input name="TblTarget[type_karshenas]" value="0" type="radio" onclick="getFunction('1')"> کارشناس فروش</label>
            <label><input name="TblTarget[type_karshenas]" value="1" type="radio" onclick="getFunction('2')"> کارشناس نصب</label>

        <div class="help-block"></div>
    </div>

</div>



    <div class="row">
        <div class="col-md-6 col-lg-6">
    <?= $form->field($model, 'id_user')->textInput()->hint('لطفا شناسه کاربر مورد نظر را وارد کنید') ?>




<div class="forosh" style="display: none">

    <?= $form->field($model, 'tagetforosh_mahane')->textInput()->label('تارگت فروش ماهیانه') ?>

</div>
        </div>

        <div class="col-md-6 col-lg-6">


    <div class="row">

        <div class="col-lg-6">
            <div class="form-group field-tbltarget-datefa required ">
                <label class="control-label" for="tbltarget-datefa">    تاریخ این ماه </label>
                <input id="datepicker4" class="form-control" name="TblTarget[datefa]" maxlength="300" aria-required="true" aria-invalid="true" type="text" >
                <div class="hint-block">لطفا تاریخ  ماه جاری را وارد کنید</div>

            </div>
        </div>
        <div class="col-lg-6">

            <div class="form-group field-tbltarget-datefa required ">
                <label class="control-label" for="tbltarget-datefa"> تا  تاریخ </label>
                <input id="datepicker2" class="form-control" name="TblTarget[ta_date_farsi]" maxlength="300" aria-required="true" aria-invalid="true" type="text">
                <div class="hint-block">لطفا تاریخ اعتبار این تارگت را وارد کنید</div>

            </div>
        </div>

    </div>


            <div class="forosh" style="display: none">

            <?= $form->field($model, 'targetforosh_ruzane')->textInput()->label('تارگت فروش روزانه') ?>

            </div>

      </div>

    </div>

        <div class="forosh" style="display: none">
            <?= $form->field($model, 'sabtnam')->radioList([
                'ADSL'=>'ADSL',
                'VDS'=>'VDSL',
                'OWA'=>'OWA',
                'TD-LTE'=>'TD-LTE',
                'NGN' => 'NGN',
                'MVNO' => 'MVNO',
                'CDN' => 'CDN',
                'ICD' => 'ICD',
                'IPTV' => 'IPTV(AOD-VOD)',
                'VPN' => 'VPN',
                'Domain' => 'Domain',
                'Host' => 'Host',
                'PWA' => 'PWA',
                'X' => 'پهنای  باند اختصاصی',
                'Y' => 'فروش تجاری',
                'Z' => 'عاملیت فروش',
                'G' => ' فروشگاه محلی',
            ])->label('نوع خدمات') ?>

</div>

    <div class="forosh" style="display: none">


        <div class="row">

            <div class="col-md-3 col-lg-3">
                <div class="form-group field-tbltarget-ostan has-success">
                    <label class="control-label" for="tbltarget-ostan">استان</label>
                    <select id="tbltarget-ostan" class="form-control" name="state" onchange="getcity()" aria-invalid="false">
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


            <div class="col-md-3 col-lg-3" >
                <div id="city">
                    <div class="form-group field-tblphone-ostan required">
                        <label class="control-label" for="tblphone-ostan">شهر</label>
                        <select id="tblphone-city" class="form-control" name="city" aria-required="true">
                            <option value="">انتخاب کنید</option>


                        </select>

                        <div class="help-block"></div>
                    </div>
                </div>
            </div>


            <div class="col-md-3 col-lg-3" >
                <div id="markaaz">
                    <div class="form-group field-tblphone-ostan required">
                        <label class="control-label" for="tblphone-ostan">مرکز</label>
                        <select id="tblphone-city" class="form-control" name="markaz_name" aria-required="true" onchange="getValue1(this.value)">
                            <option value="">انتخاب کنید</option>


                        </select>

                        <div class="help-block"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-lg-3">

                <?= $form->field($model, 'name_mantaqe')->dropDownList($reng,['prompt'=>'انتخاب کنید'])->label('تعیین محدوده') ?>
            </div>

        </div>





        <div id="markaz_name"></div>


            <input  id="markaz_name_input" style="display: none;width: 500px" name="markaz1">


    </div>





        <div class="nasb" style="display: none">

            <div id="tbltarget-sabtnam">
                <label><input name="y"  type="radio" onclick="Factor('1')"> ADSL</label>
                <label><input name="y"  type="radio" onclick="Factor('2')"> VDSL</label>
                <label><input name="y"  type="radio" onclick="Factor('3')"> OWA</label>
                <label><input name="y"  type="radio" onclick="Factor('4')"> TD-LTE</label>
                <label><input name="y"  type="radio" onclick="Factor('5')"> NGN</label>
                <label><input name="y"  type="radio" onclick="Factor('6')"> IPTV(AOD-VOD)</label></div>


            

                    <div class="ADSL" style="display: none">



                        <div class="contaner">

                            <table  class="tb">


                                <tr >

                                    <th>اشتراک</th>
                                    <th>نام فروشنده</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th style="width: 45%">آدرس</th>
                                    <th style="width: 7%">انتخاب کنید</th>

                                </tr>


                        <?php

                        $factor1=\frontend\models\Adsl::find()->where(['type'=>'adsl'])->all();
                        $i=0;
                        foreach ($factor1 as $f){



                            if($i%2==0){?>

                                <tr style="background-color: rgba(0,0,0,.1)">


                                    <?php
                                $foroshande1=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                               if($foroshande1!=null){
                                   ?>
                                  <td><?=$f->eshterak?></td>
                                  <td><?=$foroshande1->name.$foroshande1->lastname?></td>
                                  <td><?=$foroshande1->ostan?></td>
                                  <td><?=$foroshande1->shahr?></td>
                                  <td style="width: 45%"><?=$f->adress?></td>
                                  <td style="width: 7%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                  </tr>
                       <?php

                              }
                            }else{?>
                                <tr style="background-color: white">


                                <?php
                                $foroshande1=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande1!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande1->name.$foroshande1->lastname?></td>
                                    <td><?=$foroshande1->ostan?></td>
                                    <td><?=$foroshande1->shahr?></td>
                                    <td style="width: 45%"><?=$f->adress?></td>
                                    <td style="width: 7%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }
                            }

                            $i++;
                        }

                        ?>


                            </table>



                        </div>

                    </div>
                    <div class="VDSL" style="display: none">




                        <div class="contaner">

                            <table  class="tb">


                                <tr >

                                    <th>اشتراک</th>
                                    <th>نام فروشنده</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th style="width: 45%">آدرس</th>
                                    <th style="width: 7%">  انتخاب کنید</th>

                                </tr>




                                <?php

                        $factor2=\frontend\models\Adsl::find()->where(['type'=>'vdsl'])->all();
                        $i=0;
                        foreach ($factor2 as $f){

                            if($i%2==0){?>

                                <tr style="background-color: rgba(0,0,0,.1)">


                                <?php
                                $foroshande2=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande2!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande2->name.$foroshande2->lastname?></td>
                                    <td><?=$foroshande2->ostan?></td>
                                    <td><?=$foroshande2->shahr?></td>
                                    <td style="width: 45%"><?=$f->adress?></td>
                                    <td style="width: 7%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }
                            }else{?>
                                <tr style="background-color: white">


                                <?php
                                $foroshande2=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande2!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande2->name.$foroshande2->lastname?></td>
                                    <td><?=$foroshande2->ostan?></td>
                                    <td><?=$foroshande2->shahr?></td>
                                    <td style="width: 45%"><?=$f->adress?></td>
                                    <td style="width: 7%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }
                            }

                            $i++;
                        }

                        ?>
                       </table>
                            </div>

                    </div>
                    <div class="OWA" style="display: none">


                        <div class="contaner">

                            <table  class="tb">


                                <tr >

                                    <th>اشتراک</th>
                                    <th>نام فروشنده</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th style="width: 47%">آدرس</th>
                                    <th style="width: 5%">  انتخاب کنید</th>

                                </tr>



                                <?php

                        $factor3=\frontend\models\Adsl::find()->where(['type'=>'owa'])->all();
                        $i=0;
                        foreach ($factor3 as $f){

                            if($i%2==0){?>

                                <tr style="background-color: rgba(0,0,0,.1)">


                                <?php
                                $foroshande3=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande3!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande3->name.$foroshande3->lastname?></td>
                                    <td><?=$foroshande3->ostan?></td>
                                    <td><?=$foroshande3->shahr?></td>
                                    <td style="width: 47%"><?=$f->adress?></td>
                                    <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }
                            }else{?>
                                <tr style="background-color: white">


                                <?php
                                $foroshande3=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande3!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande3->name.$foroshande3->lastname?></td>
                                    <td><?=$foroshande3->ostan?></td>
                                    <td><?=$foroshande3->shahr?></td>
                                    <td style="width: 47%"><?=$f->adress?></td>
                                    <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }
                            }

                            $i++;
                        }

                        ?>
                        </table>
                            </div>


                    </div>
                    <div class="TD-LTE" style="display: none">

                        <div class="contaner">

                            <table  class="tb">


                                <tr >

                                    <th>اشتراک</th>
                                    <th>نام فروشنده</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th style="width: 47%">آدرس</th>
                                    <th style="width: 5%">انتخاب کنید</th>

                                </tr>

                                <?php

                        $factor4=\frontend\models\Adsl::find()->where(['type'=>'td-lte'])->all();
                        $i=0;
                        foreach ($factor4 as $f){

                            if($i%2==0){?>

                                <tr style="background-color: rgba(0,0,0,.1)">


                                <?php
                                $foroshande4=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande4!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande4->name.$foroshande4->lastname?></td>
                                    <td><?=$foroshande4->ostan?></td>
                                    <td><?=$foroshande4->shahr?></td>
                                    <td style="width: 47%"><?=$f->adress?></td>
                                    <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }
                            }else{?>
                                <tr style="background-color: white">


                                <?php
                                $foroshande4=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande4!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande4->name.$foroshande4->lastname?></td>
                                    <td><?=$foroshande4->ostan?></td>
                                    <td><?=$foroshande4->shahr?></td>
                                    <td style="width: 47%"><?=$f->adress?></td>
                                    <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }
                            }

                            $i++;
                        }

                        ?>
                             </table>
                            </div>

                    </div>
                    <div class="NGN" style="display: none">


                        <div class="contaner">

                            <table  class="tb">


                                <tr >

                                    <th>اشتراک</th>
                                    <th>نام فروشنده</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th style="width: 47%">آدرس</th>
                                    <th style="width: 5%">انتخاب کنید</th>

                                </tr>

                                <?php

                        $factor5=\frontend\models\FactorNgn::find()->where(['type'=>'ngn'])
                         ->andWhere(['nasb'=>1])->all();
                        $i=0;
                        foreach ($factor5 as $f){
                            
                              $chektaeed=\backend\models\TblTarget::find()->where(['eshterak'=>$f->eshterak])->one();
                            
                            if($chektaeed == null){


                               ?>

                                    <tr style="background-color: rgba(0,0,0,.1)">


                                    <?php
                                    $foroshande5=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                    if($foroshande5!=null){?>
                                        <td><?=$f->eshterak?></td>
                                        <td><?=$foroshande5->name.$foroshande5->lastname?></td>
                                        <td><?=$foroshande5->ostan?></td>
                                        <td><?=$foroshande5->shahr?></td>
                                        <td style="width: 47%"><?=$f->adress?></td>
                                        <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                        </tr>
                                        <?php
                                    }

                            }else{
                                if($chektaeed->taeed == 0){
                                    ?>

                                        <tr style="background-color: rgba(0,0,0,.1)">


                                        <?php
                                        $foroshande5=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                        if($foroshande5!=null){?>
                                            <td><?=$f->eshterak?></td>
                                            <td><?=$foroshande5->name.$foroshande5->lastname?></td>
                                            <td><?=$foroshande5->ostan?></td>
                                            <td><?=$foroshande5->shahr?></td>
                                            <td style="width: 47%"><?=$f->adress?></td>
                                            <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                            </tr>
                                            <?php
                                        }

                                }
                            }



                            }
                                ?>

                        </table>
                        </div>


                    </div>
                    <div class="IPTV" style="display: none">

                        <div class="contaner">

                            <table  class="tb">


                                <tr >

                                    <th>اشتراک</th>
                                    <th>نام فروشنده</th>
                                    <th>استان</th>
                                    <th>شهر</th>
                                    <th style="width: 47%">آدرس</th>
                                    <th style="width: 5%">انتخاب کنید</th>

                                </tr>

                                <?php

                        $factor6=\frontend\models\Adsl::find()->where(['type'=>'iptv'])->all();
                        $i=0;
                        foreach ($factor6 as $f){

                            if($i%2==0){?>

                                <tr style="background-color: rgba(0,0,0,.1)">


                                <?php
                                $foroshande6=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande6!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande6->name.$foroshande6->lastname?></td>
                                    <td><?=$foroshande6->ostan?></td>
                                    <td><?=$foroshande6->shahr?></td>
                                    <td style="width: 47%"><?=$f->adress?></td>
                                    <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }else {


                                    ?>
<!--                                    <tr style="background-color: rgba(0,0,0,.1)">-->
<!--                                        <td>__</td>-->
<!--                                        <td>__</td>-->
<!--                                        <td>__</td>-->
<!--                                        <td>__</td>-->
<!--                                        <td style="width: 47%">__</td>-->
<!--                                        <td style="width: 5%;text-align: center"><input type="checkbox"></td>-->
<!---->
<!--                                    </tr>-->
                                    <?php
                                }
                            }else{?>
                                <tr style="background-color: white">


                                <?php
                                $foroshande6=\backend\models\Profile::find()->where(['id_user'=>$f->id_user])->one();
                                if($foroshande6!=null){?>
                                    <td><?=$f->eshterak?></td>
                                    <td><?=$foroshande6->name.$foroshande6->lastname?></td>
                                    <td><?=$foroshande6->ostan?></td>
                                    <td><?=$foroshande6->shahr?></td>
                                    <td style="width: 47%"><?=$f->adress?></td>
                                    <td style="width: 5%;text-align: center"><span class="span_target" type="checkbox" onclick="Eshterak('<?=$f->eshterak?>')" >انتخاب</span></td>

                                    </tr>
                                    <?php
                                }else {


                                    ?>
<!--                                    <tr style="background-color: white">-->
<!--                                        <td>__</td>-->
<!--                                        <td>__</td>-->
<!--                                        <td>__</td>-->
<!--                                        <td>__</td>-->
<!--                                        <td style="width: 47%">__</td>-->
<!--                                        <td style="width: 5%;text-align: center"><input type="checkbox"></td>-->
<!---->
<!--                                    </tr>-->

                                    <?php
                                }
                            }

                            $i++;
                        }

                        ?>

                                </table>
                            </div>
                    </div>


            <div id="chekbox1" >

            </div>
            <input id="chekbox1_input" style="display: none">




        </div>

   



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script>
    
    
    function getFunction(name) {
        
        if(name == 1){
            $('.forosh').css("display","block")
            $('.nasb').css("display","none")
        }
        if(name == 2){
            $('.forosh').css("display","none")
            $('.nasb').css("display","block")
        }
        
    }
    
    
    
</script>

<script>

    function Factor(factor) {

        if(factor == 1){
           
            $('.ADSL').css("display","block")
            $('.VDSL').css("display","none")
            $('.OWA').css("display","none")
            $('.TD-LTE').css("display","none")
            $('.NGN').css("display","none")
            $('.IPTV').css("display","none")

        }
        if(factor == 2){
            $('.ADSL').css("display","none")
            $('.VDSL').css("display","block")
            $('.OWA').css("display","none")
            $('.TD-LTE').css("display","none")
            $('.NGN').css("display","none")
            $('.IPTV').css("display","none")

        }
        if(factor == 3){
            $('.ADSL').css("display","none")
            $('.VDSL').css("display","none")
            $('.OWA').css("display","block")
            $('.TD-LTE').css("display","none")
            $('.NGN').css("display","none")
            $('.IPTV').css("display","none")

        }
        if(factor == 4){
            $('.ADSL').css("display","none")
            $('.VDSL').css("display","none")
            $('.OWA').css("display","none")
            $('.TD-LTE').css("display","block")
            $('.NGN').css("display","none")
            $('.IPTV').css("display","none")

        }
        if(factor == 5){
            $('.ADSL').css("display","none")
            $('.VDSL').css("display","none")
            $('.OWA').css("display","none")
            $('.TD-LTE').css("display","none")
            $('.NGN').css("display","block")
            $('.IPTV').css("display","none")

        }
        if(factor == 6){
            $('.ADSL').css("display","none")
            $('.VDSL').css("display","none")
            $('.OWA').css("display","none")
            $('.TD-LTE').css("display","none")
            $('.NGN').css("display","none")
            $('.IPTV').css("display","block")

        }

    }



</script>
<script>

   function Eshterak(eshterak) {

// alert(eshterak)
       var chek="<span id='closechek'>" +
           "<img style='width:15px;margin-right:20px;margin-bottom:10px'" +
           " src='<?=Yii::$app->request->hostInfo?>/backend/web/images/close.png' onclick='getclose2()'>"
           + eshterak + ','+"</span>"
       $('#chekbox1').append(chek)


       $('#chekbox1_input').val($('#chekbox1').text())




   }


</script>

<script>

    function getclose2(){

        $('#closechek').remove()
        $('#chekbox1_input').val($('#chekbox1').text())
    }


</script>

<script>

    function getValue1(markaz) {

        var html="<span id='close'>" +
            "<img style='width:15px;margin-right:20px;margin-bottom:10px'" +
            " src='<?=Yii::$app->request->hostInfo?>/backend/web/images/close.png' onclick='getclose()'>"
            + markaz + "</span>"+"<span style='display:none' id='close2' >"+","+$('#tbltarget-ostan').val() + "," + $('#tblphone-city').val()+ "_" +"</span>"
            $('#markaz_name').append(html)


        $('#markaz_name_input').val($('#markaz_name').text())




    }


</script>

<script>

    function getclose(){

        $('#close').remove()
        $('#close2').remove()
        $('#markaz_name_input').val($('#markaz_name').text())
    }


</script>


<script>

    function getcity() {
        var name = $('#tbltarget-ostan').val();

        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('tbltarget/city') ?>',
            data: {name: name},
            success: function (data) {

                $('#city').html(data);
            }
        });



    }
</script>

<script>

    function getMarkaz(name) {

        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('tbltarget/markaz') ?>',
            data: {name: name},
            success: function (data) {

                $('#markaaz').html(data);
            }
        });



    }
</script>


