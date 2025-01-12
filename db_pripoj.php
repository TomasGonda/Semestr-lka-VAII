<?php
$server = "localhost";
$username = "root";
$heslo = "";
$databaza = "db_uzivatelia";

$conn = mysqli_connect($server, $username, $heslo, $databaza);

if (!$conn) {
    die("Pripojenie zlyzahlo: " . mysqli_connect_error());
}
echo "Pripojene";
?>