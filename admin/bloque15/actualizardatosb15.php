<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iddmonetarios = $_POST['iddmonetarios'];
    $numfactura = $_POST['numfactura'];
    $fecha = $_POST['fecha'];
    $idapendice14 = $_POST['idapendice14'];
    $idapendice5 = $_POST['idapendice5'];
    $valmonfact = $_POST['valmonfact'];
    $factormonfact = $_POST['factormonfact'];
    $valdolares = $_POST['valdolares'];
    $idpedimentoc = $_POST['idpedimentoc'];

    $query = "
        UPDATE dmonetarios 
        SET 
            numfactura = ?, 
            fecha = ?, 
            idapendice14 = ?, 
            idapendice5 = ?, 
            valmonfact = ?, 
            factormonfact = ?, 
            valdolares = ?, 
            idpedimentoc = ? 
        WHERE iddmonetarios = ?
    ";

    if ($stmt = $conexion->prepare($query)) {
        $stmt->bind_param("ssiisssii", $numfactura, $fecha, $idapendice14, $idapendice5, $valmonfact, $factormonfact, $valdolares, $idpedimentoc, $iddmonetarios);

        if ($stmt->execute()) {
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    $conexion->close();
}
