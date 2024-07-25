<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $nivel = mysqli_real_escape_string($conexion, $_POST['nivel']);
    $supuestosdeaplicacion = mysqli_real_escape_string($conexion, $_POST['supuestosdeaplicacion']);
    $complemento1 = mysqli_real_escape_string($conexion, $_POST['complemento1']);
    $complemento2 = mysqli_real_escape_string($conexion, $_POST['complemento2']);
    $complemento3 = mysqli_real_escape_string($conexion, $_POST['complemento3']);
    
    // Validar que los campos no estén vacíos
    if (!empty($clave) && !empty($descripcion) && !empty($nivel)) {
        // Insertar en la base de datos
        $query = "INSERT INTO apendice8 (clave, descripcion, nivel, supuestosdeaplicacion, Complemento1, Complemento2, Complemento3) 
                  VALUES ('$clave', '$descripcion', '$nivel', '$supuestosdeaplicacion', '$complemento1', '$complemento2', '$complemento3')";

        if (mysqli_query($conexion, $query)) {
            // Redirigir a una página de éxito o mostrar un mensaje de éxito
            header("Location: ../apendice8.php?mensaje=exito_registro");
            exit();
        } else {
            // Redirigir a una página de error o mostrar un mensaje de error
            $error_message = "Error al registrar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice8.php?mensaje=error&detalle=" . urlencode($error_message));
            exit();
        }
    } else {
        // Redirigir a una página de error si los campos están vacíos
        header("Location: ../apendice8.php?mensaje=error&detalle=" . urlencode("Campos vacíos"));
        exit();
    }
} else {
    // Redirigir a una página si se accede directamente al script sin usar el formulario
    header("Location: ../apendice8.php");
    exit();
}
?>
