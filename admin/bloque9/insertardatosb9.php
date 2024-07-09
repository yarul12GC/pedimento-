<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$entrada = $_POST['entrada'];
$pago = $_POST['pago'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO fechas (entrada,
 pago,
  idpedimentoc)
  VALUES ('$entrada',
  '$pago',
  '$idpedimentoc')";

  if($conexion->query($sql) === TRUE){
    $last_idb9 = $conexion->insert_id;
    $_SESSION['bloques']['bloque9']= $last_idb9;

    header("location: ../capturapediemnto.php");
    exit();
  } else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
  }
  $conexion->close();