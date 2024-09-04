<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $iddecrement = intval($_POST['iddecrement'] ?? 0);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? 0);
    $tipoCambioMXN = floatval($_POST['tipoCambioMXN'] ?? 0.0);

    // Realizar cálculos con el tipo de cambio
    $VsegurosD = floatval($_POST['VsegurosD']) * $tipoCambioMXN;
    $segurosD = floatval($_POST['segurosD']) * $tipoCambioMXN;
    $fletesD = floatval($_POST['fletesD']) * $tipoCambioMXN;
    $embalajesD = floatval($_POST['embalajesD']) * $tipoCambioMXN;
    $otrosDecrement = floatval($_POST['otrosDecrement']) * $tipoCambioMXN;

    // Verificar que el ID del decrementable y del pedimento sean válidos
    if ($iddecrement > 0 && $idpedimentoc > 0) {

        // Preparar la consulta de actualización
        $queryUpdate = "UPDATE valordecrementable 
                        SET VsegurosD = $VsegurosD, 
                            segurosD = $segurosD, 
                            fletesD = $fletesD, 
                            embalajesD = $embalajesD, 
                            otrosDecrement = $otrosDecrement 
                        WHERE iddecrement = $iddecrement AND idpedimentoc = $idpedimentoc";

        // Ejecutar la consulta
        if ($conexion->query($queryUpdate) === TRUE) {
            // Redirigir después de la actualización exitosa
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit(); // Terminar el script después de la redirección
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    } else {
        echo "Datos inválidos proporcionados.";
    }
}
