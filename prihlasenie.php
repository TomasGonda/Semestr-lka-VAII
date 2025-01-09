<?php

require "db_pripoj.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['email'])&& isset($_POST['heslo'])) {
        $email = $_POST['email'];
        $heslo = $_POST['heslo'];

        $sql = "SELECT * FROM uzivatelia WHERE email = '$email'";
        $vysledok = mysqli_query($conn, $sql);

        if (mysqli_num_rows($vysledok) > 0) {
            $uzivatel = mysqli_fetch_array($vysledok);

          if (password_verify($heslo, $uzivatel['heslo_hash'])) {
               echo "Prihlasenie bolo uspesne";
           } else {
              echo "Nespravne heslo";
           }
     } else {
        echo "Chybajuce udaje";
     } 
    
} else {
    echo "Neplatná akcia";
}
}
mysqli_close($conn);
?>