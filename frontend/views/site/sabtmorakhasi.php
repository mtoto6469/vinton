<?php

$sesssion = Yii::$app->session;
if (!$sesssion->isActive) {
    $sesssion->open();
}
if (isset($_SESSION['error'])){
    if( $_SESSION['error']!= null){
        echo'<div class="alert alert-info">'. $_SESSION['error'].'</div>';

    }$_SESSION['error']= null;
}
?>
<div style="margin-top: 5%" dir="rtl">

    <div class="container">
        <div class="row">

            <p style="font-weight: bold ">اگر قصد عدم تایید درخواست مورد نظر را دارید دلیل رد تقاضا را وارد کنید.در صورت دخیره رکورد مورد نظر امکان ویرایش آن نمی باشد.</p>

            <div class="table-responsive">
                <?php use yii\widgets\ActiveForm;

                $form = ActiveForm::begin(); ?>
                <table class="table table-hover">
                    <thead style="background:darkred;color: white;border: 2px solid rgba(0,0,0,.5);font-weight: bold">
                    <tr >
                        <td style="padding: 10px!important;">#</td>
                        <td style="padding: 10px!important;">نام متقاضی</td>
                        <td style="padding: 10px!important;">سمت</td>
                        <td style="padding: 10px!important;">استان</td>
                        <td style="padding: 10px!important;">شهر</td>
                        <td style="padding: 10px!important;">تاریخ درخواست</td>
                        <td style="padding: 10px!important;">زمان(ساعت/روز)</td>
                        <td style="padding: 10px!important;">مجموع</td>
                        <td style="padding: 10px!important;">دلیل</td>
                        <td style="padding: 10px!important;">امضا</td>
                        <td style="padding: 10px!important;">تایید/عدم تایید</td>
                        <td style="padding: 10px!important;">دلیل رد تقاضا</td>
                        <td style="padding: 10px!important;">انتخاب</td>
                    </tr>
                    </thead>

                    <tbody id="myTable">
                    <?php

                    $morakhasi=\frontend\models\Morakhasi::find()->where(['taeed'=>0])->all();
                    if($morakhasi!= null){
                        $i=1;
                        foreach ($morakhasi as $ms) {

                            $id_user = \frontend\models\Profile::find()->where(['id_user' => $ms->id_user])->one();
                            if ($id_user != null) {

                                if ($i % 2 == 0) { ?>


                                    <tr style="background-color: seashell">
                                        <td style="padding-top: 10px!important;"><?= $i ?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->name.$id_user->lastname?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->semat?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->ostan?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->shahr?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->date_farsi?></td>
                                        <?php
                                        if($ms->ruzane == 0){?>
                                            <td style="padding-top: 10px!important;"><?=$ms->az_saat?> الی <?=$ms->ta_saat?></td>
                                        <?php
                                        }else{?>
                                            <td style="padding-top: 10px!important;"><?=$ms->ruzane ?>_روز </td>
                                       <?php
                                        }
                                        ?>

                                        <td style="padding-top: 10px!important;"><?=$ms->sum?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->dalil?></td>
                                        <td style="padding-top: 10px!important;"><img style="width: 30px" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$ms->ax_emza?>"></td>
                                        <td style="padding-top: 10px!important;">
                                           تایید <input type="radio" name="taeed.<?=$ms->id?>" value="1">
                                        عدم تایید    <input type="radio" name="taeed.<?=$ms->id?>" value="2">

                                        </td>
                                        <td><textarea name="vaziyat.<?=$ms->id?>"  rows="1" ></textarea></td>
                                        <td class="namayesh" style="padding-top: 10px!important;"><button type="submit" class="btn btn-success"
                                      value="<?=$ms->id?>" name="j">ذخیره</button></td>
                                    </tr>

                                    <?php
                                } else {
                                    ?>


                                    <tr style="background: white">
                                
                                        <td style="padding-top: 10px!important;"><?= $i ?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->name.$id_user->lastname?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->semat?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->ostan?></td>
                                        <td style="padding-top: 10px!important;"><?=$id_user->shahr?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->date_farsi?></td>
                                        <?php
                                        if($ms->ruzane == 0){?>
                                            <td style="padding-top: 10px!important;"><?=$ms->az_saat?> الی <?=$ms->ta_saat?></td>
                                            <?php
                                        }else{?>
                                            <td style="padding-top: 10px!important;"><?=$ms->ruzane ?>_روز </td>
                                            <?php
                                        }
                                        ?>
                                        <td style="padding-top: 10px!important;"><?=$ms->sum?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->dalil?></td>
                                        <td style="padding-top: 10px!important;"><img style="width: 30px" src="<?=Yii::$app->request->hostInfo?>/upload/<?=$ms->ax_emza?>"></td>
                                        <td style="padding-top: 10px!important;">
                                            تایید <input type="radio" name="taeed.<?=$ms->id?>" value="1">
                                            عدم تایید    <input type="radio" name="taeed.<?=$ms->id?>" value="2">

                                        </td>
                                        <td><textarea name="vaziyat.<?=$ms->id?>"  rows="1"></textarea></td>
                                        <td class="namayesh" style="padding-top: 10px!important;"><button type="submit" class="btn btn-success"
                                   value="<?=$ms->id?>" name="j">ذخیره</button></td>
                                    </tr>
                                    <?php

                                }
                                $i++;
                            }


                        }


                    }
                    ?>





                    </tbody>
                </table>
                <?php ActiveForm::end(); ?>



            </div>

            <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg pager" id="myPager"></ul>
            </div>
        </div>
    </div>

</div>

