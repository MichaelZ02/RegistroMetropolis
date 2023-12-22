<?php
   session_start();

    $user = $_POST["username"];

    $psw = $_POST["password"];

    $servername = "localhost:3307";
    $username = "registrometropolis";
    $password = "D2X4ceHbzkg7";
    $database = "my_registrometropolis";
     
    // Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    $_SESSION["conn"] = $conn;

    $sql = "select nome,ruolo from dipendenti where nome = '".$user."' and password = '".$psw."'";

    $result = $conn->query($sql);

    $row = $result->fetch_assoc();

    if($result->num_rows != 0){
        $_SESSION["nome"] = $row["nome"];

        $_SESSION["ruolo"] = $row["ruolo"];
        
        header("location: /Menu/MenuDipendente.php");
    }

   echo "<script>alert('Nome Utente o Password errati!');
            window.location.href = '/';</script>";
?>