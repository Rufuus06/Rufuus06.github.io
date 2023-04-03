var sidebar = document.getElementById("menu-slide");
var menuicon = document.getElementById("menu-icon");

document.addEventListener("mousemove", function(event) {

    if (event.clientX < 200)
    { 
        sidebar.style.left = "0";
        menuicon.style.left = "-200px";
    } else 
    {
        sidebar.style.left = "-200px";
        menuicon.style.left = "0";
    }
});