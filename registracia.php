<?php
if ($_SERVER["REQUEST_METHOD"]=== "POST") {
    echo "Formular sa odoslal. <br>";
    var_dump($_POST);
} else {
    echo "Formular sa neodoslal";
}
/*require "db_pripoj.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
var_dump(($_POST));

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email'])&& isset($_POST['heslo'])) {

        $email = $_POST['email'];
        $heslo = $_POST['heslo'];

        if (strlen($heslo) < 6 ) {
            echo "Heslo musi mat aspon 6 znakov";
            exit;
        }
        $hash = password_hash($heslo, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM uzivatelia WHERE email = '$email'";
        $vysledok = mysqli_query($conn, $sql);

        if (mysqli_num_rows($vysledok) == 0) {
            $sql_insert = "INSERT INTO uzivatelia(email, heslo_hash) VALUES ('$email', '$hash')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Registracia bola uspesna";
              } else {
                echo "Chyba pri registracii";
             }
         }
         else {
                echo "Tento email uz je zaregistrovany";
         } 
    } else {
        echo "Neboli zadane udaje";
    }
    
} else {
    echo "Neplatná akcia";
}

mysqli_close($conn);
?>*/