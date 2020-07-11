<?php $this->beginPage() ?>
<?php $url= Yii::$app->urlManager;?>
<div class="main_maqalat">




<div style="padding:3% 6%">

    <div class="ul_maqalat">
    <div class="row">
        
        <div class="col-md-4 m"> <a href="<?=$url->createAbsoluteUrl(['post/maqalat1','status'=>$status,'category'=>'1'])?>" >آخرین اخبار</a></div>
        <div class="col-md-4 m " ><a href="<?=$url->createAbsoluteUrl(['post/maqalat1','status'=>$status,'category'=>'2'])?>" >آخرین سرویس ها</a></div>
        <div class="col-md-4 m" > <a href="<?=$url->createAbsoluteUrl(['post/maqalat1','status'=>$status,'category'=>'3'])?>" >پیام های روز</a></div>

    </div>
    
   </div>
<input style="display: none" id="status" value="<?=$status?>">
    <?php

$i=0;
    foreach ($post as $p){

        if($p->enable ==$status || $p->enable==5) {


            if(($i)%2==1){?>


                <div style="margin-top:50px">
                    <div class="row">

                        <div class="col-lg-7 col-md-7">

                            <div style="width: 100%;height:100%;overflow-y:scroll;margin-left: 20px ">   <?= $p->text ?> </div>

                        </div>

                        <div class="col-lg-5 col-md-5">

                            <img src="<?= Yii::$app->request->hostInfo ?>/upload/post/<?= $p->img ?>"
                                 style="width: 500px;height:500px;float:right!important;  ">

                        </div>


                    </div>

                </div>


        <?php
            }

            if(($i)%2==0){?>

                <div style="margin-top:50px">
                <div class="row">

                    <div class="col-lg-5 col-md-5">

                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/post/<?= $p->img ?>"
                             style="width: 500px;height:500px;float: right!important; ">

                    </div>
                    <div class="col-lg-7 col-md-7">

                        <div
                            style="width: 100%;height:100%;overflow-y:scroll;margin-right: 20px ">   <?= $p->text ?> </div>

              </div>

        </div>
         </div>







            <?php
            }

        }
       $i++;
    }
    ?>
</div>



    

</div>

