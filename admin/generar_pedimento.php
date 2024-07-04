<?php
include_once '../conexion.php';
include_once '../sesion.php';

$idUsuario = $_SESSION['usuarioID'];

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$idAgente = isset($_POST['agente_id']) ? $_POST['agente_id'] : null;

if ($idAgente === null) {
    echo '<script> 
            alert("Agente aduanal no seleccionado.");
            window.history.back();
          </script>';
    exit();
}

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

if ($stmt->execute()) {
    $last_id = $conexion->insert_id;
    // Guardar el last_id en una variable de sesión
    $_SESSION['pedimento_id'] = $last_id;
    header("Location: capturapediemnto.php?id=$last_id");
    exit();
} else {
    echo '<script> 
            alert("Error al generar el pedimento: ' . $conexion->error . '");
            window.history.back();
          </script>';
}

$stmt->close();
$conexion->close();
?>
