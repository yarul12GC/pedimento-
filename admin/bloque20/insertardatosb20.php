<?php
include_once '../../conexion.php';
include_once '../../sesion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sections = $_POST['sections'];

    foreach ($sections as $section) {
        $fraccionA = $section['fraccionA'];
        $nico = $section['nico'];
        $vinc = $section['vinc'];
        $metval = $section['metval'];
        $umc = $section['umc'];
        $cantumc = $section['cantumc'];
        $umt = $section['umt'];
        $cant = $section['cant'];
        $idapendice4 = $section['idapendice4'];
        $pod = $section['pod'];
        $idpedimentoc = $section['idpedimentoc'];

        $sql = "INSERT INTO partida1 (
            fraccionA,
            nico,
            vinc,
            metval,
            umc,
            cantumc,
            umt,
            cant,
            idapendice4,
            pod,
            idpedimentoc
        ) VALUES (
            '$fraccionA',
            '$nico',
            '$vinc',
            '$metval',
            '$umc',
            '$cantumc',
            '$umt',
            '$cant',
            '$idapendice4',
            '$pod',
            '$idpedimentoc'
        )";

        if ($conexion->query($sql) === TRUE) {
            $last_idb20 = $conexion->insert_id;
            $_SESSION['bloques']['bloque20'] = $last_idb20;
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    header("location: ../capturapediemnto.php");
    exit();
}

$conexion->close();
?>
