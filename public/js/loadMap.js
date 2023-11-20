let map, infoWindow;
var objectXHRJsonToGoogleMaps;
var jsonToPlot;
//window.alert("I'm in!!!")
// initMap is now async


async function getJson(){
    //++++++++bringing DATA to JSON obj
    objectXHRJsonToGoogleMaps = null;
    function sendXHR(type, url, data, callback) {
        objectXHRJsonToGoogleMaps = new XMLHttpRequest();
        objectXHRJsonToGoogleMaps.open(type, url, true);
        objectXHRJsonToGoogleMaps.send(data);
        objectXHRJsonToGoogleMaps.onreadystatechange = function() {
            if (this.status === 200 && this.readyState === 4) {
                callback(this.response);
            }
        };
    }

    sendXHR("GET", 
            "src/loadMapsServicesEvents.php", 
            null, 
            function(response) {
                jsonToPlot = JSON.parse(response);
            }
    )
}

async function initMap() {
    // Request libraries when needed, not in the script tag.
    const { Map } = await google.maps.importLibrary("maps");
    // Short namespaces can be used.
    map = new Map(document.getElementById("mapGoogle"), {
        center: { lat: 45.50, lng: -73.70 },
        zoom: 14,
    });

    // Create a <script> tag and set the json obj as the source.
    ///////////NOT WORKING
    //////////TRY TO SAVE JSON IN LOCAL STORAGE --> WEB CLIENT
    const script = document.createElement("script");
    script.src = jsonToPlot;
    document.getElementsByTagName("head")[0].appendChild(script);

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

                infoWindow.setPosition(pos);
                infoWindow.setContent("Location found.");
                infoWindow.open(map);
                map.setCenter(pos);

                //window.alert(pos.lat)
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

const items_callback = function (results) {
    for (let i = 0; i < results.length; i++) {
        const latLng = new google.maps.LatLng(results[i].lat, results[i].lng);

        new google.maps.Marker({
            position: latLng,
            map: map,
        });
    }
};

getJson();
initMap();
window.items_callback = items_callback;

