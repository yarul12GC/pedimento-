<?php
// Iniciar sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: https://certicenca.cencacomex.com.mx/");
    exit();
}

// Verificar el tiempo de inactividad de la sesión
$tiempoInactividad = 1200; // 20 minutos (en segundos)
if (isset($_SESSION['tiempo']) && (time() - $_SESSION['tiempo'] > $tiempoInactividad)) {
    session_unset(); // Eliminar todas las variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: https://certicenca.cencacomex.com.mx/");
    exit();
}

// Actualizar el tiempo de la última actividad de la sesión
$_SESSION['tiempo'] = time();

// Verificar si el usuario tiene el ID almacenado en la sesión
if (!isset($_SESSION['usuarioID'])) {
    echo '<script> 
            alert("Acceso denegado, no autenticado.");
            window.location = "../index.php";
          </script>';
    exit();
}

// Si el usuario está autenticado, se puede obtener el ID del usuario
$idUsuario = $_SESSION['usuarioID'];
