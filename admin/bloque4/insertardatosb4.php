<?php 
include_once '../../conexion.php';
include_once '../sesion.php';


$valorDolares = $_POST['valorDolares'];
$valorAduna = $_POST['valorAduna'];
$precioPagado = $_POST['precioPagado'];
$idpedimentoc =$_POST['idpedimentoc'];

$sql = "INSERT INTO valoresp(valorDolares, valorAduna, precioPagado, idpedimentoc)
VALUES ('$valorDolares', '$valorAduna', '$precioPagado', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE){
    $last_idb4 = $conexion->insert_id;


    $_SESSION['bloques']['bloque4'] = $last_idb4;


    header("location: ../capturapediemnto.php");
    exit();

} else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
} 
$conexion->close();

