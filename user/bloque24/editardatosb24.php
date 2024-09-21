<?php
include('../../conexion.php');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Recoger datos del formulario
$idapendice8Array = $_POST['idapendice8'];
$complementoArray = $_POST['complemento'];
$complemento2Array = $_POST['complemento2'];
$complemento3Array = $_POST['complemento3'];
$idpedimentocArray = $_POST['idpedimentoc'];
$section_idArray = $_POST['section_id'];
$idcomplementopArray = $_POST['idcomplementop'];

// Comenzar la transacción
$conexion->begin_transaction();

try {
    // Preparar la consulta de actualización
    $stmt = $conexion->prepare("
        UPDATE complementosp SET 
            idapendice8 = ?, 
            complemento1 = ?, 
            complemento2 = ?, 
            complemento3 = ? 
        WHERE 
            idpedimentoc = ? AND 
            section_id = ? AND 
            idcomplementop = ?
    ");

    for ($i = 0; $i < count($idapendice8Array); $i++) {
        $idapendice8 = $idapendice8Array[$i];
        $complemento = $complementoArray[$i];
        $complemento2 = $complemento2Array[$i];
        $complemento3 = $complemento3Array[$i];
        $idpedimentoc = $idpedimentocArray[$i];
        $section_id = $section_idArray[$i];
        $idcomplementop = $idcomplementopArray[$i];

        // Bind parameters and execute the query
        $stmt->bind_param(
            'sssssss',
            $idapendice8,
            $complemento,
            $complemento2,
            $complemento3,
            $idpedimentoc,
            $section_id,
            $idcomplementop
        );
        $stmt->execute();
    }

    // Confirmar la transacción
    $conexion->commit();
    header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
} catch (Exception $e) {
    // Revertir en caso de error
    $conexion->rollback();
    echo "Error al actualizar los datos: " . $e->getMessage();
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
