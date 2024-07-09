<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$Vseguros = $_POST['Vseguros'];
$seguros = $_POST['seguros'];
$fletes = $_POST['fletes'];
$embalajes = $_POST['embalajes'];
$otrosincrement = $_POST['otrosincrement'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO valorincrementable (Vseguros,
 seguros,
  fletes, 
  embalajes, 
  otrosincrement, 
  idpedimentoc)
  VALUES ('$Vseguros',
  '$seguros',
  '$fletes', 
  '$embalajes', 
  '$otrosincrement', 
  '$idpedimentoc')";

  if($conexion->query($sql) === TRUE){
    $last_idb6 = $conexion->insert_id;
    $_SESSION['bloques']['bloque6']= $last_idb6;

    header("location: ../capturapediemnto.php");
    exit();
  } else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
  }
  $conexion->close();