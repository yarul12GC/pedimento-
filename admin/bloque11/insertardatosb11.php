<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$idapendice12Array = $_POST['idapendice12'];
$idapendice13Array = $_POST['idapendice13'];
$importeArray = $_POST['importe'];
$idpedimentoc = $_POST['idpedimentoc'];

foreach ($idapendice12Array as $index => $idapendice12) {
    $idapendice13 = $idapendice13Array[$index];
    $importe = $importeArray[$index];

    $sql = "INSERT INTO cuadrodeliquidacion (idapendice12, idapendice13, importe, idpedimentoc) 
            VALUES ('$idapendice12', '$idapendice13', '$importe', '$idpedimentoc')";

    if ($conexion->query($sql) === TRUE) {
        $last_idb11 = $conexion->insert_id;
        if (!isset($_SESSION['bloques']['bloque11'])) {
            $_SESSION['bloques']['bloque11'] = [];
        }
        $_SESSION['bloques']['bloque11'][] = $last_idb11;
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

header("location: ../capturapediemnto.php");
exit();

