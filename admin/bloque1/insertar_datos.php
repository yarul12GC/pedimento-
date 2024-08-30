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

// Verificar si la sesión está iniciada y la variable de sesión existe
$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;

// Usar declaraciones preparadas para evitar inyección SQL
$stmt = $conexion->prepare("
    INSERT INTO dpedimento (Nopedimento, Toper, idapendice2, idapendice16, idpedimentoc, anio_validacion, clave_aduana, patente, ultimo_digito_anio, numeracion_progresiva) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");
$stmt->bind_param("sssiiissss", $Nopedimento, $Toper, $idapendice2, $idapendice16, $idpedimentoc, $anio_validacion, $clave_aduana, $PATENTE, $ultimo_digito_anio, $numeracion_progresiva);

if ($stmt->execute()) {
    $last_idb1 = $conexion->insert_id;

    $_SESSION['bloques']['PATENTE'] = $PATENTE;
    $_SESSION['bloques']['ultimo_digito_anio'] = $ultimo_digito_anio;
    $_SESSION['bloques']['numeracion_progresiva'] = $numeracion_progresiva;

    // Concatenar ultimo_digito_anio y numeracion_progresiva
    $pedimento_completo = $ultimo_digito_anio . $numeracion_progresiva;
    $_SESSION['bloques']['pedimento_completo'] = $pedimento_completo;

    $_SESSION['bloques']['bloque1'] = $last_idb1;

    if ($sameSession) {
        // Si es la misma sesión, redirige a la página de captura en curso
        header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
    } else {
        // Si es una nueva sesión, redirige a la página de continuación de captura
        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
    }
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
