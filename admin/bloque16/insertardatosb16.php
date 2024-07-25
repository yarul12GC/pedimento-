<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$numeroembarque = $_POST['numeroembarque'];
$nconocimiento = $_POST['nconocimiento'];
$nhouse = $_POST['nhouse'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO dembarque (numeroembarque,
 nconocimiento,
  nhouse, 
  idpedimentoc)
  VALUES ('$numeroembarque',
  '$nconocimiento',
  '$nhouse',  
  '$idpedimentoc')";

  if($conexion->query($sql) === TRUE){
    $last_idb16 = $conexion->insert_id;
    $_SESSION['bloques']['bloque16']= $last_idb16;

    header("location: ../capturapediemnto.php");
    exit();
  } else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
  }
  $conexion->close();