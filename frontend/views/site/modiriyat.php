
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
<div class="main_modiriyat">


 <em><img src="<?=Yii::$app->request->hostInfo?>/frontend/web/images/Green_Tick.png">
     برای مشاهده فاکتور مورد نظر روی گزینه مربوطه کلیک کنید.
 </em>
<div id="uls">

    <ul>

        <li><span id="adsl" onclick="getType1('adsl')">ADSL</span></li>
        <li><span  id="owa" onclick="getType1('owa')">OWA</span></li>


    </ul>
    <ul>

        <li><span id="vdsl" onclick="getType1('vdsl')">VDSL</span></li>
        <li><span  id="td-lte" onclick="getType1('td-lte')">TD-LTE</span></li>


    </ul>
    <ul>

        <li><span id="pwa" onclick="getType1('pwa')">PAW</span></li>
        <li><span  id="vas" onclick="getType1('vas')">VAS</span></li>


    </ul>

    <ul>

        <li><span  id="ngn" onclick="getType1('ngn')">NGN</span></li>
        <li><span  id="mvno" onclick="getType1('mvno')">MVNO</span></li>


    </ul>
    <ul>

        <li><span  id="domain"  onclick="getType1('domain')">DOMAIN</span></li>
        <li><span id="host"  onclick="getType1('host')">HOST</span></li>


    </ul>

    <ul>

        <li><span  id="cdn"  onclick="getType1('cdn')">CDN</span></li>
        <li><span  id="idc" onclick="getType1('idc')">IDC</span></li>


    </ul>
    <ul>

        <li><span  id="iptv" onclick="getType1('iptv')">IPTV</span></li>
        <li><span  id="vpn" onclick="getType1('vpn')">VPN</span></li>

    </ul>
    <ul>

        <li><span id="x" onclick="getType1('x')">پهنای باند اختصاصی</span></li>
        <li><span  id="y" onclick="getType1('y')">فروش تجاری</span></li>


    </ul>


    <ul>

        <li><span id="z" onclick="getType1('z')">فروشنده محلی </span></li>
        <li><span id="g" onclick="getType1('g')">معرفی عاملیت</span></li>

    </ul>
</div>






    <div style="margin-top: 5%" dir="rtl">

        <div class="container">
            <div class="row">



                <div class="table-responsive">
                    <?php use yii\widgets\ActiveForm;

                    $form = ActiveForm::begin(); ?>
                    
                    <div id="result_search">
                 
                        </div>

                    



                    <?php ActiveForm::end(); ?>



                </div>

                <div class="col-md-12 text-center">
                    <ul class="pagination pagination-lg pager" id="myPager"></ul>
                </div>
            </div>
        </div>

    </div>



</div>


<script>

    function getType1(type) {

        if(type == 'adsl'){
           $('#adsl').css("color","darkorange")
           $('#vdsl').css("color","black")
           $('#owa').css("color","black")
           $('#pwa').css("color","black")
           $('#vas').css("color","black")
           $('#td-lte').css("color","black")
           $('#ngn').css("color","black")
           $('#mvno').css("color","black")
           $('#cdn').css("color","black")
           $('#idc').css("color","black")
           $('#domain').css("color","black")
           $('#host').css("color","black")
           $('#iptv').css("color","black")
           $('#vpn').css("color","black")
           $('#x').css("color","black")
           $('#y').css("color","black")
           $('#z').css("color","black")
           $('#g').css("color","black")
       }
        if(type == 'vdsl'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","darkorange")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'owa'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","darkorange")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'td-lte'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","darkorange")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'iptv'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","darkorange")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'ngn'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","darkorange")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'mvno'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","darkorange")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'vpn'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","darkorange")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'idc'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","darkorange")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'pwa'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","darkorange")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'vas'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","darkorange")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'domain'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","darkorange")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'host'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","darkorange")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'cdn'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","darkorange")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'x'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","darkorange")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }
        if(type == 'g'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","black")
            $('#g').css("color","darkorange")
        }
        if(type == 'z'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","black")
            $('#z').css("color","darkorange")
            $('#g').css("color","black")
        }
        if(type == 'y'){
            $('#adsl').css("color","black")
            $('#vdsl').css("color","black")
            $('#owa').css("color","black")
            $('#pwa').css("color","black")
            $('#vas').css("color","black")
            $('#td-lte').css("color","black")
            $('#ngn').css("color","black")
            $('#mvno').css("color","black")
            $('#cdn').css("color","black")
            $('#idc').css("color","black")
            $('#domain').css("color","black")
            $('#host').css("color","black")
            $('#iptv').css("color","black")
            $('#vpn').css("color","black")
            $('#x').css("color","black")
            $('#y').css("color","darkorange")
            $('#z').css("color","black")
            $('#g').css("color","black")
        }



        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/modiriyat2') ?>',
            data: {
                type:type
            },
            success: function (data) {

                $('#result_search').html(data);
            }
        });

    }



</script>
<script>


    function getEshterak(eshterak) {
        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('site/allfactors') ?>',
            data: {
                eshterak:eshterak
            },

        });
    }


</script>