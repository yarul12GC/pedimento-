<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

if (isset($_POST['save_section'])) {
    $index = $_POST['index'];
    $pedimento_id = $_POST['idpedimentoc'][$index] ?? '';
    $_SESSION['sections'][$index] = [
        'descripcion' => $_POST['descripcion'][$index] ?? '',
        'idpedimentoc' => $pedimento_id
    ];

    $section = $_SESSION['sections'][$index];
    $sql = "INSERT INTO partida2 (
        descripcion,
        idpedimentoc
    ) VALUES (
        '{$section['descripcion']}',
        '{$section['idpedimentoc']}'
    )";

    if ($conexion->query($sql) === TRUE) {
        header('Location: ../capturapedimnto.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}
