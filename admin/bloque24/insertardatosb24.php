<?php
include('../../conexion.php');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el ID del pedimento y el ID de la sección desde el formulario
$idpedimentoc = $_POST['idpedimentoc'];
$section_id = $_POST['section_id'];

// Preparar la consulta para insertar los datos
$stmt = $conexion->prepare("INSERT INTO complementosp (idpedimentoc, idapendice8, complemento1, complemento2, complemento3, section_id) VALUES (?, ?, ?, ?, ?, ?)");

// Recorrer los arrays de datos del formulario
foreach ($_POST['idapendice8'] as $index => $idapendice8) {
    $complemento1 = $_POST['complemento'][$index] ?? '';
    $complemento2 = $_POST['complemento2'][$index] ?? '';
    $complemento3 = $_POST['complemento3'][$index] ?? '';

    // Enlazar los parámetros y ejecutar la consulta
    $stmt->bind_param('isssss', $idpedimentoc, $idapendice8, $complemento1, $complemento2, $complemento3, $section_id);
    $stmt->execute();
}

$stmt->close();
$conexion->close();

// Redirigir o mostrar un mensaje de éxito
header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
exit();
