let map, infoWindow;
let buttonVerifyProviderAddress = document.getElementById("verifyProviderAddress");
let buttonVerifyEventAddress = document.getElementById("verifyEventAddress");


var nb = document.getElementById("locationNumber");
var street = document.getElementById("street");
var city = document.getElementById("city");
var pc = document.getElementById("postalCode");

buttonVerifyProviderAddress.addEventListener("click", onClickVerifyAddress);
buttonVerifyEventAddress.addEventListener("click", onClickVerifyAddress);

initMap();

async function initMap() {
    // Request libraries when needed, not in the script tag.
    const { Map } = await google.maps.importLibrary("maps");
    // Short namespaces can be used.
    map = new Map(document.getElementById("mapGoogle"), {
        center: { lat: 45.50, lng: -73.70 },
        zoom: 14,
    });

    infoWindow = new google.maps.InfoWindow();

    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(
            (position) => 
            {
                const pos = 
                {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                //infoWindow.setPosition(pos);
                //infoWindow.setContent("Location found.");
                //infoWindow.open(map);
                map.setCenter(pos);
            },
            () => 
            {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        );
    }
    
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) 
{
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation.",
    );
    infoWindow.open(map);
}

function onClickVerifyAddress()
{
    const sectionMap = document.querySelector(".sectionMap");
    console.log(sectionMap);
    sectionMap.style.display = "block";

    let vNb = nb.value;
    let vStreet = street.value;
    let vCity = city.value;
    let vPC = pc.value;
    let address = vNb.concat(" ", vStreet, " " , vCity, " ", vPC);
    console.log(address);
    codeAddress(address);

}

function codeAddress(address) {
    //https://gist.github.com/lazarofl/3901081
    let geocoder = new google.maps.Geocoder();
    var marker;
    //var result;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            //result = results[0].geometry.location;
            //console.log(results[0].geometry.location.lat());
            createFields(results[0].geometry.location);
            marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                draggable: true,
                icon: 'images/icon/default.png'
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });

    //return result;
}

function createFields (location)
{
    const formProvider = document.querySelector(".serviceProviderRegistrationForm");
    //console.log(formProvider);
    const formEvent = document.querySelector(".addNewEventRegistrationForm");

    const inputLat = document.createElement("input");
    inputLat.type = "number";
    inputLat.name = "lat";
    inputLat.value = location.lat();
    inputLat.style.display = "none";

    const inputLong = document.createElement("input");
    inputLong.type = "number";
    inputLong.name = "lgn";
    inputLong.value = location.lng();
    inputLong.style.display = "none";

    formProvider.appendChild(inputLat);
    formProvider.appendChild(inputLong);
    formEvent.appendChild(inputLat);
    formEvent.appendChild(inputLong);
}