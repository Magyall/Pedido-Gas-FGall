<script type="text/javascript">
    /*
    navigator.geolocation.getCurrentPosition(function(position){
        let lat = position.coords.latitude;
        let long = position.coords.longitude;
    });
    */
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('mapa'), {
            center: {lat: -0.076136, lng: -78.435666},
            zoom: 17
        });
        var marker = new google.maps.Marker({
            position: {lat: -0.076136, lng: -78.435666},
            map: map,
            title: 'Marcador'
        });
    }
    /*
    var myLatLng = { lat: -0.076136, lng: -78.435666 };
    var myLatLng2 = { lat: -0.082769, lng: -78.437085 };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('mapa'), {
          zoom: 4,
          center: myLatLng,
          zoom: 13
        });
      
        var markerYesShow = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Yes Show Into Radio'
        });
        
        var markerNotShow = new google.maps.Marker({
          position: myLatLng2,
          map: map,
          title: 'Not Show '
        });
      
        var alerta = new google.maps.Circle({
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          map: map,
          center: myLatLng,
          radius: 100
        });
    }
    */
    /*
    var latitud = -0.076136;
    var longitud = -78.435666;
    var coordenadas = {
        lng: longitud,
        lat: latitud
    }

    generarMapa(coordenadas);

    function generarMapa(coordenadas){
        var mapa = new google.maps.Map(document.getElementById('mapa'),
        {
            zoom: 17,
            center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
        });

        var markerYesShow = new google.maps.Marker({
            position: myLatLng,
            map: mapa,
            title: 'Yes Show Into Radio'
        });
    }
    */
</script>