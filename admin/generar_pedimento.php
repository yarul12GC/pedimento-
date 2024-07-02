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

// Verificar que el ID del agente aduanal fue recibido correctamente
if ($idAgente === null) {
    echo '<script> 
            alert("Agente aduanal no seleccionado.");
            window.history.back();
          </script>';
    exit();
}

// Verificar si el agente aduanal existe en la base de datos
$queryAgente = "SELECT * FROM agenteaduanal WHERE idagente = ?";
$stmtAgente = $conexion->prepare($queryAgente);
$stmtAgente->bind_param("i", $idAgente);
$stmtAgente->execute();
$resultAgente = $stmtAgente->get_result();

if ($resultAgente->num_rows === 0) {
    echo '<script> 
            alert("El agente aduanal seleccionado no existe.");
            window.history.back();
          </script>';
    exit();
}

$stmtAgente->close();

$sql = "INSERT INTO pedimentocompleto (idagente, idusuario) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $idAgente, $idUsuario);

// Ejecutar la consulta preparada
if ($stmt->execute()) {
    $last_id = $conexion->insert_id;
    header("Location: capturapediemnto.php?id=$last_id");
    exit();
} else {
    echo '<script> 
            alert("Error al generar el pedimento: ' . $conexion->error . '");
            window.history.back();
          </script>';
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conexion->close();
?>
