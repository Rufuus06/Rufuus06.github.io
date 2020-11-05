var simple = document.getElementById("btn");
simple.addEventListener("click", function()
{
    var box1 = document.getElementById("prueba");

    if (box1.style.display == "none")
    {
        box1.style.display = "block";
    }
    else
    {
        box1.style.display = "none";
    }
})


