<?php
include_once '../../conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idpago = $_POST['idpago'];
    $patente = $_POST['patente'];
    $pedimento = $_POST['pedimento'];
    $aduana = $_POST['aduana'];
    $banco = $_POST['banco'];
    $lineaC = $_POST['lineaC'];
    $importePago = $_POST['importePago'];
    $fechapago = $_POST['fechapago'];
    $noperacionbancar = $_POST['noperacionbancar'];
    $ntransaccionS = $_POST['ntransaccionS'];
    $mPresentacion = $_POST['mPresentacion'];
    $MedioRecepcion = $_POST['MedioRecepcion'];
    $idpedimentoc = $_POST['idpedimentoc'];
    $barcode_image = $_POST['barcode_image'];

    $idpago = mysqli_real_escape_string($conexion, $idpago);
    $patente = mysqli_real_escape_string($conexion, $patente);
    $pedimento = mysqli_real_escape_string($conexion, $pedimento);
    $aduana = mysqli_real_escape_string($conexion, $aduana);
    $banco = mysqli_real_escape_string($conexion, $banco);
    $lineaC = mysqli_real_escape_string($conexion, $lineaC);
    $importePago = mysqli_real_escape_string($conexion, $importePago);
    $fechapago = mysqli_real_escape_string($conexion, $fechapago);
    $noperacionbancar = mysqli_real_escape_string($conexion, $noperacionbancar);
    $ntransaccionS = mysqli_real_escape_string($conexion, $ntransaccionS);
    $mPresentacion = mysqli_real_escape_string($conexion, $mPresentacion);
    $MedioRecepcion = mysqli_real_escape_string($conexion, $MedioRecepcion);
    $idpedimentoc = mysqli_real_escape_string($conexion, $idpedimentoc);
    $barcode_image = mysqli_real_escape_string($conexion, $barcode_image);

    $query = "
        UPDATE pagoelectronico 
        SET
            patente = '$patente',
            pedimento = '$pedimento',
            aduana = '$aduana',
            banco = '$banco',
            lineaC = '$lineaC',
            importePago = '$importePago',
            fechapago = '$fechapago',
            noperacionbancar = '$noperacionbancar',
            ntransaccionS = '$ntransaccionS',
            mPresentacion = '$mPresentacion',
            MedioRecepcion = '$MedioRecepcion',
            idpedimentoc = '$idpedimentoc',
            barcode_image = '$barcode_image'
        WHERE idpago = '$idpago'
    ";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $query)) {
        header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Solicitud no válida.";
}
