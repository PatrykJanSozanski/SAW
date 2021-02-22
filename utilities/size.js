window.onload = function() {
    const widthParameter = 1200;

    let windowWidth = window.innerWidth;
    let sizeMenuOption = 1.3 * 18 * windowWidth / widthParameter;
    let sizeSocialMediaIcon = 90 * windowWidth / widthParameter;
    let sizeFooterFont = 100 * windowWidth / widthParameter;
    let sizeLabel = 1.2 * 16 * windowWidth / widthParameter;
    let sizeH1 = 80 * windowWidth / widthParameter;
    let sizeH2 = 40 * windowWidth / widthParameter;
    let sizeH3 = 20 * windowWidth / widthParameter;
    let sizeP = 16 * windowWidth / widthParameter;

    document.querySelectorAll(".content h1")
        .forEach(item => item.style.fontSize = sizeH1 + "px");

    document.querySelectorAll(".content h2")
        .forEach(item => item.style.fontSize = sizeH2 + "px");

    document.querySelectorAll(".content h3")
        .forEach(item => item.style.fontSize = sizeH3 + "px");

    document.querySelectorAll(".social_media_div a")
        .forEach(item => item.style.width = sizeSocialMediaIcon + "px");

    document.querySelectorAll("nav.menu_bar")
        .forEach(item => item.style.fontSize = sizeMenuOption + "px");

    document.querySelectorAll("footer")
        .forEach(item => item.style.fontSize = sizeFooterFont + "%");

    document.querySelectorAll("form label")
        .forEach(item => item.style.fontSize = sizeLabel + "px");

    document.querySelectorAll(".error")
        .forEach(item => item.style.fontSize = 0.9 * sizeLabel + "px");

    document.querySelectorAll(".submit_button")
        .forEach(item => item.style.fontSize = sizeLabel + "px");

    document.querySelectorAll(".content p")
        .forEach(item => item.style.fontSize = sizeP + "px");

    window.addEventListener("resize", function() {
        let windowWidth = window.innerWidth;
        let sizeMenuOption = 1.3 * 18 * windowWidth / widthParameter;
        let sizeSocialMediaIcon = 90 * windowWidth / widthParameter;
        let sizeFooterFont = 100 * windowWidth / widthParameter;
        let sizeLabel = 1.2 * 16 * windowWidth / widthParameter;
        let sizeH1 = 80 * windowWidth / widthParameter;
        let sizeH2 = 40 * windowWidth / widthParameter;
        let sizeH3 = 20 * windowWidth / widthParameter;
        let sizeP = 16 * windowWidth / widthParameter;

        document.querySelectorAll(".content h1")
            .forEach(item => item.style.fontSize= sizeH1 + "px");

        document.querySelectorAll(".content h2")
            .forEach(item => item.style.fontSize= sizeH2 + "px");

        document.querySelectorAll(".content h3")
            .forEach(item => item.style.fontSize= sizeH3 + "px");

        document.querySelectorAll(".social_media_div a")
            .forEach(item => item.style.width = sizeSocialMediaIcon + "px");

        document.querySelectorAll("nav.menu_bar")
            .forEach(item => item.style.fontSize = sizeMenuOption + "px");

        document.querySelectorAll("footer")
            .forEach(item => item.style.fontSize = sizeFooterFont + "%");

        document.querySelectorAll("form label")
            .forEach(item => item.style.fontSize = sizeLabel + "px");

        document.querySelectorAll(".error")
            .forEach(item => item.style.fontSize = 0.9 * sizeLabel + "px");

        document.querySelectorAll(".submit_button")
            .forEach(item => item.style.fontSize = sizeLabel + "px");

        document.querySelectorAll(".content p")
            .forEach(item => item.style.fontSize = sizeP + "px");
    });
};