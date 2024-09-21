<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $idincrementable = intval($_POST['idincrementable'] ?? 0);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? 0);
    $tipoCambioMXN = floatval($_POST['tipoCambioMXN'] ?? 0.0);

    // Realizar cálculos con el tipo de cambio
    $Vseguros = floatval($_POST['Vseguros']) * $tipoCambioMXN;
    $seguros = floatval($_POST['seguros']) * $tipoCambioMXN;
    $fletes = floatval($_POST['fletes']) * $tipoCambioMXN;
    $embalajes = floatval($_POST['embalajes']) * $tipoCambioMXN;
    $otrosincrement = floatval($_POST['otrosincrement']) * $tipoCambioMXN;

    // Verificar que el ID del incrementable y del pedimento sean válidos
    if ($idincrementable > 0 && $idpedimentoc > 0) {

        // Preparar la consulta de actualización
        $queryUpdate = "UPDATE valorincrementable 
                        SET fletes = $fletes, 
                            Vseguros = $Vseguros, 
                            seguros = $seguros, 
                            embalajes = $embalajes, 
                            otrosincrement = $otrosincrement 
                        WHERE idincrementable = $idincrementable AND idpedimentoc = $idpedimentoc";

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
