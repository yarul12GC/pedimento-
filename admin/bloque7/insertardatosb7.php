<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$VsegurosD = $_POST['VsegurosD'];
$segurosD = $_POST['segurosD'];
$fletesD = $_POST['fletesD'];
$embalajesD = $_POST['embalajesD'];
$otrosDecrement = $_POST['otrosDecrement'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO valordecrementable (VsegurosD,
 segurosD,
  fletesD, 
  embalajesD, 
  otrosDecrement, 
  idpedimentoc)
  VALUES ('$VsegurosD',
  '$segurosD',
  '$fletesD', 
  '$embalajesD', 
  '$otrosDecrement', 
  '$idpedimentoc')";

  if($conexion->query($sql) === TRUE){
    $last_idb7 = $conexion->insert_id;
    $_SESSION['bloques']['bloque7']= $last_idb7;

    header("location: ../capturapediemnto.php");
    exit();
  } else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
  }
  $conexion->close();