<?php
if (session_status() == PHP_SESSION_NONE) {
    ob_start(); // Inicia el buffering de salida
    session_start();
    $output = ob_get_contents(); // Obtiene el contenido del buffer
    if (!empty($output)) {
        error_log('Salida antes de session_start(): ' . $output);
    }
    ob_end_clean(); // Limpia el buffer para evitar enviar contenido accidental
}

if (!isset($_SESSION['usuarioID'])) { 
    echo '<script> 
            alert("Acceso denegado, no autenticado.");
            window.location = "../index.php";
          </script>';
    exit();
}
$idUsuario = $_SESSION['usuarioID'];
?>
