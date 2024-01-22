// Indica si la web se esta ejecutando en un dispositivo movil o no.
// Mobil -> false | Escritorio -> true
function CheckPlatform() {
    return !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

var isDesktop = CheckPlatform();
console.log("Desktop: " + isDesktop);

var images = [
    "img/backgrounds/fondo-maquetizacion-hd.png",
    "img/backgrounds/fondo-diseno-hd.png",
    "img/backgrounds/fondo-hobby.jpg",
    "img/backgrounds/fondo-proyectos.png",
    "img/backgrounds/fondo-visual.png",
    "img/backgrounds/fondo-experiencia.png",
    "img/backgrounds/fondo-game.png"
]

if (!isDesktop)
{
    // Hide all from Mi Juego
    images.pop();
    document.getElementById("d-6").remove();
    document.getElementsByClassName("game-box")[0].remove();

    // Show all content from Maquetacion
    document.getElementById("d-0").classList.remove("hide-elem");
    document.getElementById("d-0").classList.add("show-elem");

    document.getElementById("0").classList.add("off-blackandwhite");
    
}

var main = document.getElementById("main");
if (main != null)
{
    if (isDesktop)
    { 
        main.style.backgroundImage =  "url('" + images[images.length - 1] + "')";
    }
    else 
    {
        main.style.backgroundImage = "url('" + images[0] + "')";
    }
}

var i = 0;
if (!isDesktop) i++;

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

        var text = document.getElementsByClassName("show-elem");
        text[0].classList.add("hide-elem");
        text[0].classList.remove("show-elem");

        document.getElementById("d-" + i).classList.remove("hide-elem");
        document.getElementById("d-" + i).classList.add("show-elem");
    }
    
    if (main != null)
    {
        main.style.backgroundImage = 'url(' + images[i] + ')';
    }
    // main.style.transform = "scale(1)";
    i++;
}

function startAnimation()
{
    interval = setInterval(doAnimation, 6000);
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

            var text = document.getElementsByClassName("show-elem");
            text[0].classList.add("hide-elem");
            text[0].classList.remove("show-elem");

            document.getElementById("d-" + i).classList.remove("hide-elem");
            document.getElementById("d-" + i).classList.add("show-elem");
        }
    }
}

function startProgressBar() {
    var progressBar = document.querySelector('.progress-bar');
    
    if (progressBar != null)
    {
        progressBar.innerHTML = '';
        var progressBarBefore = document.createElement('div');
        progressBarBefore.classList.add('progress-bar-before');
        progressBar.appendChild(progressBarBefore);
    }
}
  
document.addEventListener('DOMContentLoaded', function() {
    startAnimation();
    startProgressBar();
    //setInterval(startProgressBar, 6000);
});

// function selectLI( value )
// {
//     var list = document.getElementsByClassName("navbar-custom-items-active");
//     list[0].classList.remove("navbar-custom-items-active");

//     main.style.backgroundImage = "url('" + images[value] + "')";
//     clearInterval(interval);

//     document.getElementById("li-" + value).classList.add("navbar-custom-items-active");

//     switch(value)
//     {
//         case "0":
//             document.getElementById("documentacion-content").style.display = "none";
//             document.getElementById("contacto-content").style.display = "none";
//             document.getElementById("perfil-content").style.display = "none";
//             document.getElementById("home-content").style.display = "block";
//             main.style.backgroundImage = "url('" + images[6] + "')";
//             interval = setInterval(doAnimation, 7000);
//             break;

//         case "2":
//             document.getElementById("documentacion-content").style.display = "block";
//             document.getElementById("perfil-content").style.display = "none";
//             document.getElementById("contacto-content").style.display = "none";
//             document.getElementById("home-content").style.display = "none";
//             break;

//         case "3":
//             document.getElementById("documentacion-content").style.display = "none";
//             document.getElementById("contacto-content").style.display = "none";
//             document.getElementById("home-content").style.display = "none";
//             document.getElementById("perfil-content").style.display = "block";
//             break;

//         case "4":
//             document.getElementById("documentacion-content").style.display = "none";
//             document.getElementById("perfil-content").style.display = "none";
//             document.getElementById("home-content").style.display = "none";
//             document.getElementById("contacto-content").style.display = "block";
//             break;

//     }
// }

// function getInput()
// {
//     var variable = window.location.search.substr(1);

//     if ( variable != null && variable != "" )
//     {
//         var variables = variable.split("=");

//         selectLI(variables[1]);
//     }

// }
