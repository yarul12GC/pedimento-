<?php
// Conexión a la base de datos
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos del formulario
    $idpedimentoc = $_POST['idpedimentoc'];
    $section_id = $_POST['section_id'];
    $idpartida3 = $_POST['idpartida3'];
    $valaduusd = $_POST['valaduusd'];
    $imppreciopag = $_POST['imppreciopag'];
    $preciounitario = $_POST['preciounitario'];
    $valoragregado = $_POST['valoragregado'];

    // Consulta SQL para actualizar los datos
    $sql = "UPDATE partida3
            SET valaduusd = ?, imppreciopag = ?, preciounitario = ?, valoragregado = ?
            WHERE idpedimentoc = ? AND section_id = ? AND idpartida3 = ?";

    // Preparar la consulta
    if ($stmt = $conexion->prepare($sql)) {
        // Vincular los parámetros
        $stmt->bind_param("sssssss", $valaduusd, $imppreciopag, $preciounitario, $valoragregado, $idpedimentoc, $section_id, $idpartida3);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir o mostrar un mensaje de éxito
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
        } else {
            echo "Error al actualizar los datos: " . $stmt->error;
        }

        // Cerrar la consulta
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
}
