document.getElementById("login_form").addEventListener("submit", function(event) {
    const emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    let error = 0;

    // Check the email
    let errorMessageEmail = document.getElementById("email_error");
    let elementEmail = document.getElementById("email");

    if (!elementEmail.value.match(emailPattern)) {
        errorMessageEmail.innerText = "Incorrect format!";
        error += 1;
    }
    else {
        errorMessageEmail.innerText = "";
    }

    // Check the password
    let errorMessagePass = document.getElementById("pass_error");
    let elementPass = document.getElementById("pass");

    if (elementPass.value.length < 8) {
        errorMessagePass.innerText = "The password must be at least 8 characters long!";
        error += 1;
    }
    else {
        errorMessagePass.innerText = "";
    }

    // Do not send the form in case of an error
    if (error) {
        elementPass.value = "";
        event.preventDefault();
    }
});