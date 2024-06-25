<?php
include('../../conexion.php');
include('../../sesion.php');

if (isset($_GET['idapendice17'])) {
    // Obtener el ID del registro a eliminar
    $idapendice17 = mysqli_real_escape_string($conexion, $_GET['idapendice17']);

    // Validar que el ID no esté vacío
    if (!empty($idapendice17)) {
        // Eliminar el registro de la base de datos
        $query = "DELETE FROM apendice17 WHERE idapendice17='$idapendice17'";

        if (mysqli_query($conexion, $query)) {
            // Redirigir a una página de éxito o mostrar un mensaje de éxito
            header("Location: ../apendice17.php?success=Complemento del apéndice 17 eliminado exitosamente.");
            exit();
        } else {
            // Redirigir a una página de error o mostrar un mensaje de error
            $error_message = "Error al eliminar el complemento: " . mysqli_error($conexion);
            header("Location: ../apendice17.php?error=" . urlencode($error_message));
            exit();
        }
    } else {
        // Redirigir a una página de error si el ID está vacío
        header("Location: ../apendice17.php?error=ID del complemento es obligatorio.");
        exit();
    }
} else {
    // Redirigir a una página si se accede directamente al script sin usar el formulario
    header("Location: ../apendice17.php");
    exit();
}
?>
