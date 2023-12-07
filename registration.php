<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public\css\normalize.css">
    <link rel="stylesheet" href="public\css\registration.css">
    <link rel="icon" href="images\icon\villago_w.ico" />
    <title>Villago - It takes a village!</title>

</head>
<script type="text/javascript">
    function onSubmitServiceFinderRegistration(){
        let name = document.getElementById("fullName").value
        let email = document.getElementById("email").value
        let phone = document.getElementById("phone").value
        let pass = document.getElementById("password").value
        let conPass = document.getElementById("confirmPassword").value
        
        if (name == "" || email == "" || phone == "" || pass == "" || conPass == "")
        {
            alert("Some obligatory field is empty");
        } else {
            alert("User registered : " + name);
            document.getElementById("newFinderFormDiv").style.display = "none";
            document.getElementById("addNewRoleDiv").style.display = "block";
        }
    }
    
    function hideServiceFinderRegistration(){
        document.getElementById("newFinderFormDiv").style.display = "none";
        document.getElementById("addNewRoleDiv").style.display = "block";

    }
    function showServiceFinderRegistration(){
        document.getElementById("newFinderFormDiv").style.display = "block";
        document.getElementById("addNewRoleDiv").style.display = "none";
    }
    function radioButtons(){
        if (document.getElementById("chooseYes").checked){
            document.getElementById("chooseRole").style.display = "block";
            document.getElementById("chooseRoleDiv").style.display = "block";
            document.getElementById("submitAddNewRoleDiv").style.display = "block";
            document.getElementById("goToIndex").style.display = "none";
        }
        if (document.getElementById("chooseNo").checked){
            document.getElementById("chooseRole").style.display = "none";
            document.getElementById("chooseRoleDiv").style.display = "none";
            document.getElementById("submitAddNewRoleDiv").style.display = "none";
            document.getElementById("goToIndex").style.display = "block";
        }
    }
    function radioButtonsChooseNewRole(){
        if (document.getElementById("chooseServiceProvider").checked){
            document.getElementById("newProviderFormDiv").style.display = "block";
            document.getElementById("newPromoterFormDiv").style.display = "none";
            document.getElementById("addNewRoleDiv").style.display = "none";

        }
        if (document.getElementById("chooseCulturalPromoter").checked){
            document.getElementById("newProviderFormDiv").style.display = "none";
            document.getElementById("newPromoterFormDiv").style.display = "block";
            document.getElementById("addNewRoleDiv").style.display = "none";

        }
    }
</script>
<body class="registrationFormBody">
    <section class="sectionForms">
        
        <div id="newFinderFormDiv" <?php session_start(); if(isset($_SESSION["NAME"])) {echo " style='display:none'";} else {echo " style='display:block'";};?>>
            <div class="serviceFinderRegistrationFormHeader">Service Finder Registration</div>
            <form class="serviceFinderRegistrationForm" id="registrationForm">

                <label for="fullName">Name:</label>
                <input type="text" id="fullName" name="fullName">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
                <button formaction="./src/registerNewFinder.php" id="submitServiceFinder" value="submit">Submit</button>
            </form>            
        </div>

        <div id="addNewRoleDiv" <?php if(isset($_SESSION["NAME"])) {echo " style='display:block'";};?>>
            <span class="chooseRoleQuestionTitle">Do you want to choose another role?</span>
            <div class="chooseRoleQuestionDiv">
                <label for="chooseYes">Yes</label>
                <input type="radio" id="chooseYes" name="choose" value="yes" onclick="radioButtons()" >
                <label for="chooseNo">No</label>
                <input type="radio" id="chooseNo" name="choose" value="no" onclick="radioButtons()" >
            </div>

            <a id="goToIndex" style="display: none" href="javascript:window.close();"><h3>Go to index</h3></a>

            <span id="chooseRole" style="display: none">Choose your new role:</br></span>

            <div id="chooseRoleDiv" style="display: none">
                <label for="chooseServiceProvider">Service Provider</label>
                <input type="radio" id="chooseServiceProvider" name="chooseService" value="Service Provider">
                <label for="chooseCulturalPromoter">Cultural Promoter</label>
                <input type="radio" id="chooseCulturalPromoter" name="chooseService" value="Cultural Promoter">
            </div>
            <div id="submitAddNewRoleDiv" style="display:none">
                <button id="submitAddNewRole" value="submit" onclick="radioButtonsChooseNewRole()">Submit</button>
            </div>
        </div>

        <div id ="newProviderFormDiv" style="display: none"> 
            <div class="serviceProviderRegistrationFormHeader">Service Provider Registration</div>
            <form class="serviceProviderRegistrationForm">
                <label for="companyName">Company name:</label>
                <input type="text" id="companyName" name="companyName">
                <label for="street">Street:</label>
                <input type="text" id="street" name="street">
                <label for="locationNumber">Number:</label>
                <input type="text" id="locationNumber" name="locationNumber">
                <label for="city">City:</label>
                <input type="text" id="city" name="city">
                <label for="postalCode">Postal Code:</label>
                <input type="text" id="postalCode" name="postalCode">
                <label for="province">Province:</label>
                <input type="text" id="province" name="province">
                <label for="latitude">Latitude:</label>
                <input type="text" id="latitude" name="latitude">
                <label for="longitude">Longitude:</label>
                <input type="text" id="longitude" name="longitude">
                <button id="verifyProviderAddress" type="button" value="ProviderAddress">Verify Address</button>
                <button formaction="./src/registerNewProvider.php"  id="submitServiceProvider" value="submit" style="display:none">Submit</button>
            </form>
        </div>

        <div id="newPromoterFormDiv" style="display: none">
            <div class="culturalPromoterRegistrationFormHeader">Cultural Promoter Registration</div>
            <form class="culturalPromoterRegistrationForm">
                <label for="culturalCompanyName">Company name:</label>
                <input type="text" id="culturalCompanyName" name="culturalCompanyName">
                <button formaction="./src/registerNewPromoter.php"  id="submitCulturalPromoter" value="submit">Submit</button>
            </form>
        </div>

        <div class="addNewEventRegistrationFormDiv" id="newEventFormDiv" style="display: none">
            <div class="addNewEventRegistrationFormHeader">Add new event</div>
            <form class="addNewEventRegistrationForm">
                <label for="eventName">Event name:</label>
                <input type="text" id="eventName" name="eventName">
                <label for="streetEvent">Street:</label>
                <input type="text" id="streetEvent" name="streetEvent">
                <label for="locationNumberEvent">Number:</label>
                <input type="text" id="locationNumberEvent" name="locationNumberEvent">
                <label for="cityEvent">City:</label>
                <input type="text" id="cityEvent" name="cityEvent">
                <label for="postalCodeEvent">Postal Code:</label>
                <input type="text" id="postalCodeEvent" name="postalCodeEvent">
                <label for="provinceEvent">Province:</label>
                <input type="text" id="provinceEvent" name="provinceEvent">
                <label for="eventDateTime">Date and Time:</label>
                <input type="text" id="eventDateTime" name="eventDateTime">
                <button id="verifyEventAddress" type="button" value="EventAddress">Verify Address</button>
                <button id="submitAddNewEvent" value="submit">Submit</button>
            </form>
        </div>
    </section>

    <section class="sectionMap" style="display: none">
        <div id="mapGoogle"></div>    
        <script>
            (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
                key: "AIzaSyCfOFNxXGnb4od4rF9a3c4eKmECqbblPF8",
                v: "weekly",
                // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
                // Add other bootstrap parameters as needed, using camel case.
            });
        </script>
    </section>

</body>
<script type="module" src="public\js\validatePassword.js"></script>
<script type="module" src="public\js\formsLoginSignUp.js"></script>
<script type="module" src="public\js\Geocode.js"></script>
<script src="public\js\registration.js"></script>
</html>


                