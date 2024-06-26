<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    echo '<script> 
            alert("Acceso denegado, no autenticado.");
            window.location = "index.php";
          </script>';
    exit();
}
?>
