<?php

//credenciales de la base de datos

$servername = "localhost";
$username = "admingamif";
$password = "hEJoW_*K*CH/l1d3";
$dbname = "gamificado";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//return $conn;

//echo "Conexión exitosa";
?>
