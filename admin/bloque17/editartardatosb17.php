<?php
include('../../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idpedimentoc = isset($_POST['idpedimentoc']) ? $_POST['idpedimentoc'] : [];
    $idcomplementos = isset($_POST['idcomplemento']) ? $_POST['idcomplemento'] : [];
    $idapendice8 = isset($_POST['idapendice8']) ? $_POST['idapendice8'] : [];
    $complementos = isset($_POST['complemento']) ? $_POST['complemento'] : [];
    $complemento2s = isset($_POST['complemento2']) ? $_POST['complemento2'] : [];
    $complemento3s = isset($_POST['complemento3']) ? $_POST['complemento3'] : [];

    $count = count($idcomplementos);
    if ($count != count($idapendice8) || $count != count($complementos) || $count != count($complemento2s) || $count != count($complemento3s) || $count != count($idpedimentoc)) {
        die("Los datos del formulario no coinciden.");
    }

    $conexion->begin_transaction();

    try {
        $queryUpdate = "
            UPDATE complementos
            SET idapendice8 = ?, complemento = ?, Complemento2 = ?, Complemento3 = ?
            WHERE idcomplemento = ? AND idpedimentoc = ?
        ";

        $stmtUpdate = $conexion->prepare($queryUpdate);

        foreach ($idcomplementos as $index => $idcomplemento) {
            if (isset($idapendice8[$index], $complementos[$index], $complemento2s[$index], $complemento3s[$index], $idpedimentoc[$index])) {
                $apendice8 = $idapendice8[$index];
                $complemento = $complementos[$index];
                $complemento2 = $complemento2s[$index];
                $complemento3 = $complemento3s[$index];
                $pedimentoc = $idpedimentoc[$index];

                $stmtUpdate->bind_param("ssssii", $apendice8, $complemento, $complemento2, $complemento3, $idcomplemento, $pedimentoc);
                $stmtUpdate->execute();
            }
        }

        $conexion->commit();
        header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc[0]);
    } catch (Exception $e) {
        $conexion->rollback();
        echo "Error al actualizar los datos: " . $e->getMessage();
    }

    $conexion->close();
} else {
    echo "Método de solicitud no permitido.";
}
