<?php

require "db_pripoj.php";

if ($_SERVER["REQUEST"] == "POST") {
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];

    $sql = "SELECT * FROM uzivatelia WHERE email = 'email'";
    $vysledok = mysqli_query($conn, $sql);

    if (mysqli_num_rows($vysledok) > 0) {
        $uzivatel = mysqli_fetch_array($vysledok);

        if (password_verify($heslo, $uzivatel['heslo_hasch'])) {
            echo "Prihlasenie bolo uspesne"
        } else {
            echo "Nespravne heslo";
        }
    }
    else {
        echo "Tento email neexistuje";
    } 
} else {
    echo "Neplatná akcia";
}

sqli_close($conn);