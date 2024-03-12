<?php
require_once 'conexion.php';
$data = json_decode(file_get_contents("php://input"));
if (!isset($data->nombre) || !isset($data->apellidos) || !isset($data->password)) {
    http_response_code(400); // Solicitud incorrecta
    echo json_encode(array("message" => "Faltan datos obligatorios"));
    echo json_encode(array("datos" => $data));
    exit();
}
    $nombre=$data->nombre;
    $apellidos=$data->apellidos;
    $identificacion=$data->password;
    $correo=$data->correo;
    $telefono=$data->telefono;
    $rol=$data->rol;
    $username=$data->username;
    $password=$data->password;
    
    $query="SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo json_encode(array("status" => "error", "message" => "usuario ya existe"));
        exit();
    }

    $sql="INSERT INTO usuarios (nombre, apellidos, identificacion, correo, telefono, rol, username, password) VALUES ('$nombre', '$apellidos', '$identificacion', '$correo', '$telefono', '$rol', '$username', '$password')";
    $resultado = $conn->query($sql);//ejecutar la consulta
    echo json_encode(array("message" => "Usuario creado correctamente"));
    $conn->close();
?>