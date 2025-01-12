<?php
if ($_SERVER["REQUEST_METHOD"]=== "POST") {
    echo "Formular sa odoslal. <br>";
    var_dump($_POST);
} else {
    echo "Formular sa neodoslal";
}
require "db_pripoj.php";
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

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Neplatny format emailu";
            exit;
        }
        $hash = password_hash($heslo, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT * FROM uzivatelia WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $vysledok = $stmt->get_result();

        if ($vysledok->num_rows == 0) {
            $stmt_insert = $conn->prepare("INSERT INTO uzivatelia (email, heslo_hash) VALUES (?, ?)");
            $stmt_insert->bind_param("ss", $email, $hash);
            if ($stmt_insert->execute()) {
                echo "Registracia bola uspesna";
              } else {
                echo "Chyba pri registracii". $stmt_insert->error;
             }
             $stmt_insert->close();
         }
         else {
                echo "Tento email uz je zaregistrovany";
         } 
         $stmt->close();
    } else {
        echo "Neboli zadane udaje";
    }
    
} else {
    echo "Neplatná akcia";
}

mysqli_close($conn);
?>