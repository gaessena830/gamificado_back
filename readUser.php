<?php
// Incluir el archivo de configuración de la base de datos
require_once 'conexion.php';
//llegada de datos 
$data = json_decode(file_get_contents("php://input"));
$username = mysqli_real_escape_string($conn,trim($data->username));
$username=$_GET['username'] ?? '';
//$password=$_GET['password'] ?? '';

if ($username == ''){
   //echo json_encode(array("Ahora si" => $_SERVER['PHP_SELF'])) ;
   $query = "SELECT nombre, apellidos, username FROM usuarios ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userData = [
                'nombre' => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'username' => $row['username'],
                // Agrega otros campos según sea necesario
             ];
             echo json_encode($userData);
        } else {
            // No se encontró al usuario, devolver un array vacío
            $uservacio = [
                'Result' => 'No se encontraron usuarios',
            ];
            echo json_encode($uservacio);
        }
} else{
    if (isset($username) ){
        // Preparar la consulta para leer un usuario
        $query = "SELECT nombre, apellidos, username FROM usuarios where username = '$username' ";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userData = [
                'nombre' => $row['nombre'],
                'apellidos' => $row['apellidos'],
                'username' => $row['username'],
                 ];
             echo json_encode($userData);
            } else{
                echo json_encode(array("status" => "error", "message" => "No se encuentra el usuario"));
        }
}

}

$conn->close();
?>
