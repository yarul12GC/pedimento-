<?php
include_once '../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idproveedor = $_POST['idproveedor'];
    $idfiscal = $_POST['idfiscal'];
    $nombreDORS = $_POST['nombreDORS'];
    $calle = $_POST['calle'];
    $noexterior = $_POST['noexterior'];
    $nointerior = $_POST['nointerior'];
    $codigo_postal = $_POST['codigo_postal'];
    $localidad = $_POST['localidad'];
    $entidadF = $_POST['entidadF'];
    $pais = $_POST['pais'];
    $vinculacion = $_POST['vinculacion'];
    $idpedimentoc = $_POST['idpedimentoc'];

    $query = "
        UPDATE provedorocomprador 
        SET
            tipopoc = ?,
            idfiscal = ?,
            nombreDORS = ?,
            calle = ?,
            noexterior = ?,
            nointerior = ?,
            codigo_postal = ?,
            localidad = ?,
            entidadF = ?,
            pais = ?,
            vinculacion = ?,
            idpedimentoc = ?
        WHERE idproveedor = ?
    ";

    if ($stmt = $conexion->prepare($query)) {
        $stmt->bind_param(
            "sssssssssssii",
            $tipopoc,
            $idfiscal,
            $nombreDORS,
            $calle,
            $noexterior,
            $nointerior,
            $codigo_postal,
            $localidad,
            $entidadF,
            $pais,
            $vinculacion,
            $idpedimentoc,
            $idproveedor
        );

        if ($stmt->execute()) {
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
            exit;
        } else {
            echo "Error al actualizar los datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Solicitud no válida.";
}
