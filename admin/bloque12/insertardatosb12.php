<?php
include_once '../../conexion.php';
include_once '../sesion.php';

$efectivo = $_POST['efectivo'];
$otros = $_POST['otros'];
$total = $_POST['total'];
$idpedimentoc = $_POST['idpedimentoc'];


$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO total (efectivo, otros, total, idpedimentoc) 
        VALUES ('$efectivo', '$otros', '$total', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb12 = $conexion->insert_id;
    if (!isset($_SESSION['bloques']['bloque12'])) {
        $_SESSION['bloques']['bloque12'] = [];
    }
    $_SESSION['bloques']['total'] = $total;

    $_SESSION['bloques']['bloque12'][] = $last_idb12;

    if ($sameSession) {
        // Si es la misma sesión, redirige a la página de captura en curso
        header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
    } else {
        // Si es una nueva sesión, redirige a la página de continuación de captura
        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
    }
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
$conexion->close();
