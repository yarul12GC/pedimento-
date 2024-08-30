<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$tipoIE = $_POST['tipoIE'];
$nombreE = $_POST['nombreE'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$Calle = $_POST['Calle'];
$numeroInterior = $_POST['numeroInterior'];
$numeroExterior = $_POST['numeroExterior'];
$codigoPostal = $_POST['codigoPostal'];
$municipio = $_POST['municipio'];
$entidadfederativa = $_POST['entidadfederativa'];
$pais = $_POST['pais'];
$idpedimentoc = $_POST['idpedimentoc'];

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO importadorexportador (tipoIE,
 nombreE,
  curp, 
  rfc, 
  Calle, 
  numeroInterior, 
  numeroExterior, 
  codigoPostal,
  municipio,
  entidadfederativa,
  pais,
  idpedimentoc)
  VALUES ('$tipoIE',
  '$nombreE',
  '$curp', 
  '$rfc', 
  '$Calle', 
  '$numeroInterior', 
  '$numeroExterior', 
  '$codigoPostal',
  '$municipio',
  '$entidadfederativa',
  '$pais',
  '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
  $last_idb5 = $conexion->insert_id;
  $_SESSION['bloques']['bloque5'] = $last_idb5;
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
