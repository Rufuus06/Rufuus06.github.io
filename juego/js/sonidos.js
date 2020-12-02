var sound;

var listaMusica = 
[
    "sonidos/musica/Alone.mp3",
    "sonidos/musica/BillieJean.mp3",
    "sonidos/musica/BohemianRapsody.mp3",
    "sonidos/musica/ConCalma.mp3",
    "sonidos/musica/DontStopMeNow.mp3",
    "sonidos/musica/GetLucky.mp3",
    "sonidos/musica/ImmigrantSong.mp3",
    "sonidos/musica/StayinAlive.mp3",
    "sonidos/musica/TakeOnMe.mp3",
    "sonidos/musica/Tusa.mp3"
]

function sound(src)
{
    this.sound = document.createElement('audio');
    this.sound.src = src;
    this.sound.id = src;
    this.sound.setAttribute("preload", "auto");
    this.sound.setAttribute("controls", "none");
    this.sound.style.display = "none";
    this.sound.volume = 0.05;
    // this.sound.muted = "muted";

    if ( src == "sonidos/itemPickUp.mp3")
    {
        this.sound.volume = 0.1;
    }

    document.body.appendChild(this.sound);
    this.play = function()
    {
        this.sound.play();
    }
    this.stop = function()
    {
        this.sound.pause();
    }
}

