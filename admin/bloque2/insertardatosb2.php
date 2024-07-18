<?php
include_once '../sesion.php';
include_once '../../conexion.php';

$idapendice15 = $_POST['idapendice15'];
$tipocambio = $_POST['tipoCambio'];
$pesobruto = $_POST['peso_bruto'];
$idapendice1 = $_POST['idapendice1'];
$idpedimentoc = $_POST['idpedimentoc'];
$concatenatedData = $_POST['concatenatedData']; 
$_SESSION['bloques']['idapendice1'] = $concatenatedData;

$sql = "INSERT INTO transacciones(idapendice15, tipoCambio, peso_bruto, idapendice1, idpedimentoc, concatenatedData) 
VALUES ('$idapendice15', '$tipocambio', '$pesobruto', '$idapendice1', '$idpedimentoc', '$concatenatedData')";

if ($conexion->query($sql) === TRUE) {
    $last_idb2 = $conexion->insert_id;

    $_SESSION['bloques']['bloque2'] = $last_idb2;

    header("location: ../capturapediemnto.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
