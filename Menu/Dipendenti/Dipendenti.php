<?php 
     $servername = "localhost:3307";
     $username = "registrometropolis";
     $password = "D2X4ceHbzkg7";
     $database = "my_registrometropolis";
     
     // Create connection
     $conn = new mysqli($servername, $username, $password,$database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Dipendenti</title>
    <link rel="stylesheet" href="/Menu/css/style.css">
    <script src="/Menu/js/script.js"></script>
    <link rel="stylesheet" href="/Menu/css/ruoli.css">
    <link rel="stylesheet" href="/Menu/css/tables.css">
    <script>
        listaDipendenti = [];
    </script>
</head>
<body>
    <div class="overlay" id="aggiungiDipendente">
        <div class="aggiungi" style="width:25%; height:30vw;">
            <h1>Crea Account</h1>
            <form class="form">
                <input type="text" class="text" placeholder="Inserisci Nome"><br><br>
                <input type="text" class="text" id="psw"><br><br>
                <select class="text" name="ruolo" style="width:100%">
                    <option>Seleziona Ruolo</option>
                </select><br><br>
                <select name="aggiuntive[]" class="text" style="border-radius:10px;width:100%;" multiple>
                    <option>Nessuna</option>
                </select><br>
                <input type="submit" value="invia" class="submit">
            </form>
        </div>
    </div>
    <div id="wrapper">
        <div class="header">
            <div style="width: 50%;height: 80%;">
                <button class="indietro" onclick="indietro()">&#8656</button>
            </div>
            <h1>Dipendenti</h1>
            <div style="width: 50%;height: 80%;" onclick="openNav()">
                <img src = "https://minotar.net/helm/Michael_02/100" class="imgDip">
            </div>
        </div>
        <br>
        <div class="strumenti">
            <div>
                <img src="/Images/icons/add.png" class="strumento" onclick="openView('aggiungiDipendente')" style="float: left;">
            </div>
            <h2><input type="text" placeholder="🔍 Cerca Dipendente" class="text" onkeyup="cercaPerNome(listaDipendenti)" id="cerca"></h2>
            <div>
                <img src="/Images/icons/filter.png" class="filter" style="float: right;" onclick="openView('filter')">
            </div>
        </div>
        <br>
        <div class="boxGrid">
            <?php
            $sql = "SELECT * FROM dipendenti WHERE ruolo != 'docente forest' ORDER BY ID";

            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()):
            ?>
            <div class="box" id="<?php echo $row["nome"];?>">
                <div style="width: 25%;float: left;">
                    <img src = "https://minotar.net/helm/<?php echo $row["nome"]; ?>/100" class="imgBox" style="margin-top: 1.5vw;margin-left: 1vw;">
                </div>
                <div class="info">
                    &#128311; <b>Nome:</b> <?php echo $row["nome"]; ?>
                    <br>
                    &#128311; <b>Password:</b> <?php echo $row["password"]; ?>
                    <br>
                    &#128311; <b>Ruolo:</b> <span class="<?php echo $row["ruolo"];?>" style="font-size:1.25vw;padding: 0.05vw 0.3vw 0.05vw 0.3vw;"> <?php echo strtoupper($row["ruolo"]); ?></span>
                    <br>
                    &#128311; <b>In Prova:</b> <?php if($row["Stato"] == "NP"){echo "NO";} else {echo "<span style='color:red;'>SI</span>";} ?>
                    <br><br>
                </div>
                <div>
                    <textarea readonly rows="5"><?php echo $row["Aggiuntive"]; ?></textarea>
                </div>
                <div class="actions">
                    <img class="action" src="/Images/icons/edit.png">
                    <img class="action" src="/Images/icons/delete.png">
                </div>
            </div>
            <script>listaDipendenti.push({nome: "<?php echo $row["nome"];?>"});</script>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="sidenav" id="sidenav">
        <a onclick="closeNav()" class="close">&times;</a><br><br><br>

        <h1>Michael_02</h1>
        <h2 class="presidenza">Presidenza</h2>
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