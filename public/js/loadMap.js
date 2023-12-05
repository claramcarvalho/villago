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

    //bringing Services
    sendXHR("GET", 
            "src/loadMapsServices.php", 
            null, 
            function(response) {
                var arrayToSaveInLocalStorage = JSON.parse(response);

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
                localStorage.setItem('allServices', JSON.stringify(objToSaveLocalStorage,null,2));
            }
    )

    //bringing Events
    sendXHR("GET", 
            "src/loadMapsEvents.php", 
            null, 
            function(response) {
                var arrayToSaveInLocalStorage = JSON.parse(response);

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
                localStorage.setItem('allEvents', JSON.stringify(objToSaveLocalStorage,null,2));
            }
    )
}

function pinMarkers(listOfEntities, markerIcon, type) {
    
    for (const oneEntity of listOfEntities.entity) {        
        var entLatLng = new google.maps.LatLng(oneEntity.lat,oneEntity.lgn);
        var oneMarker = new google.maps.Marker({
            position: entLatLng, 
            map: map, 
            title:oneEntity.name,
            icon: markerIcon
        });

        const posMarker = 
            {
                lat: oneEntity.lat,
                lng: oneEntity.lgn,
            };
        
        let content = "";
        if (type == "pr") {
            content = contentServices(oneEntity);
        }
        else if (type == "ev"){
            content = contentEvents(oneEntity);
        }
        else {
            content = contentEvents(oneEntity);
        }

        (function (oneMarker, oneEntity) {
            google.maps.event.addListener(
                oneMarker, 
                "click", 
                function (e) {
                    infoWindow.setContent(content);
                    infoWindow.open(map, oneMarker);
                    map.setCenter(posMarker);
                }
            );
        })(oneMarker, oneEntity);
    }
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
    //creating markers
    //////////REF.:
    ////////// https://www.aspsnippets.com/Articles/1131/Google-Maps-API-V3-Load-Add-markers-to-Google-Map-using-JSON-and-JavaScript/
    var listOfProviders = JSON.parse(localStorage.getItem('allServices'));  /////// OBJECT
    var markerIconProvider = 'images/icon/service.png';   /// MARKER

    pinMarkers(listOfProviders,markerIconProvider,"pr");

    var listOfEvents = JSON.parse(localStorage.getItem('allEvents'));  /////// OBJECT
    var markerIconEvent = 'images/icon/event.png';   /// MARKER

    pinMarkers(listOfEvents,markerIconEvent,"ev");

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

function contentServices(oneService) {
    return "<div style = 'width:200px;min-height:40px'>"+
                "<div class='serviceCard' style = 'width:200px'>" +
                    "<div class='service-img'>" +
                    "</div>" +
                    "<div class='service-details'>" +
                        "<h2 class='service-title'>"+
                            oneService.name
                        "</h2>"+
                    "</div>" +
                "</div>" +
            "</div>";
}

function contentEvents(oneEvent) {
    return "<div style = 'width:200px;min-height:40px'>"+
                "<div class='serviceCard' style = 'width:200px'>" +
                    "<div class='service-img'>" +
                    "</div>" +
                    "<div class='service-details'>" +
                        "<h2 class='service-title'>"+
                            oneEvent.name +
                        "</h2>"+
                    "</div>" +
                "</div>" +
            "</div>";
}

function contentDefault(oneEntity) {
    return "<div style = 'width:200px;min-height:40px'>" + oneEntity.name + "</div>"
}

getJson();
initMap();

