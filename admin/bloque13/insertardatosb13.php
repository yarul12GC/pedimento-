<?php
include_once '../../conexion.php';
include_once '../../sesion.php';
require 'vendor/autoload.php'; 

use Picqer\Barcode\BarcodeGeneratorPNG;

function generarCadenaAlfanumerica($longitud) {
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $cadena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $cadena .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $cadena;
}

function generarNumeroAleatorio($longitud) {
    $numero = '';
    for ($i = 0; $i < $longitud; $i++) {
        $numero .= rand(0, 9);
    }
    return $numero;
}

do {
    $lineaC = generarCadenaAlfanumerica(20);
    $consulta = "SELECT * FROM pagoelectronico WHERE lineaC = '$lineaC'";
    $resultado = $conexion->query($consulta);
} while ($resultado->num_rows > 0);

do {
    $noperacionbancar = generarNumeroAleatorio(14);
    $consulta = "SELECT * FROM pagoelectronico WHERE noperacionbancar = '$noperacionbancar'";
    $resultado = $conexion->query($consulta);
} while ($resultado->num_rows > 0);

do {
    $ntransaccionS = generarNumeroAleatorio(20);
    $consulta = "SELECT * FROM pagoelectronico WHERE ntransaccionS = '$ntransaccionS'";
    $resultado = $conexion->query($consulta);
} while ($resultado->num_rows > 0);

$patente = $_POST['patente'];
$pedimento = $_POST['pedimento'];
$aduana = $_POST['aduana'];
$banco = $_POST['banco'];
$importePago = $_POST['importePago'];
$fechapago = $_POST['fechapago'];
$mPresentacion = $_POST['mPresentacion'];
$MedioRecepcion = $_POST['MedioRecepcion'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO pagoelectronico (
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
    $_SESSION['bloques']['bloque13'] = $last_idb13;
    
    $barcodeData = $lineaC . "|" . $importePago . "|" . $banco . "|" . $fechapago . "|" . $noperacionbancar . "|" . $ntransaccionS;
    
    $generator = new BarcodeGeneratorPNG();
    $barcode = $generator->getBarcode($barcodeData, $generator::TYPE_CODE_128);

    $barcodeFile = 'codigo_de_barras_' . $last_idb13 . '.png';
    $barcodeDir = realpath(__DIR__ . '/../../barcodes/');
    $barcodePath = $barcodeDir . DIRECTORY_SEPARATOR . $barcodeFile;

    file_put_contents($barcodePath, $barcode);

    header("location: ../capturapediemnto.php?barcode=" . urlencode($barcodeFile));
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
?>
