window.onload = function() {
    console.log("!");
    const widthParameter = 1200;

    let windowWidth = window.innerWidth;
    let sizeMenuOption = 1.3 * 18 * windowWidth / widthParameter;
    let sizeSocialMediaIcon = 90 * windowWidth / widthParameter;
    let sizeFooterFont = 100 * windowWidth / widthParameter;
    let sizeH2 = 40 * windowWidth / widthParameter;
    let sizeP = 16 * windowWidth / widthParameter;

    document.querySelectorAll(".social_media_div a")
        .forEach(item => item.style.width = sizeSocialMediaIcon + "px");

    document.querySelectorAll("nav.menu_bar")
        .forEach(item => item.style.fontSize = sizeMenuOption + "px");

    document.querySelectorAll("footer")
        .forEach(item => item.style.fontSize = sizeFooterFont + "%");

    document.querySelectorAll("#no_match h2")
        .forEach(item => item.style.fontSize = sizeH2 + "px");

    document.querySelectorAll("#no_match p")
        .forEach(item => item.style.fontSize = sizeP + "px");

    window.addEventListener("resize", function() {
        let windowWidth = window.innerWidth;
        let sizeMenuOption = 1.3 * 18 * windowWidth / widthParameter;
        let sizeSocialMediaIcon = 90 * windowWidth / widthParameter;
        let sizeFooterFont = 100 * windowWidth / widthParameter;
        let sizeH2 = 40 * windowWidth / widthParameter;
        let sizeP = 16 * windowWidth / widthParameter;

        document.querySelectorAll(".social_media_div a")
            .forEach(item => item.style.width = sizeSocialMediaIcon + "px");

        document.querySelectorAll("nav.menu_bar")
            .forEach(item => item.style.fontSize = sizeMenuOption + "px");

        document.querySelectorAll("footer")
            .forEach(item => item.style.fontSize = sizeFooterFont + "%");

        document.querySelectorAll("#no_match h2")
            .forEach(item => item.style.fontSize = sizeH2 + "px");

        document.querySelectorAll("#no_match p")
            .forEach(item => item.style.fontSize = sizeP + "px");
    });
};