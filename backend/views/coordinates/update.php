<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblCoordinates */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="tbl-coordinates-form">

    <?php $form = ActiveForm::begin(); ?>


    <input type="hidden" name="lat" id="lat">

    <input type="hidden" name="lng" id="lng">


    <?= $form->field($model, 'id_range')->dropDownList($range)->label("انتخاب منطقه") ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ذخیره' : 'ویرایش', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<!--    <div id="map"></div>-->
<!--</div>-->

<div id="map" style="width:100%;height:400px;background:gainsboro"></div>


<script>

    var lat = new Array();
    var lng = new Array();

    var i=0;

    var element = document.getElementById(hid);

    function initMap() {

        var myLatlng = {lat: 35.6811434, lng: 51.3781643};

        var map = new google.maps.Map(document.getElementById("map"), {

            zoom: 10,
            center: myLatlng

        });



        map.addListener('click', function(e) {
            alert(e.latLng.lat().toFixed(7)+"-"+e.latLng.lng().toFixed(7)+"i = " + i) ;
            lat[i]=e.latLng.lat().toFixed(8);
            lng[i]=e.latLng.lng().toFixed(8);
            i++;
            var mlat=new  google.maps.LatLng(e.latLng.lat() ,e.latLng.lng() );
            var marker2 = new google.maps.Marker({
                position: mlat,
                map: map,
                title: 'Click '
            });
            $("#lat").val(lat);
            $("#lng").val(lng);
//            map.setZoom(8);
//            map.setCenter(marker.getPosition());
        });
    }
</script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmjJPOm0BE7z90HXauwWium_HXCP5m5GQ&callback=initMap&libraries=geometry">
    </script>

  