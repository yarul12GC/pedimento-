<?php
include_once '../../conexion.php';
include_once '../sesion.php';
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$patente = $conexion->real_escape_string($_POST['patente']);
$pedimento = $conexion->real_escape_string($_POST['pedimento']);
$aduana = $conexion->real_escape_string($_POST['aduana']);
$banco = $conexion->real_escape_string($_POST['banco']);
$importePago = $conexion->real_escape_string($_POST['importePago']);
$fechapago = $conexion->real_escape_string($_POST['fechapago']);
$mPresentacion = $conexion->real_escape_string($_POST['mPresentacion']);
$MedioRecepcion = $conexion->real_escape_string($_POST['MedioRecepcion']);
$idpedimentoc = $conexion->real_escape_string($_POST['idpedimentoc']);

$lineaC = isset($_POST['lineaC']) ? $conexion->real_escape_string($_POST['lineaC']) : '';
$noperacionbancar = isset($_POST['noperacionbancar']) ? $conexion->real_escape_string($_POST['noperacionbancar']) : '';
$ntransaccionS = isset($_POST['ntransaccionS']) ? $conexion->real_escape_string($_POST['ntransaccionS']) : '';

$sql = "INSERT INTO pagoelectronicoQR (
    patente,
    pedimento, 
    aduana,
    banco,
    lineaC,
    importePago,
    fechapago,
    noperacionbancar,
    ntransaccionS,
    mPresentacion,
    MedioRecepcion,
    idpedimentoc
) VALUES (
    '$patente',
    '$pedimento', 
    '$aduana',
    '$banco',
    '$lineaC',
    '$importePago',
    '$fechapago',
    '$noperacionbancar',
    '$ntransaccionS',
    '$mPresentacion',
    '$MedioRecepcion',
    '$idpedimentoc'
)";

if ($conexion->query($sql) === TRUE) {
    $last_idb13 = $conexion->insert_id;

    // Generar los datos para el código QR
    $barcodeData = "La información contenida en este código QR es únicamente para fines de práctica. CENCA Comercio Exterior. Línea de captura: $lineaC | Importe de pago: $importePago | Banco: $banco | Fecha de pago: $fechapago | No. de operación bancaria: $noperacionbancar | No. de transacción SAT: $ntransaccionS";

    // Generar código QR utilizando endroid/qr-code
    $qrCode = QrCode::create($barcodeData)
        ->setSize(300)
        ->setMargin(10);

    $writer = new PngWriter();
    $result = $writer->write($qrCode);

    // Guardar la imagen del código de barras en un archivo
    $barcodeFile = 'qrs/barcode_' . $last_idb13 . '.png';
    $result->saveToFile($barcodeFile);

    // Guardar la ruta del archivo en la base de datos
    $barcodeEscaped = $conexion->real_escape_string($barcodeFile);
    $updateSql = "UPDATE pagoelectronicoQR SET barcode_image='$barcodeEscaped' WHERE idpago = $last_idb13";

    if ($conexion->query($updateSql) === TRUE) {
        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc) . "&barcode=" . urlencode($barcodeFileName));
        exit();
    } else {
        echo "Error actualizando la imagen del código de barras: " . $conexion->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
