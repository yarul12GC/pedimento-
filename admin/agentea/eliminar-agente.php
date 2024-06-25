<?php
include('../../conexion.php'); 
include('../../sesion.php');

if (isset($_GET['idagente'])) {
    $idagente = mysqli_real_escape_string($conexion, $_GET['idagente']);

    $sql = "DELETE FROM agenteaduanal WHERE idagente = '$idagente'";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../agenteaduanal.php?success=" . urlencode('Agente aduanal eliminado exitosamente.'));
        exit;
    } else {
        $error_message = "Error al eliminar el agente aduanal: " . mysqli_error($conexion);
        header("Location: ../agenteaduanal.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    header("Location: ../agenteaduanal.php?error=" . urlencode('ID de agente no proporcionado.'));
    exit();
}
