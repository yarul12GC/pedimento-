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

  if($conexion->query($sql) === TRUE){
    $last_idb5 = $conexion->insert_id;
    $_SESSION['bloques']['bloque5']= $last_idb5;

    header("location: ../capturapediemnto.php");
    exit();
  } else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
  }
  $conexion->close();