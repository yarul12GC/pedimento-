<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

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

    header("location: ../capturapediemnto.php");
    exit();
} else {
    echo "Error:" . $sql . "<br>" . $conexion->error;
}
$conexion->close();
