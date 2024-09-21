<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $idtransporte = intval($_POST['idtransporte'] ?? 0);
    $idapendice3entrtadaSalida = intval($_POST['idapendice3entrtadaSalida'] ?? null);
    $idapendice3arribo = intval($_POST['idapendice3arribo'] ?? null);
    $idapendice3salida = intval($_POST['idapendice3salida'] ?? null);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? null);

    // Si el ID de transporte es válido
    if ($idtransporte > 0) {

        // Construir la consulta de actualización
        $queryUpdate = "UPDATE transporte 
                        SET idapendice3entrtadaSalida = $idapendice3entrtadaSalida, 
                            idapendice3arribo = $idapendice3arribo, 
                            idapendice3salida = $idapendice3salida, 
                            idpedimentoc = $idpedimentoc
                        WHERE idtransporte = $idtransporte";

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
