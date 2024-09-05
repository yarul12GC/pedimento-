<?php

include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $efectivo = $_POST['efectivo'];
    $otros = $_POST['otros'];
    $total = $_POST['total'];
    $idtotales = $_POST['idtotales'];
    $idpedimentoc = $_POST['idpedimentoc'];

    $updateQuery = "
        UPDATE total
        SET efectivo = ?, otros = ?, total = ?
        WHERE idtotales = ? AND idpedimentoc = ?
    ";

    if ($stmt = $conexion->prepare($updateQuery)) {
        $stmt->bind_param('iiiii', $efectivo, $otros, $total, $idtotales, $idpedimentoc);

        if ($stmt->execute()) {
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit();
        } else {
            echo "Error al actualizar los datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }
} else {
    echo "No se han enviado datos.";
}
