<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$efectivo = $_POST['efectivo'];
$otros = $_POST['otros'];
$total = $_POST['total'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO total (efectivo, otros, total, idpedimentoc) 
        VALUES ('$efectivo', '$otros', '$total', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb12 = $conexion->insert_id;
    if (!isset($_SESSION['bloques']['bloque12'])) {
        $_SESSION['bloques']['bloque12'] = [];
    }
    $_SESSION['bloques']['bloque12'][] = $last_idb12;

    header("location: ../capturapediemnto.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
$conexion->close();
?>
