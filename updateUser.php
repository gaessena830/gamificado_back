<?php
require_once('conexion.php');
//llegada de datos 
$data = json_decode(file_get_contents("php://input"));
//creacion de variables
    $nombre=$data->nombre ?? null;
    $apellidos=$data->apellidos ?? null;
    $identificacion=$data->identificacion ?? null;
    $correo=$data->correo ?? null;
    $telefono=$data->telefono ?? null;
    $username=$data->username;
    
    
    //consulta si usuario existe
    $query="SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $userData = array();
        while ($row = $result->fetch_assoc()) {
            $nombrequery=$row['nombre'];
            $apellidosquery=$row['apellidos'];
            $identificacionquery=$row['identificacion'];
            $correoquery=$row['correo'];
            $telefonoquery=$row['telefono'];
        }
         
    } else{
        echo json_encode(array("status" => "error", "message" => "Usuario no encontrado"));
        exit();
    }
    
    //validacion vacios
    if($nombre===""){
        $nombre=$nombrequery;
    }
    if($apellidos===""){
        $apellidos=$apellidosquery;
    }
    if($identificacion===""){
        $identificacion=$identificacionquery;
    }
    if($correo===""){
        $correo=$correoquery;
    }
    if($telefono===""){
        $telefono=$telefonoquery;
    }

    //actualizacion de datos
    $sql="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', identificacion='$identificacion', correo='$correo', telefono='$telefono' WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result===TRUE){
        echo json_encode(array("status" => "successfull", "message" => "usuario actualizado correctamente"));
        exit();
    }
    $conn->close();
?>