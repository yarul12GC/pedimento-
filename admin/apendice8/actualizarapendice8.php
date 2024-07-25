<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idapendice8 = mysqli_real_escape_string($conexion, $_POST['idapendice8']);
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $nivel = mysqli_real_escape_string($conexion, $_POST['nivel']);
    $supuestosdeaplicacion = mysqli_real_escape_string($conexion, $_POST['supuestosdeaplicacion']);
    $complemento1 = mysqli_real_escape_string($conexion, $_POST['complemento1']);
    $complemento2 = mysqli_real_escape_string($conexion, $_POST['complemento2']);
    $complemento3 = mysqli_real_escape_string($conexion, $_POST['complemento3']);

    if (!empty($idapendice8) && !empty($clave) && !empty($descripcion) && !empty($nivel)) {
        $query = "UPDATE apendice8 
                  SET clave='$clave', descripcion='$descripcion', nivel='$nivel', supuestosdeaplicacion='$supuestosdeaplicacion', 
                      Complemento1='$complemento1', Complemento2='$complemento2', Complemento3='$complemento3' 
                  WHERE idapendice8='$idapendice8'";

        if (mysqli_query($conexion, $query)) {
            header("Location: ../apendice8.php?mensaje=exito");
            exit();
        } else {
            $error_message = "Error al actualizar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice8.php?mensaje=error&detalle=" . urlencode($error_message));
            exit();
        }
    } else {
        header("Location: ../apendice8.php?mensaje=error&detalle=" . urlencode("Campos vacíos"));
        exit();
    }
} else {
    header("Location: ../apendice8.php");
    exit();
}
?>
