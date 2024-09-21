<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

// Convertimos los valores recibidos a números, pero sin aplicar ningún tipo de redondeo
$tipoCambioMXN = floatval(str_replace(',', '.', $_POST['tipoCambioMXN']));
$Vseguros = floatval($_POST['Vseguros']) * $tipoCambioMXN;
$seguros = floatval($_POST['seguros']) * $tipoCambioMXN;
$fletes = floatval($_POST['fletes']) * $tipoCambioMXN;
$embalajes = floatval($_POST['embalajes']) * $tipoCambioMXN;
$otrosincrement = floatval($_POST['otrosincrement']) * $tipoCambioMXN;
$idpedimentoc = $_POST['idpedimentoc'];

// Verificamos si la sesión es la misma que el pedimento actual
$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;

// Preparamos la consulta SQL para insertar los datos
$sql = "INSERT INTO valorincrementable (Vseguros, tipoCambioMXN, seguros, fletes, embalajes, otrosincrement, idpedimentoc)
        VALUES ($Vseguros, $tipoCambioMXN, $seguros, $fletes, $embalajes, $otrosincrement, '$idpedimentoc')";

// Ejecutamos la consulta e insertamos los datos en la base de datos
if ($conexion->query($sql) === TRUE) {
  // Obtenemos el ID del último registro insertado
  $last_idb6 = $conexion->insert_id;
  $_SESSION['bloques']['bloque6'] = $last_idb6;

  // Redirigimos dependiendo de si la sesión es la misma o no
  if ($sameSession) {
    // Si es la misma sesión, redirigimos a la página de captura en curso
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
  } else {
    // Si es una nueva sesión, redirigimos a la página de continuación de captura
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
  }
  exit();
} else {
  // En caso de error en la consulta, mostramos el error
  echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerramos la conexión a la base de datos
$conexion->close();
