<?php

date_default_timezone_set("Asia/Tehran");
$gen = new \common\components\General();
$time = $gen->timeMake(date("Y/m/d H:i:s"));
$timeNim = $time - (0 + (30 * 60));
$timeYek = $time - (0 + (60 * 60));
$timeFive = $time - (0 + ((60 * 60) * 5));
?>

<div class="tbl-coordinates-form" >


    <div id="map"></div>
</div>
<?php

?>
<script>
    var lat = new Array();
    var lng = new Array();
    var i = 0;

    function initMap() {
//        var myLatlng = {lat: 35.6811434, lng: 51.3781643};
//
//        var map = new google.maps.Map(document.getElementById('map'), {
//            zoom: 10,
//            center: myLatlng
//        });
//
//        var mlat=new  google.maps.LatLng( 35.673397,51.366665 );
//        var marker2 = new google.maps.Marker({
//            position: mlat,
//            map: map,
//            title: 'Click '
//        });

        <?php

        $i = 0;
        foreach ($model as $var) {
            $hoz = $var['login'];

            $time = explode(" ", $var['timeStamp']);

            echo "
              var loc" . $i . " = {
            info:'<span style=\"margin-right: 50px ; \" >".$var['name']." ".$var['lastName']."</span>   <br> <strong>" . $var['dateIr'] . "</strong><br>\\r\\
					" . $time[1] . "<br> " . $hoz . "<br>',
            lat: " . $var['lat'] . ",
            long: " . $var['lng'] . "
        };
        
        ";

            $i++;
        }
        $i = 0;
        echo "
             var locations = [
            ";
        foreach ($model as $val) {
            echo "
            [loc" . $i . ".info, loc" . $i . ".lat,loc" . $i . ".long, " . $i . "],
            ";
            $i++;
        }
        echo "];";
        ?>
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: new google.maps.LatLng(loc0.lat, loc0.long),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow({});

        var marker;
        var tiU = [
            <?php
            $iuy = 0;
            foreach ($model as $row) {
                if($iuy == 0 ){
                    echo $row['time'];
                }else{
                    echo ",".$row['time'];
                }

                $iuy++;
            }
            ?>
        ]


        var  timeNim = <?= $timeNim ?>;
        var  timeYek = <?= $timeYek ?>;
        var  timeFive = <?= $timeFive ?>;
        for (i = 0; i < locations.length; i++) {

            if ( tiU[i] < timeFive  ) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 10,
                        fillColor: "#ed0f34",
                        fillOpacity: 1,
                        strokeWeight: 0.4
                    }
                });
            }
            if (tiU[i] < timeYek && tiU[i] > timeFive  ) {

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 10,
                        fillColor: "#ef1980",
                        fillOpacity: 1,
                        strokeWeight: 0.4
                    }
                });

            }
            if (tiU[i] < timeNim && tiU[i] > timeYek ) {

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 10,
                        fillColor: "#c3ed4f",
                        fillOpacity: 1,
                        strokeWeight: 0.4
                    }
                });
            }
            if (tiU[i] > timeNim) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 10,
                        fillColor: "#69ecec",
                        fillOpacity: 1,
                        strokeWeight: 0.4
                    }
                });

            }


            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmjJPOm0BE7z90HXauwWium_HXCP5m5GQ&callback=initMap&libraries=geometry">
</script>