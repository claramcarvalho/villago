let map, infoWindow;
var objectXHRJsonToGoogleMaps;
var arrayToPlot;
//var entities;
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
                arrayToSaveInLocalStorage = JSON.parse(response);

                var objToSaveLocalStorage = { entity: [] }
                for (var i in arrayToSaveInLocalStorage)
                {
                    var oneEntity = arrayToSaveInLocalStorage[i];

                    objToSaveLocalStorage.entity.push({
                        "id" : oneEntity.id,
                        "name" : oneEntity.name,
                        "lat" : oneEntity.lat,
                        "lgn" : oneEntity.lgn
                    });
                }
                // SAVING IN LOCAL STORAGE FOR USE WHEN LOADING MAP
                localStorage.setItem('allEntities', JSON.stringify(dataFromServer,null,2));
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

    //going through the JSON that was saved in local storage (from PHP, function getJson())
    //////////REF.:
    ////////// https://www.aspsnippets.com/Articles/1131/Google-Maps-API-V3-Load-Add-markers-to-Google-Map-using-JSON-and-JavaScript/
    var listOfEntities = JSON.parse(localStorage.getItem('allEntities'));  /////// OBJECT
    for (const oneEntity of listOfEntities.entity)
    {
        var entLatLng = new google.maps.LatLng(oneEntity.lat,oneEntity.lgn);
        var oneMarker = new google.maps.Marker({
            position: entLatLng, 
            map: map, 
            title:oneEntity.name
        });

        const posMarker = 
                {
                    lat: oneEntity.lat,
                    lng: oneEntity.lgn,
                };

        (function (oneMarker, oneEntity) {
            google.maps.event.addListener(oneMarker, "click", function (e) {
                infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + oneEntity.name + "</div>");
                infoWindow.open(map, oneMarker);
                map.setCenter(posMarker);
            });
        })(oneMarker, oneEntity);
        //latlngbounds.extend(marker.position);
    }

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

getJson();
initMap();

