const searchInput = document.getElementById("search");
const searchButton = document.getElementById("search_button");
const searchResults = [...document.querySelectorAll("#content div h1, #content div h2, #content div p")];

const searchPattern = function() {
    const currentPattern = searchInput.value.toLowerCase();
    let result = searchResults;

    result.forEach(item => item.style.color = "black");

    result = result.filter(searchResults => searchResults.textContent.toLowerCase().includes(currentPattern));

    result.forEach(item => item.style.color = "#f9abab");
}

const searchDefault = e => {
    if (e.target.value === "") {
        searchResults.forEach(item => item.style.color = "");
    }
}

searchButton.addEventListener("click", searchPattern);
searchInput.addEventListener("input", searchDefault);

/*
const searchInput = document.getElementById("search");
const searchButton = document.getElementById("search_button");
const searchResults = [...document.querySelectorAll("#content div")];
const bodyContent = document.getElementById("content");

const searchPattern = function() {
    const currentPattern = searchInput.value.toLowerCase();
    let result = searchResults;
    result = result.filter(searchResults => searchResults.textContent.toLowerCase().includes(currentPattern));

    bodyContent.textContent = "";
    result.forEach(item => bodyContent.appendChild(item));
}

const searchDefault = e => {
    if (e.target.value === "") {
        searchResults.forEach(item => bodyContent.appendChild(item));
    }
}

searchButton.addEventListener("click", searchPattern);
searchInput.addEventListener("input", searchDefault);
 */