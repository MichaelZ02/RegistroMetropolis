<?php 
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Menu Dipendente</title>
    <link rel="stylesheet" href="/Menu/css/style.css">
    <link rel="stylesheet" href="/Menu/css/ruoli.css">
    <script src="/Menu/js/script.js"></script>
</head>
<body onload="caricaComunicazioni()">

    <div class="notifica" id="notifica">
        <img id="imgCom" style="width: 2vw;height: 1.8vw; cursor: pointer;" src="/Images/icons/email.png" onclick="window.location.href='/Menu/Comunicazioni/Comunicazioni.html'"/> 
        Hai <span id="nCom"></span> comunicazioni da leggere
        <div class="close" style="font-size: 2vw;" onclick="chiudiNotifica()">&times;</div>
    </div>
    
    <div class="overlay" id="info">
        <div class="aggiungi" style="width: 20%;height: 12.5vw;">
            <h1>Informazioni</h1>
            <p style="text-align: center; color: white; font-size: 1.5vw;">Versione 4.0.0 beta &#128295;</p>
            <br>
            <button class="chiudi" onclick="closeView('info')">&times;</button>
        </div>
    </div>

    <div id="wrapper">
        <div class="header">
            <div style="width: 50%;height: 80%;">
                <img src="/Images/loghi/logoScuola.png" class="logoScuola" onclick="openView('info')">
            </div>
            <h1>I.C.S Agatha Christie</h1>
            <div style="width: 50%;height: 80%;" onclick="openNav()">
                <img src = "https://minotar.net/helm/<?php echo $_SESSION["nome"];?>/100" class="imgDip">
            </div>
        </div>
        <br>
        <div class="grid">
            <button class="button" onclick="apriMenu('Iscrizioni')"><img src="/Images/sezioni/iscrizioni.png" class="img"><b>Iscrizioni</b></button>
            <button class="button" onclick="apriMenu('Firme')"><img src="/Images/sezioni/firme.png" class="img"><b>Firme</b></button>
            <button class="button" onclick="apriMenu('Dipendenti')"><img src="/Images/sezioni/dipendenti.png" class="img"><b>Dipendenti</b></button>
        </div>
    </div>

    <div class="sidenav" id="sidenav">
        <a onclick="closeNav()" class="close">&times;</a><br><br><br>

        <h1><?php echo $_SESSION["nome"];?></h1>
        <h2 class="<?php echo $_SESSION["ruolo"];?>"><?php echo strtoupper($_SESSION["ruolo"]);?></h2>
        <h3>Extra</h3>
        <ul>
            <li>Gestore Dormitori</li>
            <li>Gestore Club</li>
            <li>Gestore Corsi</li>
        </ul>
        <br>
        <div class="optionGrid"">
            <button class="option">Statistiche</button>
            <button class="option" onclick="window.location.href='/Menu/Comunicazioni/Comunicazioni.html'">Comunicazioni</button>
            <button class="option">Altro</button>
            <button class="esci">Esci <img class="icon" src="/Images/icons/logout.png"></button>
        </div>
    </div>
  
    
</body>
</html>