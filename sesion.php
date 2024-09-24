<?php
include('../conexion.php');

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
$email = $_SESSION['email'];

// Verificar si la conexión a la base de datos está establecida
if (!isset($conexion)) {
    die("Error de conexión a la base de datos.");
}

// Preparar la consulta para verificar el TipoUsuarioID
$stmt = mysqli_prepare($conexion, "SELECT TipoUsuarioID FROM usuarios WHERE email = ?");
if ($stmt === false) {
    die("Error al preparar la consulta SQL.");
}

mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// Verificar si se encontró el usuario
if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_bind_result($stmt, $tipoUsuarioID);
    mysqli_stmt_fetch($stmt);

    // Verificar si el TipoUsuarioID no es 1 o 4
    if ($tipoUsuarioID != 1 && $tipoUsuarioID != 4) {
        mysqli_stmt_close($stmt);
        echo '<script>
                alert("No tienes permisos para acceder a esta página.");
                window.location = "https://certicenca.cencacomex.com.mx/";
              </script>';
        exit();
    }
} else {
    // Usuario no encontrado
    mysqli_stmt_close($stmt);
    echo '<script>
            alert("Usuario no encontrado. Por favor, inicia sesión nuevamente.");
            window.location = "https://certicenca.cencacomex.com.mx/";
          </script>';
    exit();
}

// Cerrar la consulta
mysqli_stmt_close($stmt);

// Si todo está correcto, el usuario tiene acceso permitido
?>
