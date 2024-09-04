<?php
include('../../conexion.php');

// Verificar si el formulario fue enviado correctamente
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger y validar los datos enviados por el formulario
    $idtransacciones = intval($_POST['id'] ?? 0);
    $idapendice15 = intval($_POST['idapendice15'] ?? null);
    $tipoCambio = trim($_POST['tipoCambio'] ?? '');
    $peso_bruto = trim($_POST['peso_bruto'] ?? '');
    $idapendice1 = intval($_POST['idapendice1'] ?? null);
    $concatenatedData = intval($_POST['concatenatedData'] ?? null);
    $idpedimentoc = intval($_POST['idpedimentoc'] ?? 0);

    // Si el ID de la transacción y el ID del pedimento son válidos
    if ($idtransacciones > 0 && $idpedimentoc > 0) {

        // Preparar y ejecutar la consulta de actualización
        $queryUpdate = "UPDATE transacciones 
                        SET idapendice15 = ?, tipoCambio = ?, peso_bruto = ?, idapendice1 = ?, concatenatedData = ?
                        WHERE idtransacciones = ? AND idpedimentoc = ?";
        $stmtUpdate = $conexion->prepare($queryUpdate);

        if ($stmtUpdate) {
            $stmtUpdate->bind_param("issiiii", $idapendice15, $tipoCambio, $peso_bruto, $idapendice1, $concatenatedData, $idtransacciones, $idpedimentoc);
            $stmtUpdate->execute();
            $stmtUpdate->close();
        }

        // Redirigir siempre después del intento de actualización
        header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
        exit(); // Terminar el script después de la redirección
    }

}
