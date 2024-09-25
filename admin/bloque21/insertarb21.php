<?php
include_once '../../conexion.php';
include_once '../sesion.php';

// Inicializar la sesión para las secciones si no existe


// Guardar una sección adicional si se envía el formulario correspondiente
if (isset($_POST['save_section_additional1'])) {
    $index = $_POST['index'] ?? null;
    $descripcion = $_POST['descripcion'] ?? '';
    $idpedimentoc = $_POST['idpedimentoc'] ?? '';

    // Validar y sanitizar datos
    $descripcion = $conexion->real_escape_string(trim($descripcion));
    $idpedimentoc = $conexion->real_escape_string(trim($idpedimentoc));

    // Verificar que los datos no estén vacíos
    if (empty($descripcion) || empty($idpedimentoc)) {
        echo "Error: Todos los campos deben ser completados.";
        exit();
    }

    // Actualizar la sección en la sesión
    $_SESSION['sections'][$index] = [
        'descripcion' => $descripcion,
        'idpedimentoc' => $idpedimentoc
    ];

    // Insertar datos en la base de datos
    $section = $_SESSION['sections'][$index];
    $sql = "INSERT INTO partida2 (
        descripcion, idpedimentoc
    ) VALUES (
        '$descripcion', '$idpedimentoc'
    )";

    if ($conexion->query($sql) === TRUE) {
        // Éxito, redirigir a la página principal después de guardar
        header('Location: ../capturapediemnto.php');
        exit();
    } else {
        // Manejo de errores
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

// Recuperar las secciones almacenadas en la sesión para mostrarlas en la página
$sections = $_SESSION['sections'];
?>
