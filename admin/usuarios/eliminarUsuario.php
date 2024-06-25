<?php
include('../../conexion.php');

if (isset($_GET["usuarioID"])) {
    $idusuario = mysqli_real_escape_string($conexion, $_GET["usuarioID"]);

    if (!empty($idusuario)) {
        $queryDelete = "DELETE FROM usuarios WHERE usuarioID = '$idusuario'";

        if (mysqli_query($conexion, $queryDelete)) {
            header("Location: ../index.php?success=" . urlencode('Usuario eliminado exitosamente.'));
            exit;
        } else {
            $error_message = "Error al eliminar el usuario: " . mysqli_error($conexion);
            header("Location: ../index.php?error=" . urlencode($error_message));
            exit();
        }
    } else {
        header("Location: ../index.php?error=" . urlencode('ID de usuario no válido.'));
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}

