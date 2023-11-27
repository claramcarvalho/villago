<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public\css\normalize.css">
    <link rel="stylesheet" href="public\css\registration.css">
    <link rel="icon" href="images\icon\villago_w.ico" />
    <title>Villago - It takes a village!</title>
</head>
<body class="registrationFormBody"> 
    <section class="sectionForms">

        <div id="loginFormDiv" style="display: none">
            <div class="closeItDiv">
                <button id="closeIt" onclick="closeForm()">&times;</button>
            </div>
            <div class="login-form">
                <div class="form-box solid">
                    <img class="imgLogin" src="images/logo/villago-transparent-bg.png" alt="Logo Site Villago, white sans serif font, red o with a white roof on top of the o. On top of the chimney on the roof stands a red heart." max-height="80px"/>
                    <form className="theForm">
                        <label class="labelForm">E-mail</label><br></br>
                        <input type="text" name="email" class="login-box"/><br></br>
                        <label class="labelForm">Password</label><br></br>
                        <input type="password" name="password" class="login-box" /><br></br>
                        <input type="submit" value="LOGIN" class="login-btn" />
                        <p class="textQuestion">Doesn't have an account yet?</p>
                        <a class="createAnAccount" href="">Create an account</a>
                    </form>
                </div>
            </div>
        </div>

        <div id="settingsFormDiv" style="display: none">
            <div class="closeItDiv">
                <button id="closeIt" onclick="closeForm()">&times;</button>
            </div>
            <div class="login-form">
                <div class="form-box solid">
                    <img class="imgLogin" src="images/logo/villago-transparent-bg.png" alt="Logo Site Villago, white sans serif font, red o with a white roof on top of the o. On top of the chimney on the roof stands a red heart." max-height="80px"/>
                    <form className="theForm">
                        <label class="labelForm">Service</label><br></br>
                        <input type="text" name="serviceType" class="login-box"/><br></br>
                        <label class="labelForm">Language</label><br></br>
                        <input type="password" name="language" class="login-box" /><br></br>
                        <label class="labelForm">Distance</label><br></br>
                        <input type="password" name="distance" class="login-box" /><br></br>
                        <label class="labelForm">Price</label><br></br>
                        <input type="password" name="price" class="login-box" /><br></br>
                        <input type="submit" value="SEARCH" class="login-btn" />
                    </form>
                </div>
            </div>
        </div>

        <div class="serviceFinderRegistrationFormDiv" id = "newFinderFormDiv" style="display: none">
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
            <img src="./images/logo/villago-transparent-bg.png">
        </div>

        <div class="serviceProviderRegistrationFormDiv" id = "newProviderFormDiv" style="display: none"> 
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
                <button id="verifyProviderAddress" type="button" value="ProviderAddress">Verify Address</button>
                <button id="submitServiceProvider" value="submit">Submit</button>
            </form>
            <img src="./images/logo/villago-transparent-bg.png">
        </div>

        <div class="culturalPromoterRegistrationFormDiv" id = "newPromoterFormDiv" style="display: none">
            <div class="culturalPromoterRegistrationFormHeader">Cultural Promoter Registration</div>
            <form class="culturalPromoterRegistrationForm">
                <label for="culturalCompanyName">Company name:</label>
                <input type="text" id="culturalCompanyName" name="culturalCompanyName">
                <button id="submitCulturalPromoter" value="submit">Submit</button>
            </form>
            <img src="./images/logo/villago-transparent-bg.png">
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
            <img src="./images/logo/villago-transparent-bg.png">
        </div>

        <div class="addNewRoleDiv" id="newRoleFormDiv" style="display: none">
            
            <span class="chooseRoleQuestionTitle">Do you want to choose another role?</span>
            <div class="chooseRoleQuestionDiv">
                <label for="chooseYes">Yes</label>
                <input type="radio" id="chooseYes" name="chooseYes" value="yes">
                <label for="chooseNo">No</label>
                <input type="radio" id="chooseNo" name="chooseNo" value="no">
            </div>

            <span class="chooseRole">Choose your new role:</span>
            <div class="chooseRoleDiv">
                <label for="chooseServiceProvider">Service Provider</label>
                <input type="radio" id="chooseServiceProvider" name="chooseServiceProvider" value="Service Provider">
                <label for="chooseCulturalPromoter">Cultural Promoter</label>
                <input type="radio" id="chooseCulturalPromoter" name="chooseCulturalPromoter" value="Cultural Promoter">
            </div>

            <button id="submitAddNewRole" value="submit">Submit</button>
        </div>
        
    </section>
    <!--
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
    -->
</body>
<script type="module" src="public\js\Geocode.js"></script>
<script type="module" src="public\js\validatePassword.js"></script>
<script type="module" src="public\js\formsLoginSignUp.js"></script>
</html>