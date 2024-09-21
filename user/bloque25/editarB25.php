<?php
// Conexión a la base de datos
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir arrays de datos desde el formulario
    $descripcionnpArray = $_POST['descripcionnp'];
    $section_idArray = $_POST['section_id'];
    $idpedimentocArray = $_POST['idpedimentoc'];
    $idobservacionesnpArray = $_POST['idobservacionesnp'];

    // Asegurarse de que los arrays tengan el mismo tamaño
    if (
        count($descripcionnpArray) === count($section_idArray) &&
        count($section_idArray) === count($idpedimentocArray) &&
        count($idpedimentocArray) === count($idobservacionesnpArray)
    ) {

        // Preparar la consulta SQL para actualizar los datos
        $sql = "UPDATE observacionesnp SET descripcionnp = ?, section_id = ?, idpedimentoc = ? WHERE idobservacionesnp = ?";

        // Preparar la sentencia
        if ($stmt = $conexion->prepare($sql)) {
            // Iterar sobre cada conjunto de datos
            for ($i = 0; $i < count($descripcionnpArray); $i++) {
                $descripcionnp = $descripcionnpArray[$i];
                $section_id = $section_idArray[$i];
                $idpedimentoc = $idpedimentocArray[$i];
                $idobservacionesnp = $idobservacionesnpArray[$i];

                // Vincular los parámetros y ejecutar la actualización
                $stmt->bind_param("sisi", $descripcionnp, $section_id, $idpedimentoc, $idobservacionesnp);
                $stmt->execute();
            }

            // Cerrar la declaración preparada
            $stmt->close();

            // Redirigir o mostrar mensaje de éxito
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
        } else {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }
    } else {
        echo "Los datos no coinciden en cantidad.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
