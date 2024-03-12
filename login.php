<?php
    require_once 'conexion.php';
    $data = json_decode(file_get_contents("php://input"));
    if (!isset($data->user) && !isset($data->pass)) {
        http_response_code(400); // Solicitud incorrecta
        //echo json_encode(array("message" => "Faltan datos obligatorios"));
        echo json_encode(array("datos" => $data));
        exit();
    }
    
    $username = $data->user;
    $password = $data->pass;

    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario y contraseña válidos
        echo json_encode(array("status" => "success", "message" => "Inicio de sesion exitoso"));
    } else {
        // Usuario o contraseña inválidos
        echo json_encode(array("status" => "error", "message" => "Nombre de usuario o contraseña incorrectos"));
    }

    $conn->close();
?>