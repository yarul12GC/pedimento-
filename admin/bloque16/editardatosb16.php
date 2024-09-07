<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numeroembarque = htmlspecialchars($_POST['numeroembarque']);
    $nconocimiento = htmlspecialchars($_POST['nconocimiento']);
    $nhouse = htmlspecialchars($_POST['nhouse']);
    $idembarque = intval($_POST['idembarque']);
    $idpedimentoc = intval($_POST['idpedimentoc']);

    if (empty($numeroembarque) || empty($nconocimiento) || empty($nhouse) || empty($idembarque)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    $query = "UPDATE dembarque 
              SET numeroembarque = ?, nconocimiento = ?, nhouse = ? 
              WHERE idembarque = ? AND idpedimentoc = ?";

    if ($stmt = $conexion->prepare($query)) {
        $stmt->bind_param('sssii', $numeroembarque, $nconocimiento, $nhouse, $idembarque, $idpedimentoc);

        if ($stmt->execute()) {
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
        } else {
            echo "Error al actualizar los datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Método no permitido.";
}
