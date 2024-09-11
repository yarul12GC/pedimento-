<?php
include('../../conexion.php');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$idapendice12Array = $_POST['idapendice12'];
$tasaArray = $_POST['tasa'];
$idapendice18Array = $_POST['idapendice18'];
$idapendice13Array = $_POST['idapendice13'];
$importeArray = $_POST['importe'];
$idpedimentocArray = $_POST['idpedimentoc'];
$section_idArray = $_POST['section_id'];
$idcontribucionesArray = $_POST['idcontribuciones'];

$conexion->begin_transaction();

try {
    $stmt = $conexion->prepare("
        UPDATE contribuciones SET 
            idapendice12 = ?, 
            tasa = ?, 
            idapendice18 = ?, 
            idapendice13 = ?, 
            importe = ?
        WHERE 
            idpedimentoc = ? AND 
            section_id = ? AND 
            idcontribuciones = ?
    ");

    if (!$stmt) {
        throw new Exception("Error en la preparación de la consulta: " . $conexion->error);
    }

    for ($i = 0; $i < count($idapendice12Array); $i++) {
        $idapendice12 = $idapendice12Array[$i];
        $tasa = $tasaArray[$i];
        $idapendice18 = $idapendice18Array[$i];
        $idapendice13 = $idapendice13Array[$i];
        $importe = $importeArray[$i];
        $idpedimentoc = $idpedimentocArray[$i];
        $section_id = $section_idArray[$i];
        $idcontribuciones = $idcontribucionesArray[$i];

        if (!$stmt->bind_param(
            'ssssssss',
            $idapendice12,
            $tasa,
            $idapendice18,
            $idapendice13,
            $importe,
            $idpedimentoc,
            $section_id,
            $idcontribuciones
        )) {
            throw new Exception("Error al enlazar los parámetros: " . $stmt->error);
        }

        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    }

    $conexion->commit();
    header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
    exit();
} catch (Exception $e) {
    $conexion->rollback();
    echo "Error al actualizar los datos: " . $e->getMessage();
}

$stmt->close();
$conexion->close();
