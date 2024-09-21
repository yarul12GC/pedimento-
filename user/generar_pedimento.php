<?php
include_once '../conexion.php';
include_once '../sesion.php';


$idUsuario = $_SESSION['usuarioID']; // ID del usuario que inició sesión

// Verificamos que la conexión con la base de datos no haya fallado
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtenemos automáticamente el agente aduanal asociado al usuario
$queryAgente = "SELECT a.idagente, a.nombreagente 
                FROM agenteaduanal a
                JOIN usuarios u ON a.idusuario = u.usuarioID
                WHERE u.usuarioID = ?";
$stmtAgente = $conexion->prepare($queryAgente);
$stmtAgente->bind_param("i", $idUsuario);
$stmtAgente->execute();
$resultAgente = $stmtAgente->get_result();

if ($resultAgente->num_rows === 0) {
    echo '<script>
            alert("No se encontró un agente aduanal vinculado al usuario.");
            window.history.back();
          </script>';
    exit();
}

// Obtenemos el ID del agente aduanal
$agenteData = $resultAgente->fetch_assoc();
$idAgente = $agenteData['idagente'];

// Inserción del pedimento en la base de datos
$sql = "INSERT INTO pedimentocompleto (idagente, idusuario) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $idAgente, $idUsuario);

if ($stmt->execute()) {
    $last_id = $conexion->insert_id;
    $_SESSION['pedimento_id'] = $last_id;
    echo '<script>
            alert("Pedimento generado exitosamente.");
            window.location.href = "archivopedimentocap.php?id=' . $last_id . '";
          </script>';
} else {
    echo '<script>
            alert("Error al generar el pedimento: ' . $conexion->error . '");
            window.history.back();
          </script>';
}

$stmt->close();
$conexion->close();
