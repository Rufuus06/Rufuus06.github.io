var menuSlide = document.querySelector("#menu-slide");
var topMenu = document.querySelector("#top-menu");
var footerElem = document.querySelector("#footer-elem");

if (menuSlide != null) {
    fetch("../../partials/lateral-menu.html")
        .then(response => response.text())
        .then(data => {
        menuSlide.innerHTML = data;
    }); 
}

if (topMenu != null) {
    fetch("../../partials/top-menu.html")
        .then(response => response.text())
        .then(data => {
        topMenu.innerHTML = data;
    }); 
}

if (footerElem != null) {
    fetch("../../partials/footer.html")
        .then(response => response.text())
        .then(data => {
        footerElem.innerHTML = data;
    }); 
}