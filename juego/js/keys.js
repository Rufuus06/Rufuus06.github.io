// var keysPressed = {};

// onkeydown = onkeyup = function(e)
// {
//     e=e || event;
//     keysPressed[e.keyCode] = e.type == 'keydown';

//     if (map[65])
//     {
//         alert("a");
//     }
// }


var keysPressed = {};

document.addEventListener( 'keydown', (event) =>
{
    keysPressed[event.key] = true;

    if ( event.key == 'd' || event.key == '68' )
    {
        goRight();
    }

    if ( event.key == 'a' || event.key == '65' )
    {
        goLeft();
    }

    if ( event.key == 'w' || event.key == '38')
    {
        goUp();
    }

});

document.addEventListener( 'keyup', (event) => 
{
    resetBox(event);
    delete keysPressed[event.key];
});