<?php
include('../../conexion.php');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Recibir los datos del formulario
$fraccionA = $_POST['fraccionA'];
$nico = $_POST['nico'];
$vinc = $_POST['vinc'];
$umc = $_POST['umc'];
$cantumc = $_POST['cantumc'];
$umt = $_POST['umt'];
$cant = $_POST['cant'];
$idapendice4 = $_POST['idapendice4'];
$pod = $_POST['pod'];
$idpedimentoc = $_POST['idpedimentoc'];
$section_id = $_POST['section_id'];
$idapendice11 = $_POST['idapendice11'];  // Nuevo campo agregado

// Preparar la consulta SQL para insertar los datos en la tabla 'partida1'
$sql = "INSERT INTO partida1 (fraccionA, nico, vinc, umc, cantumc, umt, cant, idapendice4, pod, idpedimentoc, section_id, idapendice11)
        VALUES ('$fraccionA', '$nico', '$vinc', '$umc', '$cantumc', '$umt', '$cant', '$idapendice4', '$pod', '$idpedimentoc', '$section_id', '$idapendice11')";

if ($conexion->query($sql) === TRUE) {
    header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
} else {
    echo "Error al insertar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
