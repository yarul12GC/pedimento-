<?php
include 'conexion.php'; 

if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
}

function iniciarSesion($email, $contrasena) {
    global $conexion;
    
    $query = $conexion->prepare("SELECT usuarioID, contrasena, tipoUsuarioID FROM usuarios WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows == 0) {
        return "Usuario no encontrado.";
    }
    
    $user = $result->fetch_assoc();
    
    $hashedPassword = hash('sha512', $contrasena);
    
    if ($hashedPassword == $user['contrasena']) {
        session_start();
        $_SESSION['usuarioID'] = $user['usuarioID'];
        $_SESSION['email'] = $email;
        $_SESSION['tipoUsuarioID'] = $user['tipoUsuarioID'];
        
        return "Inicio de sesión exitoso.";
    } else {
        return "Contraseña incorrecta.";
    }
}

// Ejemplo de uso
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    $resultado = iniciarSesion($email, $contrasena);

    if ($resultado === "Inicio de sesión exitoso.") {
        if ($_SESSION['tipoUsuarioID'] == 4) {
            echo '<script>window.location.href = "admin/index.php";</script>';
            exit;
        } else {
            echo '<script>alert("No tiene permisos para acceder a esta área.");</script>';
        }
    } else {
        echo '<script>alert("' . $resultado . '");</script>';
    }
}

$conexion->close();
?>
