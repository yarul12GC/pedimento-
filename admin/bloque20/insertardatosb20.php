<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$fraccionA = $_POST['fraccionA'];
$nico = $_POST['nico'];
$vinc = $_POST['vinc'];
$metval = $_POST['metval'];
$umc = $_POST['umc'];
$cantumc = $_POST['cantumc'];
$umt = $_POST['umt'];
$cant = $_POST['cant'];
$idapendice4 = $_POST['idapendice4'];
$pod = $_POST['pod'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO partida1 (
    fraccionA,
    nico,
    vinc,
    metval,
    umc,
    cantumc,
    umt,
    cant,
    idapendice4,
    pod,
    idpedimentoc
) VALUES (
    '$fraccionA',
    '$nico',
    '$vinc',
    '$metval',
    '$umc',
    '$cantumc',
    '$umt',
    '$cant',
    '$idapendice4',
    '$pod',
    '$idpedimentoc'
)";

if ($conexion->query($sql) === TRUE) {
    $last_idb20 = $conexion->insert_id;

    if (!isset($_SESSION['bloques'])) {
        $_SESSION['bloques'] = array();
    }

    $_SESSION['bloques'][] = $last_idb20;

    header("location: ../capturapediemnto.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
