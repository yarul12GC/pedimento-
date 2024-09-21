<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

// Recibir datos del formulario
$idapendice8 = $_POST['idapendice8'];
$complemento = $_POST['complemento'];
$complemento2 = isset($_POST['complemento2']) ? $_POST['complemento2'] : [];
$complemento3 = isset($_POST['complemento3']) ? $_POST['complemento3'] : [];
$idpedimentoc = $_POST['idpedimentoc'];

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


$queries = [];
for ($i = 0; $i < count($idapendice8); $i++) {
    $idapendice8_val = $conexion->real_escape_string($idapendice8[$i]);
    $complemento_val = $conexion->real_escape_string($complemento[$i]);
    $complemento2_val = isset($complemento2[$i]) ? $conexion->real_escape_string($complemento2[$i]) : '';
    $complemento3_val = isset($complemento3[$i]) ? $conexion->real_escape_string($complemento3[$i]) : '';
    $idpedimentoc_val = $conexion->real_escape_string($idpedimentoc);

    $queries[] = "('$idapendice8_val', '$complemento_val', '$complemento2_val', '$complemento3_val', '$idpedimentoc_val')";
}

$sql = "INSERT INTO complementos (idapendice8, complemento, complemento2, complemento3, idpedimentoc) 
        VALUES " . implode(", ", $queries);

// Ejecutar la consulta y verificar si fue exitosa
if ($conexion->query($sql) === TRUE) {
    // Obtener todos los IDs insertados
    $inserted_ids = [];
    for ($i = 0; $i < count($idapendice8); $i++) {
        $inserted_ids[] = $conexion->insert_id + $i;
    }
    $_SESSION['bloques']['bloque17'] = $inserted_ids; // Almacenar los IDs insertados en la sesión

    if ($sameSession) {
        // Si es la misma sesión, redirige a la página de captura en curso
        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
    } else {
        // Si es una nueva sesión, redirige a la página de continuación de captura
        header("Location: ../archivopedimentocap.php?id=" . urlencode($idpedimentoc));
    }
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
