(function($){
    var default_lat = -12.0571359;
    var default_lon = -77.0837147;
    var latitude = $('#latitude').val();
    var longitude = $('#longitude').val();
    if(latitude != '' || longitude != ''){
        default_lat = parseFloat(latitude);
        default_lon = parseFloat(longitude);        
    }
    var map = L.map('map').setView([default_lat, default_lon], 17);
    $('#latitude').val(default_lat);
    $('#longitude').val(default_lon);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker([default_lat, default_lon], {draggable:true}).addTo(map).on('dragend', function(e){
        var latlng = marker.getLatLng();
        var lat = latlng.lat;
        var lon = latlng.lng;
        $('#latitude').val(lat);
        $('#longitude').val(lon);
        console.log(lat);
        console.log(lon);
    })
    .bindPopup('Choose location')
    .openPopup();
})(jQuery);