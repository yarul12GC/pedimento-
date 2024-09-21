<?php
include('../../conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capturar los datos del formulario
    $valaduusd = $_POST['valaduusd'];
    $imppreciopag = $_POST['imppreciopag'];
    $preciounitario = $_POST['preciounitario'];
    $valoragregado = $_POST['valoragregado'];
    $idpedimentoc = $_POST['idpedimentoc'];
    $section_id = $_POST['section_id'];

    // Prepara la consulta SQL para insertar los datos
    $sql = "INSERT INTO partida3 (valaduusd, imppreciopag, preciounitario, valoragregado, idpedimentoc, section_id) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepara la declaración
    if ($stmt = $conexion->prepare($sql)) {

        // Enlaza los parámetros con los valores del formulario
        $stmt->bind_param("ssssii", $valaduusd, $imppreciopag, $preciounitario, $valoragregado, $idpedimentoc, $section_id);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            // Redireccionar o mostrar mensaje de éxito
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit();
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }

        // Cierra la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    echo "Solicitud no válida";
}
