//Sample code written by August Li
var icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
    new google.maps.Size(32, 32), new google.maps.Point(0, 0),
    new google.maps.Point(16, 32));
var center = null;
var map = null;
var currentPopup;
var bounds = new google.maps.LatLngBounds();

function addMarker(lat, lng, info){
    var pt = new google.maps.LatLng(lat, lng);
    bounds.extend(pt);
    var marker = new google.maps.Marker({
        position: pt,
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

    google.maps.event.addListener(popup, "closeclick", function() {
        map.panTo(center);
        currentPopup = null;
    });

}

function initMap(){
    map = new google.maps.Map(document.getElementById("map_view"), {
        center: new google.maps.LatLng(16.0680319, 107.9385032),
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        zoomControl:true,
        zoomControlOptions: {
            style:google.maps.ZoomControlStyle.DEFAULT
        }
        // mapTypeControlOptions: {
        //     style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
        // },
        // navigationControl: true,
        // navigationControlOptions: {
        //     style: google.maps.NavigationControlStyle.SMALL
        // }
    });
    center = bounds.getCenter();
    //map.fitBounds(bounds);
}
google.maps.event.addDomListener(window, 'load', initMap);