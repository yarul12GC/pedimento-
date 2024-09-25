<?php
include 'sesion.php';
include_once '../conexion.php';

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

$queryAgente = "SELECT nombreagente, apellidoP, apellidoM, curp, rfc, nacionalidad, tipo_domicilio, estado, localidad, patente, codigo_postal FROM agenteaduanal WHERE idagente = ?";
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

// Guardar los datos del agente aduanal en la sesión
$agenteData = $resultAgente->fetch_assoc();
$_SESSION['agente_nombre'] = $agenteData['nombreagente'];
$_SESSION['agente_apellidoP'] = $agenteData['apellidoP'];
$_SESSION['agente_apellidoM'] = $agenteData['apellidoM'];
$_SESSION['agente_curp'] = $agenteData['curp'];
$_SESSION['agente_rfc'] = $agenteData['rfc'];
$_SESSION['agente_nacionalidad'] = $agenteData['nacionalidad'];
$_SESSION['agente_tipo_domicilio'] = $agenteData['tipo_domicilio'];
$_SESSION['agente_estado'] = $agenteData['estado'];
$_SESSION['agente_localidad'] = $agenteData['localidad'];
$_SESSION['agente_patente'] = $agenteData['patente'];
$_SESSION['agente_codigo_postal'] = $agenteData['codigo_postal'];

$stmtAgente->close();

// Inserción del pedimento en la base de datos
$sql = "INSERT INTO pedimentocompleto (idagente, idusuario) VALUES (?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $idAgente, $idUsuario);

if ($stmt->execute()) {
    $last_id = $conexion->insert_id;
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
