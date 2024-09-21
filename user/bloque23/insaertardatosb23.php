<?php
// Conexión a la base de datos
include('../../conexion.php');

// Verifica si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captura de los datos del formulario
    $idapendice9 = $_POST['idapendice9'];
    $numpermiso = $_POST['numpermiso'];
    $firmapermiso = $_POST['firmapermiso'];
    $valcomdls = $_POST['valcomdls'];
    $cantidadumt = $_POST['cantidadumt'];
    $idpedimentoc = $_POST['idpedimentoc'];
    $section_id = $_POST['section_id'];

    // Prepara la consulta SQL para insertar los datos
    $sql = "INSERT INTO permisop (idapendice9, numpermiso, firmapermiso, valcomdls, cantidadumt, idpedimentoc, section_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepara la declaración
    if ($stmt = $conexion->prepare($sql)) {

        // Enlaza los parámetros con los valores del formulario
        $stmt->bind_param("issssii", $idapendice9, $numpermiso, $firmapermiso, $valcomdls, $cantidadumt, $idpedimentoc, $section_id);

        // Ejecuta la consulta
        if ($stmt->execute()) {
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
