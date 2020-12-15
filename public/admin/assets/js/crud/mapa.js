function coordinatesShort(cordenada, tam) {
    var coordinatesshort = "";
    if (cordenada != '') {
        var strCord = '' + cordenada + '';
        var str = strCord.length;
        for (var c = 0; c <= tam; c++) {
            coordinatesshort += strCord.charAt(c);
        }
    }
    return coordinatesshort;
}

// PONER DOS MAPAS 
// EJM : https://stackoverflow.com/questions/46119086/two-google-maps-displaying-on-one-page
// OBTENER VALUE DE INPUT LATITUD Y LONGITUD
// https://stackoverflow.com/questions/44878472/errorinvalidvalueerror-setcenter-not-a-latlng-or-latlngliteral-in-property-l
function initMap() {

    // AL INICIALIZAR EL MAPA - REGISTER
    // PANAMA : 8.3772293,-80.0962976
    const myLatlng = {lat: 8.3772293, lng: -80.0962976};
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 6,
        center: myLatlng,
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
        content: "Elige tu ubicación",
        position: myLatlng,
    });
    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        //infoWindow.setContent(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));
        infoWindow.setContent("Yo vivo aquí");

        let latilong = mapsMouseEvent.latLng.toJSON();
        var latitud = latilong.lat;
        var longitud = latilong.lng;

        document.getElementById("txtlatitud").value = coordinatesShort(latitud, 11);
        document.getElementById("txtlongitud").value = coordinatesShort(longitud, 11);

        infoWindow.open(map);
    });

    // FIN AL INICIALIZAR EL MAPA - REGISTER


    // AL INICIALIZAR EL MAPA - ACTUALIZAR
//    const myLatlngU = {lat: latitud, lng: longitud};
//    const mapU = new google.maps.Map(document.getElementById("mapU"), {
//        zoom: 25,
//        center: myLatlngU,
//    });
//    // Create the initial InfoWindow.
//    let infoWindow2 = new google.maps.InfoWindow({
//        content: "Elige tu ubicación",
//        position: myLatlngU,
//    });
//    infoWindow2.open(mapU);
//    // Configure the click listener.
//    mapU.addListener("click", (mapsMouseEvent) => {
//        // Close the current InfoWindow.
//        infoWindow2.close();
//        // Create a new InfoWindow.
//        infoWindow2 = new google.maps.InfoWindow({
//            position: mapsMouseEvent.latLng,
//        });
//        //infoWindow.setContent(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));
//        infoWindow2.setContent("Yo vivo aquí");
//
//        let latilong = mapsMouseEvent.latLng.toJSON();
//        var latitud = latilong.lat;
//        var longitud = latilong.lng;
//
//        document.getElementById("txtlatitudu").value = coordinatesShort(latitud, 11);
//        document.getElementById("txtlongitudu").value = coordinatesShort(longitud, 11);
//
//        infoWindow2.open(mapU);
//    });

    // FIN AL INICIALIZAR EL MAPA - ACTUALIZAR
}


function cargarMapaUpdate() {
    // AL INICIALIZAR EL MAPA - ACTUALIZAR
    var lat = parseFloat(document.getElementById('txtlatitudu').value);
    var lng = parseFloat(document.getElementById('txtlongitudu').value);


    if (isNaN(lat) || isNaN(lng)) {
        lat = 8.3772293;
        lng = -80.0962976;
    }

    const myLatlngU = {lat: lat, lng: lng};
    const mapU = new google.maps.Map(document.getElementById("mapU"), {
        zoom: 18,
        center: myLatlngU,
    });
    // Create the initial InfoWindow.
    let infoWindow2 = new google.maps.InfoWindow({
        content: "Elige tu ubicación",
        position: myLatlngU,
    });
    infoWindow2.open(mapU);
    // Configure the click listener.
    mapU.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow2.close();
        // Create a new InfoWindow.
        infoWindow2 = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        //infoWindow.setContent(JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2));
        infoWindow2.setContent("Yo vivo aquí");

        let latilong = mapsMouseEvent.latLng.toJSON();
        var latitud = latilong.lat;
        var longitud = latilong.lng;

        document.getElementById("txtlatitudu").value = coordinatesShort(latitud, 11);
        document.getElementById("txtlongitudu").value = coordinatesShort(longitud, 11);

        infoWindow2.open(mapU);
    });

    // FIN AL INICIALIZAR EL MAPA - REGISTER
}
