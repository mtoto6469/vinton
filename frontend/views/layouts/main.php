<?php
/**
 * Created by PhpStorm.
 * User: hadise
 * Date: 4/18/2018
 * Time: 4:11 AM
 */
use frontend\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php $url= Yii::$app->urlManager;?>
    <!DOCTYPE html>
    <html lang="IR-fa">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vinton</title>



    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>
<body>
<div class="header1">

    <div class="row">

        <div class="col-sm-6 col-md-6 col-lg-7">
            <img style="width: 100px; height: 60px;margin-right: 10px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/96.png">

            <ul class="admin-ul">
                <li>admin</li>
                <li>-</li>
                <li><a href="<?=$url->createAbsoluteUrl('site/logout')?>" style="color: white;">خروج</a></li>

            </ul>


        </div>


        <div class="col-sm-6 col-md-6 col-lg-5">


            <div style="margin-top: 15px">

                <ul class="text_ul_one">
                    <ul class="text_ul_two"><li>فروش سرویس تا این لحطه:</li><li>132134</li></ul>
                    <ul class="text_ul_two"><li>ارزش تومانی تا این لحطه:</li><li>132134</li></ul>

                </ul>


                <ul class="text_ul_one">
                    <ul class="text_ul_two">   <li >کاربر انلاین اپ:</li><li>132134</li></ul>
                    <ul class="text_ul_two"> <li >ماربر آنلاین وی:</li><li>132134</li></ul>


                </ul>

                <ul class="text_ul_one">
                    <ul class="text_ul_two">        <li>تاریح:</li><li>132134</li></ul>
                    <ul class="text_ul_two">   <li>ساعت:</li><li>132134</li></ul>


                </ul>


            </div>


        </div>


    </div>

</div>


<div class="navigation">

    <div class="row">

        <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">

            <ul class="menu">

                <li><a href="<?=$url->createAbsoluteUrl('site/index')?>" ><img style="width: 20px;margin-right: -10px!important;" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/home_w1.png"></a></li>
                <li><a href="<?=$url->createAbsoluteUrl('site/password')?>"><img style="width: 20px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/password_icon2.png"></a></li>
                <li><a href="<?=$url->createAbsoluteUrl('site/phone')?>"><img style="width: 20px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/phone_icon_by_cemagraphics.png"></a></li>
                <li><a href=""><img style="width: 20px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/tariff.png"></a></li>
                <li><a href=""><img style="width: 20px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/telegram.png"></a></li>
                <li style="padding:0 10px" ><a href="<?=$url->createAbsoluteUrl('site/infosearch')?>" >جستجوی کاربران</a></li>
                <li style="padding:0 10px"><a href="<?=$url->createAbsoluteUrl('site/modiriyat')?>">مدیریت</a></li>
                <li style="padding:0 10px"><a href="<?=$url->createAbsoluteUrl('site/gozareshat')?>">گزارشات</a></li>
                <li style="padding:0 10px"><a href="">خدمات و سرویس ها</a></li>
                <li style="padding:0 10px"><a href=""> امور مالی</a></li>



<!--                <li  style="padding:0 8px; " class="dropdown drop2" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">خدمات و سرویس ها<span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li style="margin-top: -3px"><a href="#">Page 1-1gchvhmbjbhj,n</a></li>-->
<!--                        <li style="margin-top: -5px"><a href="#">Page 1-2</a></li>-->
<!--                        <li style="margin-top: -5px;margin-bottom: -5px"><a href="#">Page 1-3</a></li>-->
<!--                    </ul>-->
<!---->
<!--                </li>-->
                <li  style="padding:0 8px; " class="dropdown drop1" ><a class="dropdown-toggle" data-toggle="dropdown" href="">مقالات<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li style="margin-top: -3px"><a href="<?=$url->createAbsoluteUrl(['post/maqalat','status'=>'0'])?>">کارشناس فروش</a></li>
                        <li style="margin-top: -5px"><a href="<?=$url->createAbsoluteUrl(['post/maqalat','status'=>'1'])?>">کارشناس نصب</a></li>
                        <li style="margin-top: -5px;margin-bottom: -5px"><a href="<?=$url->createAbsoluteUrl(['post/maqalat','status'=>'2'])?>">کارشناس ثبت نام</a></li>
                        <li style="margin-top: -5px;margin-bottom: -5px"><a href="<?=$url->createAbsoluteUrl(['post/maqalat','status'=>'3'])?>">عاملین فروش</a></li>
             
                    </ul>

                </li>

<!--                <li  style="padding:0 8px; " class="dropdown drop3" ><a class="dropdown-toggle" data-toggle="dropdown" href="#">  امور مالی<span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li style="margin-top: -3px"><a href="#">Page 1-1gchvhmbjbhj,n</a></li>-->
<!--                        <li style="margin-top: -5px"><a href="#">Page 1-2</a></li>-->
<!--                        <li style="margin-top: -5px;margin-bottom: -5px"><a href="#">Page 1-3</a></li>-->
<!--                    </ul>-->
<!---->
<!--                </li>-->

            </ul>



        </div>
        <div class="col-md-6 col-lg-6"></div>


    </div>





</div>

<!--bdshjbfksjdnfksdjfk;sngjksndgjabsfhbfhabfhfbhfbhbafbDHJbaj-->






<!------ Include the above in your HEAD tag ---------->


<div class="menu2">


    <div class="navbar navbar-default navbar-fixed-top" style="background-color: #3a4f63;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--            <a href="#" class="navbar-brand visible-xs">-->
                <!--                <img width="20" height="20"-->
                <!--                     src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAA81BMVEX///9VPnxWPXxWPXxWPXxWPXxWPXxWPXz///9hSYT6+vuFc6BXPn37+vz8+/z9/f2LeqWMe6aOfqiTg6uXiK5bQ4BZQX9iS4VdRYFdRYJfSINuWI5vWY9xXJF0YJR3Y5Z4ZZd5ZZd6Z5h9apq0qcW1qsW1q8a6sMqpnLyrn76tocCvpMGwpMJoUoprVYxeRoJjS4abjLGilLemmbrDutDFvdLPx9nX0eDa1OLb1uPd1+Td2OXe2eXh3Ofj3+nk4Orl4evp5u7u7PLv7fPx7/T08vb08/f19Pf29Pj39vn6+fuEcZ9YP35aQn/8/P1ZQH5fR4PINAOdAAAAB3RSTlMAIWWOw/P002ipnAAAAPhJREFUeF6NldWOhEAUBRvtRsfdfd3d3e3/v2ZPmGSWZNPDqScqqaSBSy4CGJbtSi2ubRkiwXRkBo6ZdJIApeEwoWMIS1JYwuZCW7hc6ApJkgrr+T/eW1V9uKXS5I5GXAjW2VAV9KFfSfgJpk+w4yXhwoqwl5AIGwp4RPgdK3XNHD2ETYiwe6nUa18f5jYSxle4vulw7/EtoCdzvqkPv3bn7M0eYbc7xFPXzqCrRCgH0Hsm/IjgTSb04W0i7EGjz+xw+wR6oZ1MnJ9TWrtToEx+4QfcZJ5X6tnhw+nhvqebdVhZUJX/oFcKvaTotUcvUnY188ue/n38AunzPPE8yg7bAAAAAElFTkSuQmCC" alt="Brand">-->
                <!--            </a>-->
                <ul class="admin-ul" >
                    <li>  <img style="width: 30px;margin:10px 10px" src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/icon/96.png"></li>
                    <li>admin</li>
                    <li>-</li>
                    <li>خروج</li>

                </ul>


            </div>

            <div class="navbar-collapse collapse" id="navbar">
                <ul class="navbar-right nav navbar-nav">
                    <li class="dropdown">


                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" class="navbar-link" style="margin: 5px 20px;color: white;background: none"">مشخصات<span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu" style="text-align: start;">
                            <div style="margin-top: 15px">

                                <ul class="text_ul_one">
                                    <ul class="text_ul_two"><li>فروش سرویس تا این لحطه:</li><li>132134</li></ul>
                                    <ul class="text_ul_two"><li>ارزش تومانی تا این لحطه:</li><li>132134</li></ul>

                                </ul>


                                <ul class="text_ul_one">
                                    <ul class="text_ul_two">   <li >کاربر انلاین اپ:</li><li>132134</li></ul>
                                    <ul class="text_ul_two"> <li >ماربر آنلاین وی:</li><li>132134</li></ul>


                                </ul>

                                <ul class="text_ul_one">
                                    <ul class="text_ul_two">        <li>تاریح:</li><li>132134</li></ul>
                                    <ul class="text_ul_two">   <li>ساعت:</li><li>132134</li></ul>


                                </ul>


                            </div>

                        </ul>
                    </li>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">No message.</li>
                    </ul>
                    </li>


                    <li class="dropdown menu2_li"><a class="dropdown-toggle" data-toggle="dropdown" href="#" class="navbar-link" style="margin: 5px 20px;color: white;background: none">منو<span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu" style="text-align: start;">
                            <!--                        <li><a class="animate" href="#"></a></li>-->
                            <!--                        <li class="dropdown-header"></li>-->
                            <li class="list"><a href="#" class="animate">صفحه اصلی</a></li>
                            <li class="list"><a class="animate" href="#">تغییر رمز عبور</a></li>
                            <li class="list"><a class="animate" href="#">پیش شماره ها</a></li>
                            <li class="list"><a class="animate" href="#">لیست تعرفه</a></li>
                            <li class="list"><a class="animate" href="#">تلگرام</a></li>
                            <li class="list"><a class="animate" href="#">جستجوی کاربران</a></li>
                            <li class="list"><a class="animate" href="#">مدیریت</a></li>
                            <li class="list"><a class="animate" href="#">گزارشات</a></li>
                            <li class="list"><a class="animate" href="#">خدمات و سرویس ها</a></li>
                            <li class="list"><a class="animate" href="<?=$url->createAbsoluteUrl(['post/maqalat','status'=>4])?>">مقالات</a></li>
                            <li class="list"><a class="animate" href="#">امور مالی</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>

    </div>

</div>




<?= $content?>


<?php $this->endBody() ?>

</body>
<?php $this->endPage() ?>
</html>