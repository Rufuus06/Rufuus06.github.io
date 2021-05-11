const images = [
    "img/fondo3.jpg",
    "img/design.png",
    "img/fondo5.jpg",
    "img/fondo-test.jpg",
    "img/fondo7.jpg",
    "img/fondo8.jpg",
    "img/fondo2.jpg"
]

var main = document.getElementById("main");
if (main != null)
{
    main.style.backgroundImage =  "url('" + images[6] + "')";
}


var i = 0;
var value_aux = -1;

var interval = null;

function doAnimation()
{
    if (main != null)
    {
        if(i >= images.length){
            i = 0;
        }

        var box = document.getElementsByClassName("off-blackandwhite");
        box[0].classList.add("set-blackandwhite");
        box[0].classList.remove("off-blackandwhite");
        
        document.getElementById(i).classList.add("off-blackandwhite");

        var text = document.getElementsByClassName("show");
        text[0].classList.add("hide");
        text[0].classList.remove("show");

        document.getElementById("d-" + i).classList.remove("hide");
        document.getElementById("d-" + i).classList.add("show");
    }
    
    if (main != null)
    {
        main.style.backgroundImage = 'url(' + images[i++] + ')';
    }
    // main.style.transform = "scale(1)";
    
}

function startAnimation()
{
    interval = setInterval(doAnimation, 7000);
}

function changeImage(value)
{   
    if (value != null)
    {   
        if (main != null)
        {
            main.style.backgroundImage = "url('" + images[value] + "')";

            i = value;

            var box = document.getElementsByClassName("off-blackandwhite");
            box[0].classList.add("set-blackandwhite");
            box[0].classList.remove("off-blackandwhite");
            
            document.getElementById(value).classList.add("off-blackandwhite");

            var text = document.getElementsByClassName("show");
            text[0].classList.add("hide");
            text[0].classList.remove("show");

            document.getElementById("d-" + i).classList.remove("hide");
            document.getElementById("d-" + i).classList.add("show");
        }
    }
}

function selectLI( value )
{
    var list = document.getElementsByClassName("navbar-custom-items-active");
    list[0].classList.remove("navbar-custom-items-active");

    main.style.backgroundImage = "url('" + images[value] + "')";
    clearInterval(interval);

    document.getElementById("li-" + value).classList.add("navbar-custom-items-active");

    switch(value)
    {
        case "0":
            document.getElementById("documentacion-content").style.display = "none";
            document.getElementById("contacto-content").style.display = "none";
            document.getElementById("perfil-content").style.display = "none";
            document.getElementById("home-content").style.display = "block";
            break;

        case "2":
            document.getElementById("documentacion-content").style.display = "block";
            document.getElementById("perfil-content").style.display = "none";
            document.getElementById("contacto-content").style.display = "none";
            document.getElementById("home-content").style.display = "none";
            break;

        case "3":
            document.getElementById("documentacion-content").style.display = "none";
            document.getElementById("contacto-content").style.display = "none";
            document.getElementById("home-content").style.display = "none";
            document.getElementById("perfil-content").style.display = "block";
            break;

        case "4":
            document.getElementById("documentacion-content").style.display = "none";
            document.getElementById("perfil-content").style.display = "none";
            document.getElementById("home-content").style.display = "none";
            document.getElementById("contacto-content").style.display = "block";
            break;

    }
}

function getInput()
{
    var variable = window.location.search.substr(1);

    if ( variable != null && variable != "" )
    {
        var variables = variable.split("=");

        selectLI(variables[1]);
    }

}
