<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public\css\loginSignUp.css">
    <link rel="icon" href="images\icon\villago_w.ico" />
    <title>Villago - It takes a village!</title>
</head>
<body class="registrationFormBody">
    <section class="sectionForms">
        <div id="loginFormDiv">
            <!-- <div class="closeItDiv">
                <button id="closeIt" onclick="closeForm()">&times;</button>
            </div> -->
            <div class="login-form">
                <div class="form-box solid">
                    <img class="imgLogin" src="images/logo/villago-transparent-bg.png" alt="Logo Site Villago, white sans serif font, red o with a white roof on top of the o. On top of the chimney on the roof stands a red heart." max-height="80px"/>
                    <form className="theForm">
                        <label class="labelForm" method="get">E-mail</label><br></br>
                        <input type="text" name="email" class="login-box"/><br></br>
                        <label class="labelForm">Password</label><br></br>
                        <input type="password" name="password" class="login-box"/><br></br>
                        <input type="submit" value="LOGIN" class="login-btn" formaction="src\checkPassword.php"/>
                        <p class="textQuestion">Doesn't have an account yet?</p>
                        <a class="createAnAccount" href="">Create an account</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
