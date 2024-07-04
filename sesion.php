<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
