<?php
$server = "localhost";
$email = "root"
$heslo = "";
$databaza = "db_uzivatelia"

$conn = mysqli_connect($server, $email, $heslo, $databaza);

if (!$conn) {
    die("Pripojenie zlyzahlo: " . mysqli_connect_error());
}
echo "Pripojene";