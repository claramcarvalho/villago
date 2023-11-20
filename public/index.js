function openForm() {
    
    const box = document.getElementById("loginFormDiv");
    box.style.display = "block";

}

function closeForm() {
    
    const box = document.getElementById("loginFormDiv");
    box.style.display = "none";

}

function activatePersonalTab() {
    
    const personal = document.getElementById("personalPage");
    const serviceProvider = document.getElementById("serviceProviderPage");
    const culturalPromoter = document.getElementById("culturalPromoterPage");

    personal.style.display = "block";
    serviceProvider.style.display = "none";
    culturalPromoter.style.display = "none";
}

function activateServiceProviderTab() {
    
    const personal = document.getElementById("personalPage");
    const serviceProvider = document.getElementById("serviceProviderPage");
    const culturalPromoter = document.getElementById("culturalPromoterPage");
    
    personal.style.display = "none";
    serviceProvider.style.display = "block";
    culturalPromoter.style.display = "none";
}

function activateCulturalPromoterTab() {
    
    const personal = document.getElementById("personalPage");
    const serviceProvider = document.getElementById("serviceProviderPage");
    const culturalPromoter = document.getElementById("culturalPromoterPage");
    
    personal.style.display = "none";
    serviceProvider.style.display = "none";
    culturalPromoter.style.display = "block";
}