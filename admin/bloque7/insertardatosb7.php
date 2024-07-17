<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$tipoCambioMXN = floatval($_POST['tipoCambioMXN']);

$VsegurosD = floatval($_POST['VsegurosD']) * $tipoCambioMXN;
$segurosD = floatval($_POST['segurosD']) * $tipoCambioMXN;
$fletesD = floatval($_POST['fletesD']) * $tipoCambioMXN;
$embalajesD = floatval($_POST['embalajesD']) * $tipoCambioMXN;
$otrosDecrement = floatval($_POST['otrosDecrement']) * $tipoCambioMXN;
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO valordecrementable (VsegurosD, segurosD, fletesD, embalajesD, otrosDecrement, idpedimentoc)
        VALUES ('$VsegurosD', '$segurosD', '$fletesD', '$embalajesD', '$otrosDecrement', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb7 = $conexion->insert_id;
    $_SESSION['bloques']['bloque7'] = $last_idb7;

    header("location: ../capturapediemnto.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
