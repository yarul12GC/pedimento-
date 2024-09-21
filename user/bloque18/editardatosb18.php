<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores enviados desde el formulario
    $idobservaciones = isset($_POST['idobservacion']) ? $_POST['idobservacion'] : [];
    $descripciones = isset($_POST['descripcion']) ? $_POST['descripcion'] : [];
    $idpedimentoc = isset($_POST['idpedimentoc']) ? $_POST['idpedimentoc'] : null;

    // Verificar si los datos del formulario coinciden en cantidad
    $count = count($idobservaciones);
    if ($count != count($descripciones)) {
        die("Los datos del formulario no coinciden.");
    }

    // Iniciar una transacción
    $conexion->begin_transaction();

    try {
        // Actualizar cada observación en la base de datos
        foreach ($idobservaciones as $index => $idobservacion) {
            if (isset($descripciones[$index])) {
                $descripcion = $conexion->real_escape_string($descripciones[$index]);
                $idobservacion = $conexion->real_escape_string($idobservacion);

                $queryUpdate = "
                    UPDATE observaciones
                    SET descripcion = '$descripcion'
                    WHERE idobservacion = '$idobservacion' AND idpedimentoc = '$idpedimentoc'
                ";

                // Ejecutar la consulta de actualización
                $conexion->query($queryUpdate);
            }
        }

        // Confirmar los cambios en la base de datos
        $conexion->commit();
        header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
    } catch (Exception $e) {
        // Revertir los cambios en caso de error
        $conexion->rollback();
        echo "Error al actualizar los datos: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Método de solicitud no permitido.";
}
