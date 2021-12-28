let map;
let infowindow;
let markers = [];
let searchInput = document.getElementById("search-input");
let baseUrl = 'https://azergubre.az/assets/';
let zoom = 14;
let locations;
$.ajax({
    type: 'GET',
    url: `api/locations`,
    dataType: 'JSON',
    async: false,
    success: (data) => {
        locations = data;
    },
    errors: (e) => {
        console.log(e)
    }
})

console.log(locations);
async function initAutocomplete() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 40.373092, lng: 49.833541 },
        zoom: zoom,
        mapTypeControl: false,
    });

    // const response = await fetch(baseUrl + 'json/map.json');
    let data = locations;
    for (let i = 0; i < data.length; i++) {
        createMarker(new google.maps.LatLng(data[i].latitude, data[i].longitude),data[i].address);
    }


    //autocomplete search with owner input
    searchPlace();

    //click marker event and open info window
    clickMarker();
}

//create marker
function createMarker(location, address) {
    let marker = new google.maps.Marker({
        map,
        position: location,
        icon: baseUrl + "images/pin.svg",
        anchorPoint: new google.maps.Point(0, -29),
    });
    marker.setVisible(true);
    marker.addListener("click", () => {
        $("#search-input").val(address);
    });
    markers.push(marker);
}

//autocomplete search with owner input
function searchPlace() {
    const options = {
        fields: ["formatted_address", "geometry", "name"],
        componentRestrictions: { country: 'az' },
        strictBounds: false,
        types: ["(regions)"],
    };
    let autocomplete = new google.maps.places.Autocomplete(searchInput, options);
    autocomplete.bindTo("bounds", map);
    autocomplete.addListener("place_changed", () => {
        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(zoom);
        }

    });
}

//choose city select event
function chooseCity(event) {
    if (!event.value.length) {
        $('.sale_point_select_point').css('display', 'none');
        $('.sale_point_select_point').find('select').html("");
        return false;
    }
    $('.sale_point_select_point').css('display', 'block');
    const points = locations.filter(l => l.city_id == $(event).val());
    let html = '<option value="" disabled selected>Ünvan</option>';
    points.forEach((p) => {
        html += `<option value="${p.address}" data-lat="${p.latitude}" data-lng="${p.longitude}">${p.address}</option>`
    })
    $('.sale_point_select_point').find('select').html(html);

}
function chooseAddress(event) {
    const location = {
        lat: parseFloat($('option:selected', event).attr('data-lat')),
        lng: parseFloat($('option:selected', event).attr('data-lng'))
    }

    const request = {
        query: event.value,
        fields: ["name", "geometry"],
    };
    //get location for address
    map = new google.maps.Map(document.getElementById("map"), {
        center: location,
        zoom: 17,
        mapTypeControl: false,
    });
    createMarker(location,event.value);
}
//get location for address
function getLocationForPlace(request) {
    service = new google.maps.places.PlacesService(map);
    service.findPlaceFromQuery(request, (results, status) => {
        if (status === google.maps.places.PlacesServiceStatus.OK && results) {
            map.setCenter(results[0].geometry.location);
            map.setZoom(zoom);
        }
    });
}

//click marker event and open info window
function clickMarker() {
    markers.forEach(function (marker) {
        google.maps.event.addListener(marker, 'click', (function (chooseMarker) {
            return function () {
                getPlaceForLocation(marker.getPosition(), chooseMarker);
            }
        })(marker));
    })
}

//create info box when click marker
function getInfoContent(formatted_address, chooseMarker) {
    if (infowindow) {
        infowindow.close();
    }

    infowindow = new google.maps.InfoWindow();
    infowindow.setContent(formatted_address);
    infowindow.open(map, chooseMarker);
}

//get place for info window for location
function getPlaceForLocation(location, chooseMarker) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: location })
        .then((response) => {
            if (response.results[0]) {
                getInfoContent(response.results[0].formatted_address, chooseMarker);
            } else {
                window.alert("No results found");
            }
        })
        .catch((e) => window.alert("Geocoder failed due to: " + e));
}

