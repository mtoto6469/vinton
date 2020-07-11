


var lat = new Array();
var lng = new Array();

var i=0;
var element = document.getElementById(hid);

function initMap() {

    var myLatlng = {lat: 35.6811434, lng: 51.3781643};

    var map = new google.maps.Map(document.getElementById('map'), {

        zoom: 10,
        center: myLatlng
    });

//        var marker = new google.maps.Marker({
//            position: myLatlng,
//            map: map,
//            title: 'Click to zoom'
//        });

//        map.addListener('center_changed', function() {
//            // 3 seconds after the center of the map has changed, pan back to the
//            // marker.
//            window.setTimeout(function() {
//                map.panTo(marker.getPosition());
//            }, 3000);
//        });

//        marker.addListener('click', function() {
//            map.setZoom(8);
//            map.setCenter(marker.getPosition());
//        });

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

