function enrutamiento(){
    if(!!navigator.geolocation){
        navigator.geolocation.getCurrentPosition(
            function(position){
                $("#txtlat").val(position.coords.latitude);
                $("#txtlon").val(position.coords.longitude);

                initMap();
            }
        );
    }else{
        alertify.error('No soporta la geolocalización.');
    }
    //initMap();
}

function initMap() {

    var lat = $("#txtlat").val();
    var lng = $("#txtlon").val();

    //alertify.success('Coordenadas' + lat + ' - ' + lng);

	var map;
	//Dibuja el mapa
    map = new google.maps.Map(document.getElementById('mapa'), {
        center: {lat: +lat, lng: +lng},
        zoom: 17
    });

    //Dibuja el marcador
    marker = new google.maps.Marker({
        position: {lat: +lat, lng: +lng},
        map: map,
        title: 'Marcador',
        draggable: true
    });
    
    //Movimiento del marcador y agregar a los campos de texto los valores
    google.maps.event.addListener(marker,'dragend',function(event) {
        document.getElementById('txtlat').value = this.position.lat();
        document.getElementById('txtlon').value = this.position.lng();
    });
}