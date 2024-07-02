<?php
include 'conexion.php';
if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
}

function registrarUsuario($conexion, $email, $contrasena, $tipoUsuarioID) {
    $query = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows > 0) {
        return "El email ya está registrado.";
    }

    $hashedPassword = hash('sha512', $contrasena);
    
    $query = $conexion->prepare("INSERT INTO usuarios (email, contrasena, tipoUsuarioID) VALUES (?, ?, ?)");
    $query->bind_param("ssi", $email, $hashedPassword, $tipoUsuarioID);
    
    if ($query->execute()) {
        return "Usuario registrado exitosamente.";
    } else {
        return "Error al registrar el usuario: " . $query->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $tipoUsuarioID = $_POST['tipoUsuarioID'];

    if (empty($email) || empty($contrasena) || empty($tipoUsuarioID)) {
        echo "Todos los campos son requeridos.";
    } else {
        $resultado = registrarUsuario($conexion, $email, $contrasena, $tipoUsuarioID);
        echo $resultado;
    }
}

$conexion->close();