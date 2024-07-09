<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$aviso_electronico = $_POST['aviso_electronico'];
$idapendice1 = $_POST['idapendice1'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$nBultos = $_POST['nBultos'];
$idpedimentoc = $_POST['idpedimentoc'];

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

  if($conexion->query($sql) === TRUE){
    $last_idb8 = $conexion->insert_id;
    $_SESSION['bloques']['bloque8']= $last_idb8;

    header("location: ../capturapediemnto.php");
    exit();
  } else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
  }
  $conexion->close();