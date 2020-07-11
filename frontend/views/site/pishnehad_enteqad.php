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

<!--            <p style="font-weight: bold ">اگر قصد عدم تایید درخواست مورد نظر را دارید دلیل رد تقاضا را وارد کنید.در صورت دخیره رکورد مورد نظر امکان ویرایش آن نمی باشد.</p>-->

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

                        <td style="padding: 10px!important;">نوع</td>
                        <td style="padding: 10px!important;">واحد مربوطه</td>
                        <td style="padding: 10px!important;">عنوان</td>
                        <td style="padding: 10px!important;">متن درخواست</td>
                        <td style="padding: 10px!important;">پاسخ</td>
                        <td style="padding: 10px!important;">انتخاب</td>
                    </tr>
                    </thead>

                    <tbody id="myTable">
                    <?php

                    $morakhasi=\frontend\models\Pishnehadenteqad::find()->all();
//                    var_dump(      $morakhasi);exit;
                    if($morakhasi != null){
                        $i=1;
                        foreach ($morakhasi as $ms) {

                            if($ms->id_parent ==0){

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

                                        <td style="padding-top: 10px!important;"><?=$ms->type_darkhast?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->vahede_marbute?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->title?></td>
                                        <td style="padding-top: 10px!important;">
                                            <span style="width: 50px;height: 50px;overflow-y:scroll ">

                                                <?=$ms->text?></span></td>
                                        <td style="padding-top: 10px!important;"><textarea name="result.<?=$ms->id?>"  rows="1"></textarea></td>
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

                                        <td style="padding-top: 10px!important;"><?=$ms->type_darkhast?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->vahede_marbute?></td>
                                        <td style="padding-top: 10px!important;"><?=$ms->title?></td>
                                        <td style="padding-top: 10px!important;">
                                            <span style="width: 20px;height: 20px;overflow-x:scroll ">
                                               <?=$ms->text?></span></td>
                                        <td style="padding-top: 10px!important;"><textarea name="result.<?=$ms->id?>"  rows="1"></textarea></td>
                                        <td class="namayesh" style="padding-top: 10px!important;"><button type="submit" class="btn btn-success"
                                          value="<?=$ms->id?>" name="j">ذخیره</button></td>
                                    </tr>
                                    <?php

                                }
                                $i++;
                            }
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

