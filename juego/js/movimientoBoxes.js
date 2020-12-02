var boxes = getArrayBoxes();
var estanterias = getEstantes();
var ingredientes = getArrayIngredientes();

const DISTBORRADO = -110;

var sumTiempo = 10; // 20
var velocidadBoxes = 1; // 2 
var x = 0;
var timeMover;
var incrementarVel;


function startMoving()
{
    incrementarTiempo = setInterval( function()
    {
        // if (velocidadBoxes < 4.5)
        // {
        //     //velocidadBoxes += 0.1;
        // }
        if ( sumTiempo > 0 )
        {
            sumTiempo-= 2;
        } 
        else
        {
            clearInterval(incrementarTiempo);

            var incrementarVelocidad = setInterval( function()
            {
                if ( velocidadBoxes < 3 )
                {
                    velocidadBoxes++;
                }
                else
                {
                    clearInterval(incrementarVelocidad)
                }
                cambiarIntervalo(sumTiempo);
            }, 20000)
        }
        cambiarIntervalo(sumTiempo);

    }, 3000);



    function cambiarIntervalo(milisegundos)
    {
        clearInterval(timeMover);
        timeMover = setInterval( mover, milisegundos );
    }

    timeMover = setInterval( mover, sumTiempo );

    function mover(){

        // BOXES -------------------------------------------------------------------------------------------------------------
        boxes = getArrayBoxes();
        boxes.forEach( function(box) 
        {
        
            if ( parseInt(box.dom.style.left) <= parseInt(box.dom.offsetWidth) ) // anchura de la caja 
            {
                if ( !box.hasGenerated )
                {
                    var boxCreated = generarBox();
                    addIngredient(boxCreated);
                    box.hasGenerated = true;
                }
            }

            if ( parseInt(box.dom.style.left) <= DISTBORRADO )
            {
                box.dom.remove();
            }
        });
        
        boxes = getArrayBoxes();
        boxes.forEach( function(box) 
        {
            x = parseInt(box.dom.style.left);

            x -= velocidadBoxes;
            box.dom.style.left = x + "px";
            box.backgroundImage = "url('../imagenes/mueble_cocina.png')";
        });           

        // -------------------------------------------------------------------------------------------------------------------

        for ( var i = 0; i < estanterias.length; i++ )
        {
            x = parseInt(estanterias.item(i).style.left);

            x -= velocidadBoxes;
            estanterias.item(i).style.left = x + "px";
            estanterias.item(i).backgroundImage = "url(../imagenes/estanteria.png')";

            if ( parseInt(estanterias.item(i).style.left) <= DISTBORRADO )
            {
                estanterias.item(i).remove();
            }
        };

        ingredientes.forEach( function(ingr)
        {
            x = parseInt(ingr.dom.style.left);

            x -= velocidadBoxes;
            ingr.dom.style.left = x + "px";
            ingr.dom.style.backgroundImage = "url(../imagenes/ingredientes/bread.gif')";

            if ( parseInt(ingr.dom.style.left) <= DISTBORRADO )
            {
                ingr.dom.remove();
            }
        });

        // PERSONAJE

        x = parseInt(pg.style.left);
        var chocaBordes = false;
        var choca2 = false;

        if ( parseInt(pg.style.bottom) != SUELO && isCollideBottom )
        {
            chocaBordes = collisionBorder ( pg, bannerI, -velocidadBoxes );
            if ( chocaBordes )
            {
                choca2 = true;
            }

            if ( !choca2 )
            {
                x -= velocidadBoxes;
                pg.style.left = x + "px";
            }
            else
            {
                clearInterval(incrementarTiempo);
                clearInterval(time);
                clearInterval(timeMover);
                
                stopGame();
            }

            choca2 = false;
        }
        else
        {

            chocaBordes = collisionBorder ( pg, bannerI, -velocidadBoxes );
            if ( chocaBordes )
            {
                choca2 = true;
            }

            if ( !choca2 )
            {
                boxes.forEach( function(box)
                {
                    chocaBordes = collision( pg, box , velocidadBoxes, 0 );
                    if ( chocaBordes )
                    {
                        choca2 = true;
                    }
                });             

                if (choca2)
                {
                    x -= velocidadBoxes;
                    pg.style.left = x + "px";
                }
            }
            else
            {
                clearInterval(incrementarTiempo);
                clearInterval(time);
                clearInterval(timeMover);
                
                stopGame();
            }

            choca2 = false;
        }
    }
}

function stopGame()
{
    
    startGame = false;
    died = true;
    desenfocar();
    final();
    // crearStartEndScreen( "gameover" );
}