<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$numeroembarque = $_POST['numeroembarque'];
$nconocimiento = $_POST['nconocimiento'];
$nhouse = $_POST['nhouse'];
$idpedimentoc = $_POST['idpedimentoc'];


$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO dembarque (numeroembarque,
 nconocimiento,
  nhouse, 
  idpedimentoc)
  VALUES ('$numeroembarque',
  '$nconocimiento',
  '$nhouse',  
  '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
  $last_idb16 = $conexion->insert_id;
  $_SESSION['bloques']['bloque16'] = $last_idb16;

  if ($sameSession) {
    // Si es la misma sesión, redirige a la página de captura en curso
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
  } else {
    // Si es una nueva sesión, redirige a la página de continuación de captura
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
  }
  exit();
} else {
  echo "Error:" . $sql . "<br>" . $conexion->error;
}
$conexion->close();
