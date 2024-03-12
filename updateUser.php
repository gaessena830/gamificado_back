<?php
require_once('conexion.php');
//llegada de datos 
$data = json_decode(file_get_contents("php://input"));
//creacion de variables
    $nombre=$data->nombre;
    $apellidos=$data->apellidos;
    $identificacion=$data->identificacion;
    $correo=$data->correo;
    $telefono=$data->telefono;
    $username=$data->username;
    
    $sql="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', identificacion='$identificacion', correo='$correo', telefono='$telefono' WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result===TRUE){
        echo json_encode(array("status" => "successfull", "message" => "usuario actualizado correctamente"));
        exit();
    }
    $conn->close();
?>