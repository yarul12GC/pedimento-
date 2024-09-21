<?php
include('../../conexion.php');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Recibir los datos del formulario
$descripcion = $_POST['descripcion'];
$idpedimentoc = $_POST['idpedimentoc'];
$section_id = $_POST['section_id'];

// Preparar la consulta SQL para insertar los datos en la tabla 'partida2'
$sql = "INSERT INTO partida2 (descripcion, idpedimentoc, section_id)
        VALUES ('$descripcion', '$idpedimentoc', '$section_id')";

if ($conexion->query($sql) === TRUE) {
    header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
} else {
    echo "Error al insertar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
