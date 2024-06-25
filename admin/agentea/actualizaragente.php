<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idagente = mysqli_real_escape_string($conexion, $_POST['idagente']);
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
    $idusuario = mysqli_real_escape_string($conexion, $_POST['idusuario']);

    $sql = "UPDATE agenteaduanal 
            SET nombreagente = '$nombre', apellidoP = '$apellidoP', apellidoM = '$apellidoM', curp = '$curp', rfc = '$rfc', 
                nacionalidad = '$nacionalidad', tipo_domicilio = '$tipo_domicilio', estado = '$estado', localidad = '$localidad', 
                codigo_postal = '$codigo_postal', idusuario = '$idusuario' 
            WHERE idagente = '$idagente'";

    if (mysqli_query($conexion, $sql)) {
        header("Location: ../agenteaduanal.php?success=" . urlencode('Agente aduanal actualizado exitosamente.'));
        exit;
    } else {
        $error_message = "Error al actualizar el agente aduanal: " . mysqli_error($conexion);
        header("Location: ../agenteaduanal.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    header("Location: ../agenteaduanal.php");
    exit();
}
?>
