// BANNERS LATERALES

var bannerI = document.createElement('div');
bannerI.style.position = "absolute";
bannerI.style.height = "650px";
bannerI.style.width = "300px";
bannerI.style.left = "-300px";
bannerI.style.bottom = "0px";
bannerI.style.backgroundColor = "#2d2d30";
document.getElementById("game").appendChild(bannerI);

var bannerD = document.createElement('div');
bannerD.style.position = "absolute";
bannerD.style.height = "650px";
bannerD.style.width = "250px";
bannerD.style.left = "1110px";
bannerD.style.bottom = "0px";
bannerD.style.backgroundColor = "#2d2d30";
document.getElementById("game").appendChild(bannerD);

var fire = document.createElement('div');
fire.className = "fire";
document.getElementById("map").appendChild(fire);

// SCOREBOARD ---------------------------------------------------------------------------------------------------------

var scoreboard = document.createElement('div');
scoreboard.className = "scoreboard";
scoreboard.style.left = 20 + 'px';
scoreboard.style.top = 10 + 'px';
document.getElementById("map").appendChild(scoreboard); 

var puntuacion = document.createElement('div');
puntuacion.className = "puntuacion";
puntuacion.id = "puntuacion";
puntuacion.style.left = 20 + 'px';
puntuacion.style.top = 50 + 'px';
document.getElementById('map').appendChild(puntuacion);

var mil = document.createElement('div');
mil.className = "numeros";
mil.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("puntuacion").appendChild(mil);

var cien = document.createElement('div');
cien.className = "numeros";
cien.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("puntuacion").appendChild(cien);

var diez = document.createElement('div');
diez.className = "numeros";
diez.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("puntuacion").appendChild(diez);

var uno = document.createElement('div');
uno.className = "numeros";
uno.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("puntuacion").appendChild(uno);



// TIMER ---------------------------------------------------------------------------------------------------------

var timer = document.createElement('div');
timer.className = "timer";
timer.style.right = 20 + 'px';
timer.style.top = 10 + 'px';
document.getElementById("map").appendChild(timer); 


var contador = document.createElement('div');
contador.className = "contador";
contador.id = "contador";
contador.style.right = 20 + 'px';
contador.style.top = 50 + 'px';
document.getElementById('map').appendChild(contador);

var decminuto = document.createElement('div');
decminuto.className = "numeros";
decminuto.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("contador").appendChild(decminuto);

var minuto = document.createElement('div');
minuto.className = "numeros";
minuto.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("contador").appendChild(minuto);

var dospuntos = document.createElement('div');
dospuntos.className = "dospuntos";
document.getElementById("contador").appendChild(dospuntos);

var decimal = document.createElement('div');
decimal.className = "numeros";
decimal.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("contador").appendChild(decimal);

var segundo = document.createElement('div');
segundo.className = "numeros";
segundo.style.backgroundImage = "url('imagenes/time/numeros/0.png')";
document.getElementById("contador").appendChild(segundo);

// --------------------------------------------------------------------------------------------------------------------
// CRONOMETRO

var numeros = 
[
    "imagenes/time/numeros/0.png",
    "imagenes/time/numeros/1.png",
    "imagenes/time/numeros/2.png",
    "imagenes/time/numeros/3.png",
    "imagenes/time/numeros/4.png",
    "imagenes/time/numeros/5.png",
    "imagenes/time/numeros/6.png",
    "imagenes/time/numeros/7.png",
    "imagenes/time/numeros/8.png",
    "imagenes/time/numeros/9.png",
]

var seg = 0, min = 0, dec = 0, decmin = 0;
var time;

function init()
{
    time = setInterval( function()
    {
        seg++;

        for ( var i = 0; i < 10; i++ )
        {
            if ( seg == i )
            {
                segundo.style.backgroundImage = "url(" + numeros[i] + ")";
            }
        }

        if ( seg == 10 )
        {
            seg = 0;
            segundo.style.backgroundImage = "url(" + numeros[0] + ")";
            dec++;

            for ( var i = 0; i < 6; i++ )
            {
                if ( dec == i )
                {
                    decimal.style.backgroundImage = "url(" + numeros[i] + ")";
                }
            }

            if ( dec == 6 )
            {
                dec = 0;
                decimal.style.backgroundImage = "url(" + numeros[0] + ")";

                min++;

                for ( var i = 0; i < 10; i++ )
                {
                    if ( min == i )
                    {
                        minuto.style.backgroundImage = "url(" + numeros[i] + ")";
                    }
                }

                if ( min == 10 )
                {
                    min = 0;
                    minuto.style.backgroundImage = "url(" + numeros[0] + ")";
                    decmin++;

                    for ( var i = 0; i < 6; i++ )
                    {
                        if ( decmin == i )
                        {
                            decminuto.style.backgroundImage = "url(" + numeros[i] + ")";
                        }
                    }

                    if ( decmin == 6 )
                    {
                        decmin = 0;
                        decminuto.style.backgroundImage = "url(" + numeros[0] + ")";
                    }
                }
            }
        }

    }, 1000 );
}

function getTime()
{
    var numerosIMG = 
    [
        decminuto.style.backgroundImage,
        minuto.style.backgroundImage,
        decimal.style.backgroundImage,
        segundo.style.backgroundImage
    ];

    return numerosIMG;
}

// ----------------------------------------------------------------------------------------------------------
// PUNTUACION

var puntos = 0;

function sumarPuntos( id_ingrediente )
{
    suma = id_ingrediente;

    puntos += suma;
    
    if ( puntos < 0 )
    {
        puntos = 0;
    }

    var strPuntos = puntos.toString().split("", 4);

    if ( puntos < 10 )
    {
        strPuntos.unshift("0", "0", "0");
    }
    else if (puntos < 100)
    {
        strPuntos.unshift("0", "0");
    }
    else if ( puntos < 1000 )
    {
        strPuntos.unshift("0");
    }

    uno.style.backgroundImage = "url(" + numeros[strPuntos[3]] + ")";
    diez.style.backgroundImage = "url(" + numeros[strPuntos[2]] + ")";
    cien.style.backgroundImage = "url(" + numeros[strPuntos[1]] + ")";
    mil.style.backgroundImage = "url(" + numeros[strPuntos[0]] + ")";
}

function getPuntuacion()
{
    var listaNumeros = 
    [
        mil.style.backgroundImage,
        cien.style.backgroundImage,
        diez.style.backgroundImage,
        uno.style.backgroundImage
    ];

    return listaNumeros;
}

var y = 0, yinicial = 0;
var velocidadY = 1;
var showScoreAnimation;

function showScore( ingr ) // SE BUGEA CUANDO HAY MAS DE DOS INGR A LA VEZ
{
    var contenedor = document.createElement('div');
    contenedor.className = "contenedor";
    contenedor.id = "contenedor";
    contenedor.style.top = "60px";
    document.getElementById("map").appendChild(contenedor);

    var sumador = document.createElement('div');
    sumador.className = "sumador";
    document.getElementById("contenedor").appendChild(sumador);

    yinicial = parseInt(contenedor.style.top);
    y = parseInt(contenedor.style.top);

    showScoreAnimation = setInterval(function()
    {
        if ( ingr.puntosI > 0 )
        {
            sumador.style.backgroundImage = "url(imagenes/time/numeros/+" + ingr.puntosI + ".png)";
        }
        else
        {
            sumador.style.backgroundImage = "url(imagenes/time/numeros/" + ingr.puntosI + ".png)";
        }

        y -= velocidadY;
        contenedor.style.top = y + "px";

        if ( y == (yinicial - 10) )
        {            
            contenedor.remove();
            sumador.remove();
            clearInterval(showScoreAnimation);       
        }

    }, 20);
    
}