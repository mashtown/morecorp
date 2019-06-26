$(document).ready(function() {
    // Google maps initialization
    $('.map-container').each(function(){
        var map_latitude = $(this).data('latitude');
        var map_longitude = $(this).data('longitude');
        var map_id = $(this).attr('id');
        var map_zoom = parseInt($(this).data('zoom'));
        setUpMap(map_latitude,map_longitude,map_id,map_zoom);
    });
});
/* Google Map styling - Get some cool themes from https://snazzymaps.com/ */
var styles = [{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"administrative.country","elementType":"labels.text.fill","stylers":[{"color":"#ed5929"}]},{"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#c4c4c4"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#ed5929"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21},{"visibility":"on"}]},{"featureType":"poi.business","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ed5929"},{"lightness":"0"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway","elementType":"labels.text.stroke","stylers":[{"color":"#ed5929"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#575757"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.stroke","stylers":[{"color":"#2c2c2c"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#999999"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];
function setUpMap(latitude,longitude,elemID,zoom){
    latitude = ( typeof latitude !== 'undefined' ) ? latitude : 0;
    longitude = ( typeof longitude !== 'undefined' ) ? longitude : 0;
    elemID = ( typeof elemID !== 'undefined' ) ? elemID : 0;
    zoom = ( typeof zoom !== 'undefined' ) ? zoom : 14;

    var image = new google.maps.MarkerImage('/assets/images/map-point.png', new google.maps.Size(70,70), new google.maps.Point(0,0), new google.maps.Point(35,35));
    var mapLatLng = new google.maps.LatLng(latitude,longitude);
    var mapOptions = {zoom:zoom,center:mapLatLng,mapTypeId: google.maps.MapTypeId.ROADMAP,mapTypeControl:!1,scrollwheel:!1,draggable:!0,navigationControl:!1};
    var map = new google.maps.Map(document.getElementById(elemID), mapOptions);

    //var gps_string = ddversdms(latitude,longitude);

    //var labelContent = '<div class="google-map-marker-arrow"><span class="fa fa-caret-left"></span></div><div class="google-map-marker-text">' + gps_string + '</div>';

    new google.maps.Marker({position: mapLatLng, map: map, icon: image});
    /*var marker = new MarkerWithLabel({
        position: mapLatLng,
        map: map,
        icon: image,
        labelContent: labelContent,
        labelAnchor: new google.maps.Point(-15,30),
        labelClass: 'google-map-marker-label'
    });*/

    map.setOptions({styles: styles});

    //map.panBy(120,-10);
}

//function ddversdms(latitude, longitude) {
//
//    var lat = parseFloat(latitude) || 0;
//    var lng = parseFloat(longitude) || 0;
//
//    lat = Math.abs(lat);
//    lng = Math.abs(lng);
//
//    var latdeg = Math.floor(lat);
//    var latmin = Math.floor((lat - latdeg) * 60);
//    var latsec = Math.round((lat - latdeg - latmin / 60) * 1000 * 3600) / 1000;
//    var lngdeg = Math.floor(lng);
//    var lngmin = Math.floor((lng - lngdeg) * 60);
//    var lngsec = Math.floor((lng - lngdeg - lngmin / 60) * 1000 * 3600) / 1000;
//
//    if ( latmin.toString().length == 1 ) { latmin = '0' + latmin; }
//    if ( latsec.toString().length == 1 ) { latsec = '0' + latsec; }
//    if ( lngmin.toString().length == 1 ) { lngmin = '0' + lngmin; }
//    if ( lngsec.toString().length == 1 ) { lngsec = '0' + lngsec; }
//
//    return latdeg + '&deg;' + latmin + '\'' + latsec + '"S | ' + lngdeg + '&deg;' + lngmin + '\'' + lngsec + '"E';
//}