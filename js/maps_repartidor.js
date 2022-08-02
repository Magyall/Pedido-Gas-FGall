var map;

function enrutamiento(){
    if(!!navigator.geolocation){
        navigator.geolocation.getCurrentPosition(
            function(position){
                $("#txtlat").val(position.coords.latitude);
                $("#txtlon").val(position.coords.longitude);

                var lat = $("#txtlatentrega").val();
                var lon = $("#txtlonentrega").val();

                initMap1(lat, lon);
            }
        );
    }else{
        alertify.error('No soporta la geolocalización.');
    }
}

function initMap1(lat, lon) {

    var latactual = $("#txtlat").val();
    var lngactual = $("#txtlon").val();

    //alertify.success('Coordenadas' + latactual + ' - ' + lngactual);
    //Dibuja el mapa
    map = new google.maps.Map(document.getElementById('mapa'), {
        center: {lat: +latactual, lng: +lngactual},
        zoom: 17
    });

    //Trazo de rutas
    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);
    const request = {
       origin: new google.maps.LatLng(latactual, lngactual),
       destination: new google.maps.LatLng(lat, lon),
       travelMode: 'WALKING'
    };

    directionsService.route(request, response => {
       directionsRenderer.setDirections(response);
    });
    
    setInterval("prueba()", 1500, map);
    
}

function prueba(){
    navigator.geolocation.getCurrentPosition(
        function(position){
            latactual = position.coords.latitude;
            lonactual = position.coords.longitude;
        }
    );
    
    //alertify.success(latactual+" - "+lonactual);
    
    var marker2 = new google.maps.Marker({
        position: {lat: +latactual, lng: +lonactual},
        draggable: false
    });
    
    marker2.setMap(map);
}