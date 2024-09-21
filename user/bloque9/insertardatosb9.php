<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$entrada = $_POST['entrada'];
$pago = $_POST['pago'];
$idpedimentoc = $_POST['idpedimentoc'];


$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;

$sql = "INSERT INTO fechas (entrada,
 pago,
  idpedimentoc)
  VALUES ('$entrada',
  '$pago',
  '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
  $last_idb9 = $conexion->insert_id;

  $_SESSION['bloques']['pago'] = $pago;

  $_SESSION['bloques']['bloque9'] = $last_idb9;
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
