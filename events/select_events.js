const searchInput = document.getElementById("search");
const searchButton = document.getElementById("search_button");

function getXMLHttpRequestObject() {
    let ref = null;
    if (window.XMLHttpRequest) {
        ref = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // Older IE.
        ref = new ActiveXObject("MSXML2.XMLHTTP.3.0");
    }
    return ref;
}

function select_events(URL) {
    let xhr = null;
    xhr = getXMLHttpRequestObject();
    xhr.onreadystatechange = function () { // callback
        let el = document.getElementById("content");
        if ((xhr.readyState === 4) && (xhr.status === 200)) {
            let data = xhr.responseText;
            data = JSON.parse(data);

            el.innerHTML = "";

            if (data.data.length === 0) {

                let header = document.querySelectorAll("#no_match h2");
                header.forEach(item => item.innerText = "No matching records found!");

                let paragraph = document.querySelectorAll("#no_match p");
                paragraph.forEach(item => item.innerText = "Change search criteria and try again.");

                let poster = document.getElementById("poster");
                poster.src = "../img/logo/bolt-white-bg.png";
                poster.alt = "Red bolt.";
            }
            else {
                let header = document.querySelectorAll("#no_match h2");
                header.forEach(item => item.innerText = "");

                let paragraph = document.querySelectorAll("#no_match p");
                paragraph.forEach(item => item.innerText = "");

                let poster = document.getElementById("poster");
                poster.src = "";
                poster.alt = "";
            }

            data.data.forEach(item => {

                let newDiv = document.createElement("div");

                let dateAndTime = document.createElement("h5");
                dateAndTime.innerText = item[2] + ", " + item[3];

                let cityAndLocation = document.createElement("h3");
                cityAndLocation.innerText = item[0] + ", " + item[1];

                let title = document.createElement("h1");
                title.innerText = item[4];

                let description =  document.createElement("p");
                description.innerText = item[5];

                newDiv.appendChild(dateAndTime);
                newDiv.appendChild(cityAndLocation);
                newDiv.appendChild(title);
                newDiv.appendChild(description);

                el.appendChild(newDiv);
            });
        }
    }
    let like = searchInput.value;
    like = "%" + like + "%"
    let querystring = "?like=" + like;
    let finalURL = encodeURI(URL + querystring);
    xhr.open("GET", finalURL, true);
    xhr.send();
}

function select_events_default(e) {
    if (e.target.value === "") {
        select_events("../events/select_events.php");
    }
}


searchButton.addEventListener("click", () => select_events("../events/select_events.php"));
searchInput.addEventListener("input", select_events_default);
window.addEventListener("load", () => select_events("../events/select_events.php"));
