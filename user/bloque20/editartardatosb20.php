<?php
include('../../conexion.php');

// Verificar que se recibieron los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fraccionA = htmlspecialchars($_POST['fraccionA']);
    $nico = htmlspecialchars($_POST['nico']);
    $vinc = htmlspecialchars($_POST['vinc']);
    $idapendice11 = htmlspecialchars($_POST['idapendice11']);
    $umc = htmlspecialchars($_POST['umc']);
    $cantumc = htmlspecialchars($_POST['cantumc']);
    $umt = htmlspecialchars($_POST['umt']);
    $cant = htmlspecialchars($_POST['cant']);
    $idapendice4 = htmlspecialchars($_POST['idapendice4']);
    $pod = htmlspecialchars($_POST['pod']);
    $idpedimentoc = htmlspecialchars($_POST['idpedimentoc']);
    $section_id = htmlspecialchars($_POST['section_id']);
    $idpartida1 = htmlspecialchars($_POST['idpartida1']);

    // Actualizar la base de datos
    $sql = "UPDATE partida1 SET 
                fraccionA = ?, 
                nico = ?, 
                vinc = ?, 
                idapendice11 = ?, 
                umc = ?, 
                cantumc = ?, 
                umt = ?, 
                cant = ?, 
                idapendice4 = ?, 
                pod = ? 
            WHERE idpedimentoc = ? AND section_id = ? AND idpartida1 = ?";

    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("sssssssssssss", $fraccionA, $nico, $vinc, $idapendice11, $umc, $cantumc, $umt, $cant, $idapendice4, $pod, $idpedimentoc, $section_id, $idpartida1);

        if ($stmt->execute()) {
            header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
        } else {
            echo "Error al actualizar los datos: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }

    $conexion->close();
}
