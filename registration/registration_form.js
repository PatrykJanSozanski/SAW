document.getElementById("registration_form").addEventListener("submit", function(event) {
    const namePattern = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆŠŽ∂ð ,.'-]+$/u;
    const emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    let error = 0;

    // Check the first name
    let errorMessageFname = document.getElementById("fname_error");
    let elementFname = document.getElementById("fname");

    if (!elementFname.value.match(namePattern)) {
        errorMessageFname.innerText = "Incorrect format!";
        error += 1;
    }
    else {
        errorMessageFname.innerText = "";
    }

    // Check the last name
    let errorMessageLname = document.getElementById("lname_error");
    let elementLname = document.getElementById("lname");

    if (!elementLname.value.match(namePattern)) {
        errorMessageLname.innerText = "Incorrect format!";
        error += 1;
    }
    else {
        errorMessageLname.innerText = "";
    }

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

    // Check the confirm
    let errorMessageConfirm = document.getElementById("confirm_error");
    let elementConfirm = document.getElementById("confirm");

    if (elementConfirm.value !== elementPass.value) {
        errorMessageConfirm.innerText = "The password confirmation must match the password!";
        error += 1;
    }
    else {
        errorMessageConfirm.innerText = "";
    }

    // Do not send the form in case of an error
    if (error) {
        elementPass.value = "";
        elementConfirm.value = "";
        event.preventDefault();
    }
});