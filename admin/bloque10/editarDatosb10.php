<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos enviados desde el formulario
    $idpedimentocArray = $_POST['idpedimentoc'];
    $idtasapArray = $_POST['idtasap'];
    $idapendice12Array = $_POST['idapendice12'];
    $idapendice18Array = $_POST['idapendice18'];
    $tasaArray = $_POST['tasa'];
    if (
        count($idpedimentocArray) === count($idtasapArray) &&
        count($idapendice12Array) === count($idapendice18Array) &&
        count($idapendice12Array) === count($tasaArray)
    ) {

        foreach ($idtasapArray as $index => $idtasap) {
            $idpedimentoc = $idpedimentocArray[$index];
            $idapendice12 = $idapendice12Array[$index];
            $idapendice18 = $idapendice18Array[$index];
            $tasa = $tasaArray[$index];

            $stmt = $conexion->prepare("
                UPDATE tasapedimento 
                SET idapendice12 = ?, idapendice18 = ?, tasa = ? 
                WHERE idtasap = ? AND idpedimentoc = ?
            ");
            if ($stmt) {
                $stmt->bind_param("iisii", $idapendice12, $idapendice18, $tasa, $idtasap, $idpedimentoc);

                if ($stmt->execute()) {
                    header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
                } else {
                    echo "Error al actualizar el registro: $idtasap - " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error al preparar la consulta: " . $conexion->error;
            }
        }
    } else {
        echo "Las longitudes de las arrays no coinciden.";
    }

    $conexion->close();
}
