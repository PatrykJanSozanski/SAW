function getXMLHttpRequestObject() {
    let ref = null;
    if (window.XMLHttpRequest) {
        ref = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // Older IE.
        ref = new ActiveXObject("MSXML2.XMLHTTP.3.0");
    }
    return ref;
}

function check_email(URL) {
    let xhr = null;
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = function () { // callback
        let el = document.getElementById("email_validation");
        if ((xhr.readyState === 4) && (xhr.status === 200)) {
            el.innerHTML = xhr.responseText;
        }
    }
    let elementEmail = document.getElementById("email").value;
    let querystring = "?typed_email=" + elementEmail;
    let finalURL = encodeURI(URL + querystring);
    xhr.open("GET", finalURL, true);
    xhr.send();
}

document.getElementById("email").addEventListener("change", () => check_email("../registration/check_email.php"));