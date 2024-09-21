<?php
include_once '../sesion.php';
include_once '../../conexion.php';

// Obtener los datos del formulario
$idapendice15 = $_POST['idapendice15'];
$tipocambio = $_POST['tipoCambio'];
$pesobruto = $_POST['peso_bruto'];
$idapendice1 = $_POST['idapendice1'];
$idpedimentoc = $_POST['idpedimentoc'];
$concatenatedData = $_POST['concatenatedData'];

// Guardar los datos en la sesión
$_SESSION['bloques']['idapendice1'] = $concatenatedData;

$sameSession = isset($_SESSION['pedimento_id']) && $_SESSION['pedimento_id'] == $idpedimentoc;


// Inserción en la base de datos
$sql = "INSERT INTO transacciones(idapendice15, tipoCambio, peso_bruto, idapendice1, idpedimentoc, concatenatedData) 
        VALUES ('$idapendice15', '$tipocambio', '$pesobruto', '$idapendice1', '$idpedimentoc', '$concatenatedData')";

if ($conexion->query($sql) === TRUE) {
    $last_idb2 = $conexion->insert_id;

    // Guardar el último ID en la sesión
    $_SESSION['bloques']['bloque2'] = $last_idb2;

    if ($sameSession) {
        // Si es la misma sesión, redirige a la página de captura en curso
        header("Location: ../capturapediemnto.php?id=" . urlencode($idpedimentoc));
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
