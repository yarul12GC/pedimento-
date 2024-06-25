<?php
include('../../conexion.php');
include('../../sesion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $contenido = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    
    // Validar que los campos no estén vacíos
    if (!empty($clave) && !empty($contenido)) {
        // Insertar en la base de datos
        $query = "INSERT INTO apendice21 (clave, descripcion) VALUES ('$clave', '$contenido')";

        if (mysqli_query($conexion, $query)) {
            // Redirigir a una página de éxito o mostrar un mensaje de éxito
            header("Location: ../apendice21.php?mensaje=exito_registro");
            exit();
        } else {
            // Redirigir a una página de error o mostrar un mensaje de error
            $error_message = "Error al registrar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice21.php?mensaje=error");
            exit();
        }
    } else {
        // Redirigir a una página de error si los campos están vacíos
        header("Location: ../apendice21.php?mensaje=error");
        exit();
    }
} else {
    // Redirigir a una página si se accede directamente al script sin usar el formulario
    header("Location: ../apendice21.php");
    exit();
}
?>
