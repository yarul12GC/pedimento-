<?php
include('../../conexion.php'); // Asegúrate de que este archivo tenga la conexión a la base de datos

// Obtener el id del pedimento y section_id desde el formulario
$idpedimentoc = $_POST['idpedimentoc'];
$section_id = $_POST['section_id'];

// Obtener los datos del formulario
$idapendice12 = $_POST['idapendice12'];
$tasa = $_POST['tasa'];
$idapendice18 = $_POST['idapendice18'];
$idapendice13 = $_POST['idapendice13'];
$importe = $_POST['importe'];

// Construir la consulta SQL
$values = [];
for ($i = 0; $i < count($idapendice12); $i++) {
    // Escapar valores para evitar inyecciones SQL
    $idapendice12Escaped = $conexion->real_escape_string($idapendice12[$i]);
    $tasaEscaped = $conexion->real_escape_string($tasa[$i]);
    $idapendice18Escaped = $conexion->real_escape_string($idapendice18[$i]);
    $idapendice13Escaped = $conexion->real_escape_string($idapendice13[$i]);
    $importeEscaped = $conexion->real_escape_string($importe[$i]);

    $values[] = "($idpedimentoc, '$idapendice12Escaped', $tasaEscaped, '$idapendice18Escaped', '$idapendice13Escaped', '$importeEscaped', '$section_id')";
}

// Crear la consulta de inserción
$query = "INSERT INTO contribuciones (idpedimentoc, idapendice12, tasa, idapendice18, idapendice13, importe, section_id) VALUES " . implode(", ", $values);

// Ejecutar la consulta
if ($conexion->query($query) === TRUE) {
    header("Location: ../archivopedimentocap.php?id=" . $idpedimentoc);
} else {
    echo "Error al insertar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
