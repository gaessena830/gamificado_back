<?php
require_once 'conexion.php';

//llegada de datos 
$data = json_decode(file_get_contents("php://input"));
if (isset($data->username) && isset($data->identificacion)){
    $username = mysqli_real_escape_string($conn, trim($data->username));
    $identificacion = mysqli_real_escape_string($conn, trim($data->identificacion));
    $query = "DELETE FROM usuarios WHERE username = '$username' AND identificacion = '$identificacion'";
    $result = mysqli_query($conn, $query);
    echo json_encode(array("status" => "successfull", "message" => "Usuario eliminado correctamente"));

} else {
    echo json_encode(array("status" => "error", "message" => "Faltan datos necesarios"));
    echo json_encode(array("datos" => $data));
}
?>