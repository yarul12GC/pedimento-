<?php
// Incluir la conexión a la base de datos
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y sanitizar los datos enviados desde el formulario
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $idpedimentoc = intval($_POST['idpedimentoc']);
    $section_id = intval($_POST['section_id']);
    $idpartida2 = intval($_POST['idpartida2']);

    // Validar que los campos no estén vacíos
    if (!empty($descripcion) && !empty($idpedimentoc) && !empty($section_id) && !empty($idpartida2)) {

        // Preparar la consulta para actualizar los datos en la base de datos
        $stmt = $conexion->prepare("UPDATE partida2 SET descripcion = ? WHERE idpedimentoc = ? AND section_id = ? AND idpartida2 = ?");
        $stmt->bind_param('siii', $descripcion, $idpedimentoc, $section_id, $idpartida2);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir o mostrar un mensaje de éxito
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit();
        } else {
            // Mostrar un mensaje de error si no se pudo ejecutar la consulta
            echo "Error al actualizar los datos: " . $conexion->error;
        }

        // Cerrar la consulta
        $stmt->close();
    } else {
        echo "Por favor complete todos los campos obligatorios.";
    }
}

// Cerrar la conexión
$conexion->close();
