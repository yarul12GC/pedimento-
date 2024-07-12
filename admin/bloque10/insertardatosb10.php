<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$idapendice12 = $_POST['idapendice12'];
$idapendice18 = $_POST['idapendice18'];
$tasa = $_POST['tasa'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO tasapedimento (idapendice12, idapendice18, tasa, idpedimentoc) 
        VALUES ('$idapendice12', '$idapendice18', '$tasa', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb10 = $conexion->insert_id;
    if (!isset($_SESSION['bloques']['bloque10'])) {
        $_SESSION['bloques']['bloque10'] = [];
    }
    $_SESSION['bloques']['bloque10'][] = $last_idb10;

    header("location: ../capturapediemnto.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}
$conexion->close();
?>
