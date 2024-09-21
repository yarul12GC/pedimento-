<?php
include_once '../../conexion.php';
include_once '../../sesion.php';
require 'vendor/autoload.php';

// Importar la clase de la librería
use Picqer\Barcode\BarcodeGeneratorPNG;

function generarCadenaAlfanumerica($longitud)
{
    $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $cadena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $cadena .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $cadena;
}

function generarNumeroAleatorio($longitud)
{
    $numero = '';
    for ($i = 0; $i < $longitud; $i++) {
        $numero .= rand(0, 9);
    }
    return $numero;
}

// Generar valores únicos
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


$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


// Insertar los datos en la base de datos
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

    // Generar código de barras
    $barcodeData = $lineaC . "|" . $importePago . "|" . $banco . "|" . $fechapago . "|" . $noperacionbancar . "|" . $ntransaccionS;

    // Crear el generador de código de barras
    $generator = new BarcodeGeneratorPNG();
    $barcode = $generator->getBarcode($barcodeData, $generator::TYPE_CODE_128);

    // Definir la ruta donde se guardará la imagen
    $barcodeFolder = 'barcodes/';
    if (!is_dir($barcodeFolder)) {
        mkdir($barcodeFolder, 0777, true); // Crear la carpeta si no existe
    }
    $barcodeFileName = 'barcode_' . $last_idb13 . '.png';
    $barcodeFilePath = $barcodeFolder . $barcodeFileName;

    // Guardar la imagen en la carpeta
    file_put_contents($barcodeFilePath, $barcode);

    // Escapar el nombre del archivo para guardarlo en la base de datos
    $barcodeEscaped = $conexion->real_escape_string($barcodeFileName);
    $updateSql = "UPDATE pagoelectronico SET barcode_image='$barcodeEscaped' WHERE idpago = $last_idb13";

    // Comprobación de si es la misma sesión
    if ($sameSession) {
        // Si es la misma sesión, se realiza la redirección correspondiente
        if ($conexion->query($updateSql) === TRUE) {
            // Redirigir a la página de captura en curso y pasar el nombre del archivo de código de barras
            header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc) . "&barcode=" . urlencode($barcodeFileName));
            exit();
        } else {
            echo "Error actualizando la imagen del código de barras: " . $conexion->error;
        }
    } else {
        // Si es una nueva sesión, se realiza otra redirección
        if ($conexion->query($updateSql) === TRUE) {
            // Redirigir a la página de continuación de captura y pasar el nombre del archivo de código de barras
            header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc) . "&barcode=" . urlencode($barcodeFileName));
            exit();
        } else {
            echo "Error actualizando la imagen del código de barras: " . $conexion->error;
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
