var button = document.getElementById("submitServiceFinder");

function validPassword()
{
    var pass = document.getElementById("password");
    var confPass = document.getElementById("confirmPassword");

    if (pass.value == confPass.value) {
        return true;
    }
    else {
        alert("Make sure your password match!");
        pass.value = null;
        confPass.value = null;
        return false;
    }
}

button.addEventListener('click', function(event) {
    if (!validPassword()) {
        event.preventDefault();
    }
});