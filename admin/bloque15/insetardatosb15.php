<?php
include_once '../sesion.php';
include_once '../../conexion.php';

$numfactura = $_POST['numfactura'];
$fecha = $_POST['fecha'];
$idapendice14 = $_POST['idapendice14'];
$idapendice5 = $_POST['idapendice5'];
$valmonfact = $_POST['valmonfact'];
$factormonfact = $_POST['factormonfact'];
$valdolares = $_POST['valdolares'];
$idpedimentoc = $_POST['idpedimentoc'];

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO dmonetarios(numfactura, fecha, idapendice14, idapendice5, valmonfact, factormonfact, valdolares, idpedimentoc) 
VALUES ('$numfactura', '$fecha', '$idapendice14', '$idapendice5', '$valmonfact', '$factormonfact', '$valdolares', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb15 = $conexion->insert_id;

    $_SESSION['bloques']['bloque15'] = $last_idb15;

    if ($sameSession) {
        
        header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
    } else {

        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
    }
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
