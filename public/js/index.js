
// load website
// javascript fetch from database
// generate cards
// display on client
populateServices();

var objectXHR;

function populateServices() {
    console.log("Hello");

	// 1 - create an XMLHttpRequest object
	objectXHR = new XMLHttpRequest();
		
	// 2 - call the server and make a request
	objectXHR.open("get","src/loadAllServices.php",true);
	objectXHR.send(null);
		
	// 3 - call to js function whenever the state changes
	objectXHR.onreadystatechange = doPopulateServices;
}

function doPopulateServices() {
    if (objectXHR.readyState == 4 && objectXHR.status == 200) {
        
        // responseText = echo by php file
        result = objectXHR.responseText;

        let arrayServices = generateArrayServices(result);
        //console.log(arrayServices);
        loadAllServices(arrayServices);


        // handle no results
        if (result.trim() == "empty") {
            alert("No Results Found!");
        }
        
    }

}


function generateArrayServices(arrServices) {
    let arrayServices = [];
    let oneRow = arrServices.split("|");
    oneRow.forEach(row => {
        let temp = row.split(",");
        if (temp.length == 3) {
            arrayServices.push(temp); 
        }   
    });

    return arrayServices;
}

function loadAllServices(arr) {
    const section_services_list = document.querySelector("#section_services_list");
    //console.log(section_services_list);
    for (let i = 0; i < arr.length; i++) {
        console.log("Execute");
        section_services_list.appendChild(createCard(arr[i]));
    }
} 

function createCard(oneRow) {
    const divCard = document.createElement("div");
    divCard.className = "serviceCard";

    const divImg = document.createElement("div");
    divImg.className = "service-img";

    const divDetails = document.createElement("div");
    divDetails.className = "service-details";

    const h2 = document.createElement("h2");
    h2.className = "service-title";
    const txtH2 = document.createTextNode(oneRow[0]);
    h2.appendChild(txtH2);

    const divTags = document.createElement("div");
    divTags.className = "service-tags";

    const pService = document.createElement("p");
    const txtPService = document.createTextNode(oneRow[1]);
    pService.appendChild(txtPService);

    const pLang = document.createElement("p");
    const txtPLang = document.createTextNode(oneRow[2]);
    pLang.appendChild(txtPLang);

    divTags.appendChild(pService);
    divTags.appendChild(pLang);

    divDetails.appendChild(h2);
    divDetails.appendChild(divTags);

    divCard.appendChild(divImg);
    divCard.appendChild(divDetails);

    return divCard;
}