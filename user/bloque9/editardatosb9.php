<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger los datos del formulario
    $entrada = $_POST['entrada'] ?? '';
    $pago = $_POST['pago'] ?? '';
    $idfechas = intval($_POST['idfechas'] ?? 0);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? 0);

    // Validar que los datos necesarios estén presentes
    if ($idfechas > 0 && !empty($entrada) && !empty($pago)) {

        // Escapar los datos para evitar SQL Injection
        $entrada = $conexion->real_escape_string($entrada);
        $pago = $conexion->real_escape_string($pago);

        // Preparar la consulta SQL de actualización
        $queryUpdate = "UPDATE fechas 
                        SET entrada = '$entrada', 
                            pago = '$pago', 
                            idpedimentoc = $idpedimentoc
                        WHERE idfechas = $idfechas";

        // Ejecutar la consulta
        if ($conexion->query($queryUpdate) === TRUE) {
            // Redirigir después de la actualización exitosa
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit(); // Terminar el script después de la redirección
        } else {
            echo "Error al actualizar el registro: " . $conexion->error;
        }
    } else {
        echo "Datos no válidos.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
