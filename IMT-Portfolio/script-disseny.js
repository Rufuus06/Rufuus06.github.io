function openModal( value )
{
    var header = document.getElementById("modal-header");
    var desc = document.getElementById("modal-desc");
    var img = document.getElementById("modal-img");

    switch(value)
    {
        case 1:
            desc.innerHTML = "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum";
            img.style.backgroundImage = "url('../../img/fondo4.jpg')";
            header.innerHTML = "Imagen 1";
            break;

        case 2:
            desc.innerHTML = "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum";
            img.style.backgroundImage = "url('../../img/fondo4.jpg')";
            header.innerHTML = "Imagen 1";
            break;

        case 3:
            desc.innerHTML = "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum";
            img.style.backgroundImage = "url('../../img/fondo4.jpg')";
            header.innerHTML = "Imagen 3";
            break;
        
        case 4:
            desc.innerHTML = "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum";
            img.style.backgroundImage = "url('../../img/fondo4.jpg')";
            header.innerHTML = "Imagen 4";
            break;

        case 5:
            desc.innerHTML = "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum";
            img.style.backgroundImage = "url('../../img/fondo4.jpg')";
            header.innerHTML = "Imagen 5";
            break;
        
        case 6:
            desc.innerHTML = "lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum";
            img.style.backgroundImage = "url('../../img/fondo4.jpg')";
            header.innerHTML = "Imagen 6";
            break;
    }
}