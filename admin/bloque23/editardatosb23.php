<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir datos desde el formulario
    $idapendice9 = $_POST['idapendice9'];
    $numpermiso = $_POST['numpermiso'];
    $firmapermiso = $_POST['firmapermiso'];
    $valcomdls = $_POST['valcomdls'];
    $cantidadumt = $_POST['cantidadumt'];
    $idpedimentoc = $_POST['idpedimentoc'];
    $section_id = $_POST['section_id'];
    $idpermisop = $_POST['idpermisop'];

    // Preparar la consulta SQL para actualizar los datos
    $sql = "UPDATE permisop SET 
                idapendice9 = ?, 
                numpermiso = ?, 
                firmapermiso = ?, 
                valcomdls = ?, 
                cantidadumt = ?
            WHERE idpedimentoc = ? AND section_id = ? AND idpermisop = ?";

    // Preparar la sentencia
    if ($stmt = $conexion->prepare($sql)) {
        // Vincular los parámetros y ejecutar la actualización
        $stmt->bind_param("issssiii", $idapendice9, $numpermiso, $firmapermiso, $valcomdls, $cantidadumt, $idpedimentoc, $section_id, $idpermisop);

        if ($stmt->execute()) {
            // Redirigir o mostrar mensaje de éxito
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
        } else {
            echo "Error en la ejecución: " . $stmt->error;
        }

        // Cerrar la declaración preparada
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
