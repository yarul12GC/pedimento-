<?php
include('../../conexion.php');
include('../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {    $idapendice5 = mysqli_real_escape_string($conexion, $_POST['idapendice5']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $pais = mysqli_real_escape_string($conexion, $_POST['pais']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    if (!empty($idapendice5) && !empty($clave) && !empty($contenido)) {
        $query = "UPDATE apendice5 SET clave='$clave', descripcion='$contenido' , pais='$pais' WHERE idapendice5='$idapendice5'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice5.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice5.php?mensaje=error");
            exit();
        }
    } else {
        header("Location: ../apendice5.php?mensaje=error");
        exit();
    }
} else {
    header("Location: ../apendice5.php");
    exit();
}
?>
