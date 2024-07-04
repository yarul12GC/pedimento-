<?php
// insertar_datos.php
include '../../conexion.php'; 
include '../sesion.php';

$Nopedimento = $_POST['Nopedimento'];
$Toper = $_POST['Toper'];
$idapendice2 = $_POST['idapendice2'];
$idapendice16 = $_POST['idapendice16'];
$idpedimentoc = $_POST['idpedimentoc'];

$sql = "INSERT INTO dpedimento (Nopedimento, Toper, idapendice2, idapendice16, idpedimentoc) VALUES ('$Nopedimento', '$Toper', '$idapendice2', '$idapendice16', '$idpedimentoc')";

if ($conexion->query($sql) === TRUE) {
    $last_id = $conexion->insert_id;

    $_SESSION['bloques']['bloque1'] = $last_id;


    header("Location: ../capturapediemnto.php?id=$last_id");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();