<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public\css\normalize.css">
    <link rel="stylesheet" href="public\css\logout.css">
    <link rel="icon" href="images\icon\villago_w.ico" />
    <title>Villago - It takes a village!</title>
</head>
<body>
    <div class="logoutSection">
        <div id="logoutDiv">
            <div id="image-logout">
                <img class="imgLogout" src="images/logo/villago-transparent-bg.png" alt="Logo Site Villago, white sans serif font, red o with a white roof on top of the o. On top of the chimney on the roof stands a red heart." max-height="80px"/>
            </div>
            <div id="logout-button-div">
                <h2 id="question-logout">Are you sure you want to sign out?</h2>
                <form>
                    <input id="button-logout" type="submit" formaction="src\destroySection.php" value="Sign Out"/>
                </form>
            </div>
        </div>
</div>
</body>
</html>
