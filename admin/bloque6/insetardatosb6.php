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

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$sql = "INSERT INTO valorincrementable (Vseguros, seguros, fletes, embalajes, otrosincrement, idpedimentoc)
        VALUES ('$Vseguros', '$seguros', '$fletes', '$embalajes', '$otrosincrement', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
  $last_idb6 = $conexion->insert_id;
  $_SESSION['bloques']['bloque6'] = $last_idb6;

  if ($sameSession) {
    // Si es la misma sesión, redirige a la página de captura en curso
    header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
  } else {
    // Si es una nueva sesión, redirige a la página de continuación de captura
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
  }
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
