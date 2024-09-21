<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $idvalores = intval($_POST['idvalores'] ?? 0);
    $tipoCambioMXN = floatval($_POST['tipoCambioMXN'] ?? 0.0);
    $valorDolares = floatval($_POST['valorDolares'] ?? null);
    $valorAduna = floatval($_POST['valorAduna'] ?? null);
    $precioPagado = floatval($_POST['precioPagado'] ?? null);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? null);

    // Si el ID de valores es válido
    if ($idvalores > 0) {

        // Construir la consulta de actualización
        $queryUpdate = "UPDATE valoresp 
                        SET tipoCambioMXN = $tipoCambioMXN, 
                            valorDolares = $valorDolares, 
                            valorAduna = $valorAduna, 
                            precioPagado = $precioPagado, 
                            idpedimentoc = $idpedimentoc
                        WHERE idvalores = $idvalores";

        // Ejecutar la consulta
        if ($conexion->query($queryUpdate) === TRUE) {
            // Redirigir después de la actualización exitosa
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit(); // Terminar el script después de la redirección
        } else {
            echo "Error al actualizar el registro: " . $conexion->error;
        }
    }
}
