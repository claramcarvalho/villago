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
    <div class="serviceFinderRegistrationFormDiv">
        <div class="serviceFinderRegistrationFormHeader">Service Finder Registration</div>
        <form class="serviceFinderRegistrationForm">
            <label for="fullName">Name:</label>
            <input type="text" id="fullName" name="fullName">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
            <button id="submitServiceFinder" value="submit">Submit</button>
        </form>
        <img src="./images/logo/villago-transparent-bg.png">
    </div>

    <div class="serviceProviderRegistrationFormDiv">
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
            <button id="submitServiceProvider" value="submit">Submit</button>
        </form>
        <img src="./images/logo/villago-transparent-bg.png">
    </div>

    <div class="culturalPromoterRegistrationFormDiv">
        <div class="culturalPromoterRegistrationFormHeader">Cultural Promoter Registration</div>
        <form class="culturalPromoterRegistrationForm">
            <label for="culturalCompanyName">Company name:</label>
            <input type="text" id="culturalCompanyName" name="culturalCompanyName">
            <button id="submitCulturalPromoter" value="submit">Submit</button>
        </form>
        <img src="./images/logo/villago-transparent-bg.png">
    </div>

    <div class="addNewEventRegistrationFormDiv">
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
            <button id="submitAddNewEvent" value="submit">Submit</button>
        </form>
        <img src="./images/logo/villago-transparent-bg.png">
    </div>

    <div class="addNewRoleDiv">
        
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
    </div>
    <button id="submitAddNewRole" value="submit">Submit</button>
</body>
</html>