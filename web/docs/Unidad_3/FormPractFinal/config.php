<?php
$servername = "localhost";
$username = "root";
$password = "Root_pass1";
$dbname = "sistema_login";

$conn = new mysqli($servername, $username, $password, $dbname, 52000);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
