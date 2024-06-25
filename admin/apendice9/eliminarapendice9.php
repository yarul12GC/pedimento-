<?php
include('../../conexion.php');
include('../../sesion.php');

if (isset($_GET['idapendice9'])) {
    // Obtener el ID del registro a eliminar
    $idapendice1 = mysqli_real_escape_string($conexion, $_GET['idapendice9']);

    // Validar que el ID no esté vacío
    if (!empty($idapendice9)) {
        // Eliminar el registro de la base de datos
        $query = "DELETE FROM apendice9 WHERE idapendice9='$idapendice9'";

        if (mysqli_query($conexion, $query)) {
            // Redirigir a una página de éxito o mostrar un mensaje de éxito
            header("Location: ../apendice9.php?success=Complemento del apéndice 9 eliminado exitosamente.");
            exit();
        } else {
            // Redirigir a una página de error o mostrar un mensaje de error
            $error_message = "Error al eliminar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice9.php?error=" . urlencode($error_message));
            exit();
        }
    } else {
        // Redirigir a una página de error si el ID está vacío
        header("Location: ../apendice9.php?error=ID del complemento es obligatorio.");
        exit();
    }
} else {
    // Redirigir a una página si se accede directamente al script sin usar el formulario
    header("Location: ../apendice9.php");
    exit();
}
?>
