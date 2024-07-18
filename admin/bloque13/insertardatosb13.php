<?php 
include_once '../../conexion.php';
include_once '../../sesion.php';


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

$idpedimentoc =$_POST['idpedimentoc'];

$sql = "INSERT INTO pagoelectronico(patente,
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
  idpedimentoc)
VALUES ('$patente',
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
  '$idpedimentoc')";

if ($conexion->query($sql) === TRUE){
    $last_idb13 = $conexion->insert_id;


    $_SESSION['bloques']['bloque13'] = $last_idb13;


    header("location: ../capturapediemnto.php");
    exit();

} else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
} 
$conexion->close();

