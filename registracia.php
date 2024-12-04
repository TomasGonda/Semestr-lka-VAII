<?php

require "db_pripoj.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $heslo = $_POST['heslo'];

    $hash = password_hash($heslo, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM uzivatelia WHERE email = '$email'";
    $vysledok = mysqli_query($conn, $sql);

    if (mysqli_num_rows($vysledok) == 0) {
        if (strlen($heslo) < 6 ) {
            echo "Heslo musi mat aspon 6 znakov";
            exit;
        } else {
            $sql_insert = "INSERT INTO uzivatelia(email, heslo_hash) VALUES ('$email', '$hash')";

            if (mysqli_query($conn, $sql_insert)) {
                echo "Registracia bola uspesna";
            } else {
                echo "Chyba pri registracii";
            }
        }
    }
    else {
        echo "Tento email uz je zaregistrovany";
    } 
} else {
    echo "Neplatná akcia";
}

mysqli_close($conn);