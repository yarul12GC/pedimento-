<?php
include_once '../sesion.php';
include_once '../../conexion.php';

$Nopedimento = $_POST['Nopedimento'];
$Toper = $_POST['Toper'];
$idapendice2 = $_POST['idapendice2'];
$idapendice16 = $_POST['idapendice16'];
$idpedimentoc = $_POST['idpedimentoc'];

$anio_validacion = $_POST['anio_validacion'];
$clave_aduana = $_POST['clave_aduana'];
$PATENTE = $_POST['PATENTE'];
$ultimo_digito_anio = $_POST['ultimo_digito_anio'];
$numeracion_progresiva = $_POST['numeracion_progresiva'];

$sql = "INSERT INTO dpedimento (Nopedimento, Toper, idapendice2, idapendice16, idpedimentoc, anio_validacion, clave_aduana, patente, ultimo_digito_anio, numeracion_progresiva) VALUES ('$Nopedimento', '$Toper', '$idapendice2', '$idapendice16', '$idpedimentoc', '$anio_validacion', '$clave_aduana', '$PATENTE', '$ultimo_digito_anio', '$numeracion_progresiva')";

if ($conexion->query($sql) === TRUE) {
    $last_idb1 = $conexion->insert_id;

    $_SESSION['bloques']['PATENTE'] = $PATENTE;
    $_SESSION['bloques']['ultimo_digito_anio'] = $ultimo_digito_anio;
    $_SESSION['bloques']['numeracion_progresiva'] = $numeracion_progresiva;

    // Concatenar ultimo_digito_anio y numeracion_progresiva
    $pedimento_completo = $ultimo_digito_anio . $numeracion_progresiva;
    $_SESSION['bloques']['pedimento_completo'] = $pedimento_completo;

    $_SESSION['bloques']['bloque1'] = $last_idb1;

    header("Location: ../capturapediemnto.php?id=$last_idb1");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
