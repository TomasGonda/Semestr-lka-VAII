<?php
session_start();
var_dump($_SESSION);
require "db_pripoj.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['email'])&& isset($_POST['heslo'])) {
        $email = trim($_POST['email']);
        $heslo = $_POST['heslo'];

        $stmt = $conn->prepare("SELECT * FROM uzivatelia WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $vysledok = $stmt->get_result();

        if ($vysledok->num_rows > 0) {
            $uzivatel = $vysledok->fetch_assoc();

          if (password_verify($heslo, $uzivatel['heslo_hash'])) {
            $_SESSION['user'] = $uzivatel['email'];
            header("Location: prihlasenie.html");
            echo "Prihlasenie bolo uspesne";
           } else {
              echo "Nespravne heslo";
              header("Location: prihlasenie.html");
           }
           $stmt->close();
     } else {
        echo "Chybajuce udaje";
     } 
    
} else {
    echo "Neplatná akcia";
}
}
mysqli_close($conn);
?>