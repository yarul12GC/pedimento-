<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

$tipoCambioMXN = floatval($_POST['tipoCambioMXN']);

$Vseguros = floatval($_POST['Vseguros']) * $tipoCambioMXN;
$seguros = floatval($_POST['seguros']) * $tipoCambioMXN;
$fletes = floatval($_POST['fletes']) * $tipoCambioMXN;
$embalajes = floatval($_POST['embalajes']) * $tipoCambioMXN;
$otrosincrement = floatval($_POST['otrosincrement']) * $tipoCambioMXN;
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO valorincrementable (Vseguros, seguros, fletes, embalajes, otrosincrement, idpedimentoc)
        VALUES ('$Vseguros', '$seguros', '$fletes', '$embalajes', '$otrosincrement', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
  $last_idb6 = $conexion->insert_id;
  $_SESSION['bloques']['bloque6'] = $last_idb6;

  header("location: ../capturapediemnto.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
