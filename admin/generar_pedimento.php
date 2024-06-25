<?php
// Iniciar sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo '<script> 
            alert("Acceso denegado, no autenticado.");
            window.location = "../index.php";
          </script>';
    exit();
}

// Obtener el ID del usuario autenticado
$idUsuario = $_SESSION['user_id'];

include '../conexion.php';

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener el ID del agente aduanal seleccionado
$idAgente = isset($_POST['agente_id']) ? $_POST['agente_id'] : null;

if ($idAgente === null) {
    echo json_encode(['status' => 'error', 'message' => 'Agente aduanal no seleccionado.']);
    exit();
}

$sql = "INSERT INTO pedimentocompleto (idagente, idusuario) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $idAgente, $idUsuario);

// Ejecutar la consulta preparada
if ($stmt->execute()) {
    $last_id = $conexion->insert_id;
    echo json_encode(['status' => 'success', 'pedimento_id' => $last_id]);
} else {
    echo json_encode(['status' => 'error', 'message' => $conexion->error]);
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conexion->close();
?>
