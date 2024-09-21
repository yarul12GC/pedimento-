<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$aviso_electronico = $_POST['aviso_electronico'];
$idapendice1 = $_POST['idapendice1'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$nBultos = $_POST['nBultos'];
$idpedimentoc = $_POST['idpedimentoc'];

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO permisos (aviso_electronico,
 idapendice1,
  marca, 
  modelo, 
  nBultos, 
  idpedimentoc)
  VALUES ('$aviso_electronico',
  '$idapendice1',
  '$marca', 
  '$modelo', 
  '$nBultos', 
  '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
  $last_idb8 = $conexion->insert_id;
  $_SESSION['bloques']['bloque8'] = $last_idb8;

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
