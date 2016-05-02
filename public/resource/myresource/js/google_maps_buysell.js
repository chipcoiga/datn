$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
    new google.maps.Size(32, 32), new google.maps.Point(0, 0),
    new google.maps.Point(16, 32));
var center = null;
var map = null;
var currentPopup;
var bounds = new google.maps.LatLngBounds();
var listMarker = [];
var listPoint =[];


function doGoClick(){
    var searchKey = $("#searchKey").val();
    var searchCity = $("#searchCity").val();
    var searchType = $("#searchType").val();
    getProductAjax(searchKey,searchCity,searchType);
}

function getProductAjax(searchKey,searchCity,searchType){
    $.post("doSearch",
        {
            searchKey: searchKey,
            searchCity: searchCity,
            searchType: searchType
        }
        ,function(data){
            console.log('a'+data);
        if(data != ""){
            console.log('a'+data);
            $(".show_result").html('');
            listPoint =[];
            for(var i=data.length-1;i>=0;i--){
                var content_item = "<div class='li_tag'>"
                    +"<div class='thumbnails_item' onclick='doViewMaps("+data[i].id+");'><img class='thumbnails_item' src='uploads/"+data[i].imglink+"' alt="+data[i].title+"/></div>"
                    +"<div class='info_item'>"
                        +"<div class='content_item' onclick='doViewMaps("+data[i].id+");'>"
                            +"<div class='title_item'>"+data[i].title+"</div>"
                            +"<div class='cost_item'>"+data[i].cost+"</div>"
                            +"<div class='timePost_item'>"+data[i].created_at+"</div>"
                        +"</div>"
                        +"<div class='button_item'><a href='viewDetail?id="+data[i].id+"'><button>Chi tiết</button></a></div>"
                    +"</div>"
                +"</div>";
                $(".show_result").append(content_item);
                listPoint.push({'latitude': data[i].latitude, 'longitude': data[i].longitude,'title':data[i].title, 'id':data[i].id});
            } 
            showAll();         
        }else{
            $(".msg").text('Không tìm thấy dữ liệu').show().fadeOut(2000);
        }     
    });
}

function doViewMaps(id) {
    clearAll();
    showMarker(id);
}

function  addMarkerPoint(lat, lng, title, id) {
    var myMarker=new google.maps.LatLng(lat, lng);
    var info = "<a href='viewDetail?id="+id+"'>"+title+"</a>";
    var marker=new google.maps.Marker({
        position:myMarker,
        icon: icon,
        map: map
    });

    var popup = new google.maps.InfoWindow({
        content: info,
        maxWidth: 300
    });

    google.maps.event.addListener(marker, "click", function() {
        if (currentPopup != null) {
            currentPopup.close();
            currentPopup = null;
        }
        popup.open(map, marker);
        currentPopup = popup;
    });
    //marker.setMap(map);
    listMarker.push({id,marker});
}

function showMarker(id){   
    clearAll();
    for(var i =0; i<listPoint.length; i++){
        if(listPoint[i].id==id){
            addMarkerPoint(listPoint[i].latitude, listPoint[i].longitude, listPoint[i].title, listPoint[i].id);
        }
    }
}

function clearAll(){
    for(var i =0; i<listMarker.length; i++){
        listMarker[i].marker.setMap(null);
    }
}

function showAll(){
    clearAll();
    listMarker = [];
    for(var i =0; i<listPoint.length; i++){
        addMarkerPoint(listPoint[i].latitude, listPoint[i].longitude, listPoint[i].title, listPoint[i].id);     
    }
}

function initMap(){
    map = new google.maps.Map(document.getElementById("map_view"), {
        center: new google.maps.LatLng(16.060244698576117, 108.18938446044922),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        zoomControl:true,
        zoomControlOptions: {
            style:google.maps.ZoomControlStyle.DEFAULT
        }
    });
    center = bounds.getCenter();
    getProductAjax("",'ChIJEyolkscZQjERBn5yhkvL8B0',1);
}
google.maps.event.addDomListener(window, 'load', initMap);


$( document ).ready(function() {
    var h = $(window).height();
    $("#search_result").css('height',(h-130));
    $("#maps").css('height',(h-130));

    $("#searchKey").keypress(function(e) {
        if(e.which == 13) {
            doGoClick();
        }
    });
});

$(window).resize(function(){
    var h = $(window).height();
    $("#search_result").css('height',(h-130));
    $("#maps").css('height',(h-130));  
});
