// PRESS TO START ----------------------------------------------------------------------------------------------

function desenfocar()
{
    boxes.forEach ( function(box)
    {
        box.dom.classList.add("blur");
    });

    pg.classList.add('blur');
    scoreboard.classList.add('blur');
    puntuacion.classList.add('blur');
    timer.classList.add('blur');
    contador.classList.add('blur');
    fire.classList.add('blur');

    var estantes = document.getElementsByClassName('estante');
    for (var i = 0; i < estantes.length; i++)
    {
        estantes.item(i).className += " blur";
    }

    var ingrendientes = document.getElementsByClassName('ingredients');
    for (var i = 0; i < ingrendientes.length; i++)
    {
        ingrendientes.item(i).className += " blur";
    }

    // document.getElementById("volumen").addEventListener("click", function()
    // {
    //     alert("ola");
    //     volumen.style.backgroundImage = "url(imagenes/time/volumeoff.png)";
    // }, false);
}

function enfocar()
{
    boxes.forEach ( function(box)
    {
        box.dom.classList.remove("blur");
    });
    
    pg.classList.remove('blur');
    scoreboard.classList.remove('blur');
    puntuacion.classList.remove('blur');
    timer.classList.remove('blur');
    contador.classList.remove('blur');
    fire.classList.remove('blur');

    var estantes = document.getElementsByClassName('estante');
    for (var i = 0; i < estantes.length; i++)
    {
        estantes.item(i).classList.remove("blur");
    }

    var ingrendientes = document.getElementsByClassName('ingredients');
    for (var i = 0; i < ingrendientes.length; i++)
    {
        ingrendientes.item(i).classList.remove("blur");
    }
}


desenfocar();
// crearStartEndScreen( "press" );
// var press

// function crearStartEndScreen( className )
// {
//     press = document.createElement('div');
//     press.className = className;
//     document.getElementById("map").appendChild(press);
// }



// -------------------------------------------------------------------------------------------------------------

var ingredientes = getArrayIngredientes();
var itemSound;

function getIngr( ingrediente )
{
    var yinicial = parseInt(ingrediente.dom.style.bottom);
    var y = parseInt(ingrediente.dom.style.bottom);
    
    var velEfecto = 1;
    ingrediente.isHit = true;

    var src;

    if ( ingrediente.puntosI != -20 )
    {
        src = "sonidos/itemPickUp.mp3";
    }
    else
    {
        src = "sonidos/hit.mp3"
    }

    itemSound = new sound( src );
    itemSound.volume = 0.05;
    itemSound.play();

    showScore( ingrediente );
    sumarPuntos(ingrediente.puntosI);
    
    let getAnimation = setInterval (function()
    {
        y += velEfecto;
        ingrediente.dom.style.bottom = y + "px";

        if ( y == (yinicial + 80) )
        {            
            clearInterval(getAnimation);
            ingrediente.dom.remove();
               
            var itemSound2 = document.getElementById(src);
            itemSound2.parentNode.removeChild(itemSound2);
        }

    }, 6);
}

// -------------------------------------------------------------------------------------------------------------

function collision ( pg, box, lat, pos )
{
    var collide = false;

    var disB = parseInt(pg.style.left) + lat;
    var altB = parseInt(pg.style.bottom) + pos;

    if (disB < parseInt(box.dom.style.left) + box.dom.offsetWidth &&
        disB + pg.offsetWidth > parseInt(box.dom.style.left) &&
        altB < parseInt(box.dom.style.bottom) + box.dom.offsetHeight &&
        altB + pg.offsetHeight > parseInt(box.dom.style.bottom)  )
        {
            collide = true;        
        }

    return collide;
}

function collisionBorder ( pg, border, lat )
{
    var collide = false;

    var disB = parseInt(pg.style.left) + lat;

    if (disB < parseInt(border.style.left) + border.offsetWidth &&
        disB + pg.offsetWidth > parseInt(border.style.left)  )
        {
            collide = true;        
        }

    return collide;
}

function sumarX ( x, box )
{
    x += VELOCIDAD;
    box.style.left = x + "px";
}

function restarX ( x, box )
{
    x -= VELOCIDAD;
    box.style.left = x + "px";
}

function sumarY ( y, box, vel )
{
    y += vel;
    y *= gravity;
    box.style.bottom = y + "px";
}

function restarY ( y, box )
{
    y -= VELOCIDAD;
    y *= gravity;
    box.style.bottom = y + "px";
}

var isCollade = false;
var isGoingRight = false;
var isGoingLeft = false;
var isCollideBottom = false;
var lookingRight = true;
var choca = false;
var startGame = false;
var died = false;
    




function startPlaying()
{
    startGame = true;
    init();
    enfocar();
    startMoving();

}

function movimiento(event){

    if( ( event.keyCode == '39' || event.keyCode == '68' || event.keyCode == '37' || event.keyCode == '65' || event.keyCode == '38' || event.keyCode == '87' || event.keyCode == '32' ) && startGame == false )
    {
        if ( !died )
        {
            contraer();   

            
            startPlaying();
        }
    }
}

function goRight()
{
    if (startGame)
    {
        var x = parseInt(pg.style.left);

        isGoingRight = true;
        
        if (!isJumping)
        { 
            pg.style.backgroundImage = "url('imagenes/pg/pg_walking_r.gif')";

            if (isCollideBottom)
            { 
                boxes.forEach( function(box)
                {
                    isCollade = collision( pg, box , VELOCIDAD, 0 );
                    if ( isCollade  )
                    {
                        choca = true;
                    }
                });             

                if (!choca)
                {
                    isCollade = collisionBorder ( pg, bannerD, VELOCIDAD );
                    if ( isCollade )
                    {
                        choca = true;
                    }

                    if ( !choca )
                    {
                        sumarX ( x, pg );
                    }

                    choca = false;

                    
                    bottomDetection( pg, boxes, -VELOCIDAD );
                }

                choca = false;
            
                var ingrediente;

                ingredientes.forEach( function(ingr)
                {
                    
                    isCollade = collision( pg, ingr, VELOCIDAD, 0 );
                    if ( isCollade )
                    {
                        if (!ingr.isHit)
                        {
                            ingrediente = ingr;
                            choca = true;
                        }
                    }
                });

                if (choca)
                {
                    getIngr(ingrediente);
                }

                choca = false;
            }
            else
            {
                boxes.forEach( function(box)
                {
                    isCollade = collision( pg, box , VELOCIDAD, 0 );
                    if ( isCollade  )
                    {
                        choca = true;
                    }
                });             

                if (!choca)
                {
                    isCollade = collisionBorder ( pg, bannerD, VELOCIDAD );
                    if ( isCollade )
                    {
                        choca = true;
                    }

                    if ( !choca )
                    {
                        sumarX ( x, pg );
                    }

                    choca = false;
                }

                choca = false;
            }
        }
    

        if (isGoingRight)
        {
            lookingRight = true;
            isGoingLeft = false;
        }
    }
}	


function goLeft()
{  
    if (startGame)
    {         
        var x = parseInt(pg.style.left);

        isGoingLeft = true;

        if (!isJumping)
        {        
            pg.style.backgroundImage = "url('imagenes/pg/pg_walking_l.gif')";

            if (isCollideBottom)
            {
                boxes.forEach( function(box)
                {
                    isCollade = collision( pg, box , -VELOCIDAD, 0 );
                    if ( isCollade  )
                    {
                        choca = true;
                    }
                });             

                if (!choca)
                {
                    isCollade = collisionBorder ( pg, bannerI, -VELOCIDAD );
                    if ( isCollade )
                    {
                        choca = true;
                    }

                    if ( !choca )
                    {
                        restarX ( x, pg );
                    }

                    choca = false;

                    bottomDetection( pg, boxes, -VELOCIDAD );
                }

                choca = false;

                var ingrediente;

                ingredientes.forEach( function(ingr)
                {
                    
                    isCollade = collision( pg, ingr, -VELOCIDAD, 0 );
                    if ( isCollade )
                    {
                        if (!ingr.isHit)
                        {
                            if (!ingr.isHit)
                            {
                                ingrediente = ingr;
                                choca = true;
                            }
                        }
                    }
                });

                if (choca)
                {
                    getIngr(ingrediente);
                }

                choca = false;
            }
            else
            {
                boxes.forEach( function(box)
                {
                    isCollade = collision( pg, box , -VELOCIDAD, 0 );
                    if ( isCollade  )
                    {
                        choca = true;
                    }
                });             

                if (!choca)
                {
                    isCollade = collisionBorder ( pg, bannerI, -VELOCIDAD );
                    if ( isCollade )
                    {
                        choca = true;
                    }

                    if ( !choca )
                    {
                        restarX ( x, pg );
                    }

                    choca = false;
                }

                choca = false;
            } 
        }   
        
        if (isGoingLeft)
        {
            lookingRight = false;
            isGoingRight = false;
        }
    }
}

    
function goUp()
{
    if (startGame)
    {
        jump( pg );
    }
}


var bottom =  parseInt( pg.style.bottom );
var gravity = 1;
var isJumping = false;
var posSalto = 0;
var alturaBox = pg.offsetHeight;

function jump( pg )
{
    choca = false;
    
    if (!isJumping)
    {
        posSalto = parseInt(pg.style.bottom);

        let upTimeID = setInterval( function ()
        {
            if ( parseInt( pg.style.bottom ) >= ( posSalto + ( alturaBox + ( alturaBox/4 ) ) ) || choca )
            {
                clearInterval(upTimeID);
                choca = false;

                let downTimerID = setInterval( function()
                {
                    if ( parseInt( pg.style.bottom ) <= SUELO )
                    {                        
                        if (lookingRight == true) {	pg.style.backgroundImage = "url('imagenes/pg/pg_stand_r.gif')"; }
						else { pg.style.backgroundImage = "url('imagenes/pg/pg_stand_l.gif')"; }
                        isJumping = false;
                        clearInterval(downTimerID);
                    }
                    else
                    {
                        if ( isGoingRight )
					    {
                            
                            boxes.forEach( function(box)
                            {
                                isCollade = collision( pg, box , VELOCIDAD, 0 );
                                if ( isCollade  )
                                {
                                   choca = true;
                                }
                            });             
        
                            if (!choca)
                            {
                                isCollade = collisionBorder ( pg, bannerD, VELOCIDAD );
                                if ( isCollade )
                                {
                                    choca = true;
                                }

                                if ( !choca )
                                {
                                    sumarX ( parseInt(pg.style.left), pg );
                                }

                                choca = false;
                            }      
                            
                            choca = false;
                        }

                        else if (isGoingLeft)
                        {
                            boxes.forEach( function(box)
                            {
                                isCollade = collision( pg, box , -VELOCIDAD, 0 );
                                if ( isCollade  )
                                {
                                    choca = true;
                                }
                            });             

                            if (!choca)
                            {
                                isCollade = collisionBorder ( pg, bannerI, -VELOCIDAD );
                                if ( isCollade )
                                {
                                    choca = true;
                                }
            
                                if ( !choca )
                                {
                                    restarX ( parseInt(pg.style.left), pg );
                                }
            
                                choca = false;                               
                            }   

                            choca = false;
                        }	

                        choca = false;
                        
                        boxes.forEach( function(box)
                        {
                            isCollade = collision(pg, box, 0, -VELOCIDAD)
                            if ( isCollade  )
                            {
                                choca = true;
                            }
                        });             

                        if (!choca)
                        {
                            if (lookingRight == true) {	pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_r.png')"; }
						    else { pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_l.png')"; }

                            restarY (parseInt(pg.style.bottom), pg);
                            isCollideBottom = false;
                        }
                        else
                        {
                            var ingrediente;
                            choca = false;

                            ingredientes.forEach( function(ingr)
                            {
                                
                                isCollade = collision( pg, ingr, 0,  -VELOCIDAD );
                                if ( isCollade )
                                {
                                    if (!ingr.isHit)
                                    {
                                        ingrediente = ingr;
                                        choca = true;
                                    }
                                }
                            });

                            if (choca)
                            {
                                getIngr(ingrediente);
                            }

                            choca = false;

                            isCollideBottom = true;
                            if (lookingRight == true) {	pg.style.backgroundImage = "url('imagenes/pg/pg_stand_r.gif')"; }
                            else { pg.style.backgroundImage = "url('imagenes/pg/pg_stand_l.gif')"; }
                            isJumping = false;
                            clearInterval(downTimerID);
                        }
                        
                    }

                    choca = false;

                }, 20);
            }

            if ( isGoingRight )
            {
                boxes.forEach( function(box)
                {
                    isCollade = collision( pg, box , VELOCIDAD, 0 );
                    if ( isCollade  )
                    {
                        choca = true;
                    }
                });             

                if (!choca)
                {
                    isCollade = collisionBorder ( pg, bannerD, VELOCIDAD );
                    if ( isCollade )
                    {
                        choca = true;
                    }

                    if ( !choca )
                    {
                        sumarX ( parseInt(pg.style.left), pg );
                    }

                    choca = false;
                }      
                
                choca = false;
            }
            else if (isGoingLeft)
            {
                boxes.forEach( function(box)
                {
                    isCollade = collision( pg, box , -VELOCIDAD, 0 );
                    if ( isCollade  )
                    {
                        choca = true;
                    }
                });             

                if (!choca)
                {
                    isCollade = collisionBorder ( pg, bannerI, -VELOCIDAD );
                    if ( isCollade )
                    {
                        choca = true;
                    }

                    if ( !choca )
                    {
                        restarX ( parseInt(pg.style.left), pg );
                    }

                    choca = false; 
                }   

                choca = false;             
            }	
           
            if (lookingRight == true) {	pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_r.png')"; }
			else { pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_l.png')"; }


            boxes.forEach( function(box)
                {
                    isCollade = collision(pg, box, 0, VELOCIDAD)
                    if ( isCollade  )
                    {
                        choca = true;
                    }
                });             

            if (!choca)
            {
                sumarY ( parseInt(pg.style.bottom), pg, 20 );

                var ingrediente;

                ingredientes.forEach( function(ingr)
                {
                    
                    isCollade = collision( pg, ingr, 0,  VELOCIDAD );
                    if ( isCollade )
                    {
                        if (!ingr.isHit)
                        {
                            ingrediente = ingr;
                            choca = true;
                        }
                    }
                });

                if (choca)
                {
                    getIngr(ingrediente);
                    choca = false;
                }
            }       

            isJumping = true;            

        }, 20);
    }
}

function bottomDetection( pg, boxes, pos )
{
    choca = false;

    boxes.forEach( function (box)
    {
        isBottom = collision(pg, box, 0, pos);

        if ( isBottom )
        {
            choca = true;
        }
    });

    if ( !choca )
    {
        choca = false;
        isJumping = true;

        let downTimerID2 = setInterval( function() {
        
            if ( isGoingRight )
            {
                boxes.forEach( function(box)
                    {
                        isCollade = collision( pg, box, VELOCIDAD, 0 );
                        if ( isCollade  )
                        {
                            choca = true;
                        }
                    });    
                    
                pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_r.png')";

                if (!choca)
                {
                    sumarX ( parseInt(pg.style.left), pg );
                }   

                choca = false;

            }
            else if (isGoingLeft)
            {
                boxes.forEach( function(box)
                    {
                        isCollade = collision( pg, box, -VELOCIDAD, 0 );

                        if ( isCollade  )
                        {
                            choca = true;
                        }
                    });    
                    
                pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_l.png')";

                if (!choca)
                {
                    restarX ( parseInt(pg.style.left), pg );
                }   

                choca = false;
            
            }

            boxes.forEach( function(box)
            {
                isCollade = collision( pg, box, 0, -VELOCIDAD );

                if ( isCollade  )
                {
                    choca = true;
                }
            });    

            if (!choca)
            {
                restarY ( parseInt(pg.style.bottom), pg );

                if ( parseInt(pg.style.bottom) == SUELO )
                {
                    isJumping = false;
                    isCollideBottom = false;
                    
                    if (lookingRight == true) {	pg.style.backgroundImage = "url('imagenes/pg/pg_stand_r.gif')"; }
			        else { pg.style.backgroundImage = "url('imagenes/pg/pg_stand_l.gif')"; }
                    clearInterval(downTimerID2);
                }
            }   
            else
            {
                var ingrediente;
                choca = false;

                ingredientes.forEach( function(ingr)
                {
                    
                    isCollade = collision( pg, ingr, 0, -VELOCIDAD );
                    if ( isCollade )
                    {
                        if (!ingr.isHit)
                        {
                            ingrediente = ingr;
                            choca = true;
                        }
                    }
                });

                if (choca)
                {
                    getIngr(ingrediente);
                }

                choca = false;

                isJumping = false;
                isCollideBottom = true;
                if (lookingRight == true) {	pg.style.backgroundImage = "url('imagenes/pg/pg_stand_r.gif')"; }
                else { pg.style.backgroundImage = "url('imagenes/pg/pg_stand_l.gif')"; }
                clearInterval(downTimerID2);
            }

            choca = false;

        }, 20);

        isCollideBottom = false;
    }
}

function resetBox(event)
{
	if (event.key == 'd' || event.keyCode == '68') //derecha
	{
        if (!isJumping)
        {
            pg.style.backgroundImage = "url('imagenes/pg/pg_stand_r.gif')";
        }

        if ( !died )
        {
            isGoingRight = false;
            RightKey = false;
        }
	}

	if(event.key == 'a' || event.keyCode == '65') //Izquierda
	{
        if (!isJumping)
        {
            pg.style.backgroundImage = "url('imagenes/pg/pg_stand_l.gif')";
        }

        if ( !died )
        {
            isGoingLeft = false;
            LeftKey = false;
        }
        // BUG IMAGEN POR PRESIONAR DOS TECLAS A LA VEZ
	}
}

window.onkeydown = movimiento;
window.onkeyup = resetBox;