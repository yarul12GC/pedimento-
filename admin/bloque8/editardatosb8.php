<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $aviso_electronico = $_POST['aviso_electronico'] ?? '';
    $idapendice1 = intval($_POST['idapendice1'] ?? 0);
    $marca = $_POST['marca'] ?? '';
    $modelo = $_POST['modelo'] ?? '';
    $nBultos = intval($_POST['nBultos'] ?? 0);
    $idpermisos = intval($_POST['idpermisos'] ?? 0);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? 0);

    // Validar que los datos necesarios estén presentes
    if ($idpermisos > 0) {
        // Construir la consulta de actualización
        $queryUpdate = "UPDATE permisos 
                        SET aviso_electronico = ?, 
                            idapendice1 = ?, 
                            marca = ?, 
                            modelo = ?, 
                            nBultos = ?, 
                            idpedimentoc = ?
                        WHERE idpermisos = ?";

        // Preparar la consulta
        if ($stmt = $conexion->prepare($queryUpdate)) {
            // Vincular parámetros
            $stmt->bind_param('sissiii', $aviso_electronico, $idapendice1, $marca, $modelo, $nBultos, $idpedimentoc, $idpermisos);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir después de la actualización exitosa
                header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
                exit(); // Terminar el script después de la redirección
            } else {
                echo "Error al actualizar el registro: " . $stmt->error;
            }

            // Cerrar el statement
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }
    } else {
        echo "ID de permisos no válido.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
