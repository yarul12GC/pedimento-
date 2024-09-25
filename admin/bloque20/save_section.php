<?php
include_once '../../conexion.php';
include_once '../sesion.php';

if (isset($_POST['save_section'])) {
    $index = $_POST['index'];
    $_SESSION['sections'][$index] = [
        'fraccionA' => $_POST['fraccionA'],
        'nico' => $_POST['nico'],
        'vinc' => $_POST['vinc'],
        'metval' => $_POST['metval'],
        'umc' => $_POST['umc'],
        'cantumc' => $_POST['cantumc'],
        'umt' => $_POST['umt'],
        'cant' => $_POST['cant'],
        'idapendice4' => $_POST['idapendice4'],
        'pod' => $_POST['pod'],
        'idpedimentoc' => $_POST['idpedimentoc']
    ];

    $section = $_SESSION['sections'][$index];
    $sql = "INSERT INTO partida1 (
        fraccionA, nico, vinc, metval,
        umc, cantumc, umt, cant,
        idapendice4, pod, idpedimentoc
    ) VALUES (
        '{$section['fraccionA']}', '{$section['nico']}', '{$section['vinc']}',
        '{$section['metval']}', '{$section['umc']}', '{$section['cantumc']}',
        '{$section['umt']}', '{$section['cant']}', '{$section['idapendice4']}',
        '{$section['pod']}', '{$section['idpedimentoc']}'
    )";

    if ($conexion->query($sql) === TRUE) {
        // Éxito
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
    header("Location: ../capturapediemnto.php"); // Redirige de vuelta a la página principal después de guardar
    exit();
}
