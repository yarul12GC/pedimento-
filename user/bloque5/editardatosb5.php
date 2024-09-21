<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $idExportador = intval($_POST['idExportador'] ?? 0);
    $tipoIE = mysqli_real_escape_string($conexion, $_POST['tipoIE'] ?? '');
    $nombreE = mysqli_real_escape_string($conexion, $_POST['nombreE'] ?? '');
    $curp = mysqli_real_escape_string($conexion, $_POST['curp'] ?? '');
    $rfc = mysqli_real_escape_string($conexion, $_POST['rfc'] ?? '');
    $Calle = mysqli_real_escape_string($conexion, $_POST['Calle'] ?? '');
    $numeroInterior = mysqli_real_escape_string($conexion, $_POST['numeroInterior'] ?? '');
    $numeroExterior = mysqli_real_escape_string($conexion, $_POST['numeroExterior'] ?? '');
    $codigoPostal = mysqli_real_escape_string($conexion, $_POST['codigoPostal'] ?? '');
    $municipio = mysqli_real_escape_string($conexion, $_POST['municipio'] ?? '');
    $entidadfederativa = mysqli_real_escape_string($conexion, $_POST['entidadfederativa'] ?? '');
    $pais = mysqli_real_escape_string($conexion, $_POST['pais'] ?? '');
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? 0);

    if ($idExportador > 0) {

        $queryUpdate = "UPDATE importadorexportador 
                        SET tipoIE = '$tipoIE', 
                            nombreE = '$nombreE', 
                            curp = '$curp', 
                            rfc = '$rfc', 
                            Calle = '$Calle', 
                            numeroInterior = '$numeroInterior', 
                            numeroExterior = '$numeroExterior', 
                            codigoPostal = '$codigoPostal', 
                            municipio = '$municipio', 
                            entidadfederativa = '$entidadfederativa', 
                            pais = '$pais', 
                            idpedimentoc = $idpedimentoc
                        WHERE idExportador = $idExportador";

        if ($conexion->query($queryUpdate) === TRUE) {
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit(); // Terminar el script después de la redirección
        } else {
            echo "Error al actualizar el registro: " . $conexion->error;
        }
    } else {
        echo "ID de exportador no válido.";
    }
} else {
    echo "Método de solicitud no válido.";
}

// Cerrar la conexión
$conexion->close();
