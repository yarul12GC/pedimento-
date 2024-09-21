<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombreagente']);
    $apellidoP = mysqli_real_escape_string($conexion, $_POST['apellidoP']);
    $apellidoM = mysqli_real_escape_string($conexion, $_POST['apellidoM']);
    $curp = mysqli_real_escape_string($conexion, $_POST['curp']);
    $rfc = mysqli_real_escape_string($conexion, $_POST['rfc']);
    $nacionalidad = mysqli_real_escape_string($conexion, $_POST['nacionalidad']);
    $tipo_domicilio = mysqli_real_escape_string($conexion, $_POST['tipo_domicilio']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $localidad = mysqli_real_escape_string($conexion, $_POST['localidad']);
    $codigo_postal = mysqli_real_escape_string($conexion, $_POST['codigo_postal']);
    $patente = mysqli_real_escape_string($conexion, $_POST['patente']);
    $idusuario = mysqli_real_escape_string($conexion, $_POST['idusuario']);

    $sql = "INSERT INTO agenteaduanal (nombreagente, apellidoP, apellidoM, curp, rfc, nacionalidad, tipo_domicilio, estado, localidad, codigo_postal, patente, idusuario) 
            VALUES ('$nombre', '$apellidoP', '$apellidoM', '$curp', '$rfc', '$nacionalidad', '$tipo_domicilio', '$estado', '$localidad', '$codigo_postal', '$patente', '$idusuario')";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../agenteaduanluser.php");
        exit;
    } else {
        $error_message = "Error al registrar el agente aduanal: " . mysqli_error($conexion);
        header("Location: ../agenteaduanal.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    header("Location: ../agenteaduanal.php");
    exit();
}
