var simple = document.getElementById("simple");
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

var compl = document.getElementById("complex");
compl.addEventListener("click", function()
{
    var box1 = document.getElementById("prueba2");

    if (box1.style.display == "none")
    {
        box1.style.display = "block";
    }
    else
    {
        box1.style.display = "none";
    }
})

var anon = document.getElementById("anon");
anon.addEventListener("click", function()
{
    var box1 = document.getElementById("prueba3");

    if (box1.style.display == "none")
    {
        box1.style.display = "block";
    }
    else
    {
        box1.style.display = "none";
    }
})

var callback = document.getElementById("callback");
callback.addEventListener("click", function()
{
    var box1 = document.getElementById("prueba4");

    if (box1.style.display == "none")
    {
        box1.style.display = "block";
    }
    else
    {
        box1.style.display = "none";
    }
})


