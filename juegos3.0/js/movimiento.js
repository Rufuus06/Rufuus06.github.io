// VARIABLES

const GRAVEDAD = 0.98;

var isJumping = false;


// CALCULOS MOVIMIENTO PG

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
    y *= GRAVEDAD;
    box.style.bottom = y + "px";
}

function restarY ( y, box )
{
    y -= 10;
    y *= GRAVEDAD;
    box.style.bottom = y + "px";
}

// MOVIMIENTO PG

function goRight()
{
    
    var x = parseInt(pg.style.left);

    sumarX ( x, pg );
}	


function goLeft()
{        
    var x = parseInt(pg.style.left);

    restarX ( x, pg );
}

function goUp()
{
    jump();
}

// SALTO

var posInicial;
var jumpON = false;
posInicial = parseInt(pg.style.bottom);


function jump()
{
    if ( !isJumping )
    {
        var subir = setInterval( function()
        {
            if ( parseInt(pg.style.bottom) >= ( posInicial + ( pg.offsetHeight + ( pg.offsetHeight/4 ) ) ) )
            {
                clearInterval( subir );

                var caer = setInterval( function()
                {
                    restarY( parseInt(pg.style.bottom), pg );

                    if ( parseInt(pg.style.bottom) <= 0 )
                    {
                        pg.style.bottom = "0px";

                        isJumping = false;
                        isPressed = false;
                    
                        if ( lookingRight ){pg.style.backgroundImage = "url('imagenes/pg/pg_stand_r.gif')";}
                        else{pg.style.backgroundImage = "url('imagenes/pg/pg_stand_l.gif')";}

                        clearInterval(caer);
                    }                    

                }, 10);
            }

            sumarY ( parseInt(pg.style.bottom), pg, 5 );

            if ( lookingRight ){pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_r.png')";}
            else{pg.style.backgroundImage = "url('imagenes/pg/pg_jumping_l.png')";}

            isJumping = true;

        }, 1 );
    }
}

// KEYS DETECTOR

var checkKeys;
var keys;
var isPressed = false;
var lookingRight = true;

checkKeys = setInterval ( function()
{
    keys = getKeys();
    console.log(keys);

    if ( keys["d"] == true || keys["D"] == true || keys["ArrowRight"] == true )
    {
        if ( !isJumping )
        {
            pg.style.backgroundImage = "url('imagenes/pg/pg_walking_r.gif')";
        }

        lookingRight = true;

        goRight();
    }

    if ( keys["a"] == true || keys["A"] == true || keys["ArrowLeft"] == true  )
    {
        if ( !isJumping )
        {
            pg.style.backgroundImage = "url('imagenes/pg/pg_walking_l.gif')";
        }

        lookingRight = false;

        goLeft();
    }

    if ( keys["w"] == true || keys["W"] == true || keys["ArrowUp"] == true )    // es porque  se repite siempre, tienes que hacer que solo entre 1 vez hasta que llegue al suelo
    {
        if ( !isPressed )
        {
            isPressed = true;
            goUp();        
        }
    }

}, 1);

function resetPG(event)
{
    if ( event == "a" || event == "A" || event == "ArrowLeft" )
    {
        pg.style.backgroundImage = "url('imagenes/pg/pg_stand_l.gif')";
    }
    
    if ( event == "d" || event == "D" || event == "ArrowRight" )
    {
        pg.style.backgroundImage = "url('imagenes/pg/pg_stand_r.gif')";
    }
}