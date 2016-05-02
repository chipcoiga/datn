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
var subm_lat =null;
var subm_lng = null;
var fullAddress = null;
var city_code = null;
var autocomplete;

function isFormValid(){
    $('.label_title').css('color','black');
    if($('#title_product').val() &&
        $('#cost_product').val() &&
        $('#mobilephone').val() && 
        $('#address_product_lg').val() || $('#title_product').val() &&
        $('#cost_product').val() &&
        $('#mobilephone').val() &&
        $('#address_product_sm').val() ) {
        return true;
    }
    if(!$('#title_product').val()){
        $('.title_product').css('color','red');
    }
    if(!$('#address_product_lg').val()){
        $('.address_product_lg').css('color','red');
    }
    if(!$('#cost_product').val()){
        $('.cost_product').css('color','red');
    }
    if(!$('#mobilephone').val()){
        $('.mobilephone').css('color','red');
    }
    if(!$('#address_product_sm').val()){
        $('.address_product_sm').css('color','red');
    }
    return false;
}

function doPostBuySell(){        
    if(isFormValid()){
        var dataSubmit = new FormData();
        dataSubmit.append('title_product',$('#title_product').val());
        dataSubmit.append('type_product',$('#type_product').val());
        dataSubmit.append('description_detail',$('#description_detail').val());
        dataSubmit.append('address_product_lg',$('#address_product_lg').val());
        dataSubmit.append('cost_product',$('#cost_product').val());
        dataSubmit.append('mobilephone',$('#mobilephone').val());
        dataSubmit.append('post_latitude',$('#post_latitude').val());
        dataSubmit.append('post_longitude',$('#post_longitude').val());
        dataSubmit.append('city_code',$('#city_code').val());
        dataSubmit.append('address_product_sm',$('#address_product_sm').val());
        dataSubmit.append('InputFile[0]',$('#InputFile_1')[0].files[0]);
        dataSubmit.append('InputFile[1]',$('#InputFile_2')[0].files[0]);
        dataSubmit.append('InputFile[2]',$('#InputFile_3')[0].files[0]);
        dataSubmit.append('InputFile[3]',$('#InputFile_4')[0].files[0]);
        //console.log('fs');
        $.ajax({
            url: 'dopostproduct',
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            dataType : 'json',
            data: dataSubmit,
            success:function(response){
                alert(response);
            }
        });
    }else{
        console.log('false');
    }
}

function  addMarkerPoint(lat, lng) {
    var newLatLng = null;
    var myMarker=new google.maps.LatLng(lat, lng);
    var marker=new google.maps.Marker({
        position:myMarker,       
        draggable: true,
        icon: icon,
        map: map
    });
    google.maps.event.addListener(marker, 'dragend', function(evt){
        map.setCenter(marker.position);
        subm_lat = evt.latLng.lat().toFixed(15);
        subm_lng = evt.latLng.lng().toFixed(14);
        newLatLng = new google.maps.LatLng(subm_lat,subm_lng);
        geocoder.geocode({       
            latLng: newLatLng     
        }, 
            function(responses) 
            {     
                console.log(responses); 
                $('#post_latitude').val(subm_lat);
                $('#post_longitude').val(subm_lng);
               if (responses && responses.length > 0) 
               {        
                   fullAddress=responses[0].formatted_address;
                   $('#address_product_sm').val(fullAddress);
                   $('#address_product_lg').val(fullAddress);
                    if(responses.length >=2){
                        city_code = responses[responses.length-2].place_id;
                        $('#city_code').val(city_code);
                        console.log("city_code: "+city_code);
                    }else{
                        city_code = responses[responses[0]].place_id;
                        $('#city_code').val(city_code);
                    }
               } 
               else 
               {       
                 city_code = "Không tìm thấy";
               }   
            }
        );
    });
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
    addMarkerPoint(latitude, longitude);
    // autocomplete = new google.maps.places.Autocomplete(
    // (document.getElementById('address_product_sm')),
    // { types: ['geocode'] });
    // google.maps.event.addListener(autocomplete, 'place_changed', function() {
    // });
}
google.maps.event.addDomListener(window, 'load', initMap);




