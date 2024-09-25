<?php
include_once '../../conexion.php';
include_once '../sesion.php';

$tipopoc = $_POST['tipopoc'];
$idfiscal = $_POST['idfiscal'];
$nombreDORS = $_POST['nombreDORS'];
$calle = $_POST['calle'];
$noexterior = $_POST['noexterior'];
$nointerior = $_POST['nointerior'];
$codigo_postal = $_POST['codigo_postal'];
$localidad = $_POST['localidad'];
$entidadF = $_POST['entidadF'];
$pais = $_POST['pais'];
$vinculacion = $_POST['vinculacion'];
$idpedimentoc = $_POST['idpedimentoc'];

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO provedorocomprador (tipopoc,
 idfiscal,
 nombreDORS,
 calle,
 noexterior,
 nointerior,
 codigo_postal,
 localidad,
 entidadF,
 pais,
 vinculacion,
  idpedimentoc)
  VALUES ('$tipopoc',
  '$idfiscal',
  '$nombreDORS',
 '$calle',
 '$noexterior',
 '$nointerior',
 '$codigo_postal',
 '$localidad',
 '$entidadF',
 '$pais',
 '$vinculacion',
  '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_idb14 = $conexion->insert_id;


    $_SESSION['bloques']['bloque14'] = $last_idb14;

    if ($sameSession) {
        // Si es la misma sesión, redirige a la página de captura en curso
        header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
    } else {
        // Si es una nueva sesión, redirige a la página de continuación de captura
        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
    }
    exit();
} else {
    echo "Error:" . $sql . "<br>" . $conexion->error;
}
$conexion->close();
