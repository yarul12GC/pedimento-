<?php 
include '../../conexion.php';
include '../sesion.php';


$idapendice3entradasalida = $_POST['idapendice3entrtadaSalida'];
$idapendice3arribo = $_POST['idapendice3arribo'];
$idapendice3salida = $_POST['idapendice3salida'];
$idpedimentoc =$_POST['idpedimentoc'];

$sql = "INSERT INTO transporte(idapendice3entrtadaSalida, idapendice3arribo, idapendice3salida, idpedimentoc)
VALUES ('$idapendice3entradasalida', '$idapendice3arribo', '$idapendice3salida', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE){
    $last_idb3 = $conexion->insert_id;


    $_SESSION['bloques']['bloque3'] = $last_idb3;


    header("location: ../capturapediemnto.php");
    exit();

} else {
    echo "Error:" . $sql . "<br>" . $conexion-> error;
} 
$conexion->close();


