$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var icon = new google.maps.MarkerImage("resource/img/mapmarker48.png",
    new google.maps.Size(48, 48), new google.maps.Point(0, 0),
    new google.maps.Point(24, 48));
var map = null;
var geocoder = new google.maps.Geocoder();
var latitude = 16.060244698576117;
var longitude = 108.18938446044922;
var datatemp;
function changePicture(i){
     console.log(i);
     $('#mainImage').attr('src','uploads/'+datatemp[i].link+'');
}

function getProductDetailAjax(id){
    $.post("getProductDetail",{
        id: id
    },function(data){
        $('#title_product').text(data[0].title);
        $('#cost_product').text(data[0].cost+' VND');
        $('#phone_product').text(data[0].postermobile);
        $('#address_product').text(data[0].fullAddress);
        $('#description_product').text(data[0].description);
        if('nolink' == data[0].imglink){
            $('#mainImage').attr('src','resource/img/default.jpg');
        }else{
            datatemp = data[1];
            $('#mainImage').attr('src','uploads/'+data[0].imglink+'');
            for(var i=0; i<data[1].length; i++){
                var img = "<img src='uploads/"+data[1][i].link+"' onclick='changePicture("+i+");'/>";
                $('.thumbnail_img').append(img);
            }

        }
        console.log(data);
        addMarkerPoint(data[0].latitude, data[0].longitude);
    });
}

function  addMarkerPoint(lat, lng) {
    var newLatLng = null;
    var myMarker=new google.maps.LatLng(lat, lng);
    var marker=new google.maps.Marker({
        position:myMarker, 
        icon: icon,
        map: map,
        center:myMarker
    });
    marker.setMap(map);
 }   

function initMap(){
    map = new google.maps.Map(document.getElementById("map_view"), {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        zoomControl:true,
        zoomControlOptions: {
            style:google.maps.ZoomControlStyle.DEFAULT
        }
    });
    getProductDetailAjax($('#idProduct').val());
}
google.maps.event.addDomListener(window, 'load', initMap);

$(window).resize(function(){
    var h = $(window).height();
    $("#search_result").css('height',(h-130));
    $("#maps").css('height',(h-130));  
});