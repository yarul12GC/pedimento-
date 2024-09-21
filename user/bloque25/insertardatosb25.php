<?php
include('../../conexion.php'); // Asegúrate de que este archivo tenga la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['descripcionnp']) && isset($_POST['section_id']) && isset($_POST['idpedimentoc'])) {

    $observaciones = $_POST['descripcionnp']; // Este es el array de observaciones
    $section_id = $_POST['section_id'];
    $idpedimentoc = $_POST['idpedimentoc'];

    $query = "INSERT INTO observacionesnp (descripcionnp, section_id, idpedimentoc) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($query);


    if ($stmt === false) {
        die('Error en la preparación de la consulta SQL: ' . $conexion->error);
    }

    $conexion->begin_transaction();

    try {
        foreach ($observaciones as $observacion) {
            $stmt->bind_param("sii", $observacion, $section_id, $idpedimentoc);

            if (!$stmt->execute()) {
                throw new Exception("Error al insertar la observación: " . $stmt->error);
            }
        }

        $conexion->commit();
        header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
} else {
    echo "No se enviaron los datos necesarios.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
