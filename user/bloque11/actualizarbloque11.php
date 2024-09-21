<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idapendice12Array = $_POST['idapendice12'];
    $idapendice13Array = $_POST['idapendice13'];
    $importeArray = $_POST['importe'];
    $idpedimentocArray = $_POST['idpedimentoc'];
    $idliquidacionArray = $_POST['idliquidacion'];

    if (
        count($idapendice12Array) === count($idapendice13Array) &&
        count($idapendice13Array) === count($importeArray) &&
        count($importeArray) === count($idpedimentocArray) &&
        count($idpedimentocArray) === count($idliquidacionArray)
    ) {
        $updateQuery = "
            UPDATE cuadrodeliquidacion
            SET idapendice12 = ?, idapendice13 = ?, importe = ?
            WHERE idpedimentoc = ? AND idliquidacion = ?
        ";
        $stmt = $conexion->prepare($updateQuery);

        if ($stmt) {
            foreach ($idapendice12Array as $index => $idapendice12) {
                $idapendice13 = $idapendice13Array[$index];
                $importe = $importeArray[$index];
                $idpedimentoc = $idpedimentocArray[$index];
                $idliquidacion = $idliquidacionArray[$index];

                $stmt->bind_param('iiiii', $idapendice12, $idapendice13, $importe, $idpedimentoc, $idliquidacion);
                if (!$stmt->execute()) {
                    echo "Error al actualizar el registro con ID de liquidación $idliquidacion: " . $stmt->error;
                }
            }

            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conexion->error;
        }

        $conexion->close();

        header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
    } else {
        echo "Los datos del formulario no son válidos.";
    }
} else {
    echo "No se han enviado datos.";
}
