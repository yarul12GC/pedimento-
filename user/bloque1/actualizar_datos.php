<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $idpedimento = intval($_POST['idpedimento'] ?? 0);
    $Nopedimento = trim($_POST['Nopedimento'] ?? '');
    $Toper = trim($_POST['Toper'] ?? '');
    $idapendice2 = intval($_POST['idapendice2'] ?? null);
    $idapendice16 = intval($_POST['idapendice16'] ?? null);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? null);
    $anio_validacion = trim($_POST['anio_validacion'] ?? '');
    $clave_aduana = trim($_POST['clave_aduana'] ?? '');
    $patente = trim($_POST['patente'] ?? '');
    $ultimo_digito_anio = trim($_POST['ultimo_digito_anio'] ?? '');
    $numeracion_progresiva = trim($_POST['numeracion_progresiva'] ?? '');

    // Si el ID de pedimento es válido
    if ($idpedimento > 0) {

        // Construir la consulta de actualización
        $queryUpdate = "UPDATE dpedimento 
                        SET Nopedimento = '$Nopedimento', 
                            Toper = '$Toper', 
                            idapendice2 = $idapendice2, 
                            idapendice16 = $idapendice16, 
                            idpedimentoc = $idpedimentoc, 
                            anio_validacion = '$anio_validacion', 
                            clave_aduana = '$clave_aduana', 
                            patente = '$patente', 
                            ultimo_digito_anio = '$ultimo_digito_anio', 
                            numeracion_progresiva = '$numeracion_progresiva'
                        WHERE idpedimento = $idpedimento";

        // Ejecutar la consulta
        if ($conexion->query($queryUpdate) === TRUE) {
            // Redirigir después de la actualización exitosa
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit(); // Terminar el script después de la redirección
        } else {
            echo "Error al actualizar el registro: " . $conexion->error;
        }
    }
}
