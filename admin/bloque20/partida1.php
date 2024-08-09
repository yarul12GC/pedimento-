<?php

if (!isset($_SESSION['sections'])) {
    $_SESSION['sections'] = [];
}

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Manejar la solicitud para guardar una sección en partida1
if (isset($_POST['save_section'])) {
    $index = $_POST['index'] ?? null;
    if ($index !== null && isset($_SESSION['sections'][$index])) {
        $_SESSION['sections'][$index] = [
            'fraccionA' => $_POST['fraccionA'] ?? '',
            'nico' => $_POST['nico'] ?? '',
            'vinc' => $_POST['vinc'] ?? '',
            'idapendice11' => $_POST['idapendice11'] ?? '',
            'umc' => $_POST['umc'] ?? '',
            'cantumc' => $_POST['cantumc'] ?? '',
            'umt' => $_POST['umt'] ?? '',
            'cant' => $_POST['cant'] ?? '',
            'idapendice4' => $_POST['idapendice4'] ?? '',
            'pod' => $_POST['pod'] ?? '',
            'idpedimentoc' => $_POST['idpedimentoc'] ?? '',
            'descripcion' => $_POST['descripcion'] ?? '',
            'valaduusd' => $_POST['valaduusd'] ?? '',
            'imppreciopag' => $_POST['imppreciopag'] ?? '',
            'preciounitario' => $_POST['preciounitario'] ?? '',
            'valoragregado' => $_POST['valoragregado'] ?? '',
            'idapendice9' => $_POST['idapendice9'] ?? '',
            'numpermiso' => $_POST['numpermiso'] ?? '',
            'firmapermiso' => $_POST['firmapermiso'] ?? '',
            'valcomdls' => $_POST['valcomdls'] ?? '',
            'cantidadumt' => $_POST['cantidadumt'] ?? '',
            'observacionesnp' => $_POST['observacionesnp'] ?? '',
            'idapendice12' => $_POST['idapendice12'] ?? '',
            'tasa' => $_POST['tasa'] ?? '',
            'idapendice18' => $_POST['idapendice18'] ?? '',
            'idapendice13' => $_POST['idapendice13'] ?? '',
            'importe' => $_POST['importe'] ?? ''

        ];

        // Sanitizar y validar datos
        foreach ($_SESSION['sections'][$index] as $key => $value) {
            $_SESSION['sections'][$index][$key] = $conexion->real_escape_string(trim($value));
        }

        $section = $_SESSION['sections'][$index];
        $sql = "INSERT INTO partida1 (
            fraccionA, nico, vinc, idapendice11, umc, cantumc, umt, cant, idapendice4, pod, idpedimentoc
        ) VALUES (
            '{$section['fraccionA']}', '{$section['nico']}', '{$section['vinc']}', '{$section['idapendice11']}',
            '{$section['umc']}', '{$section['cantumc']}', '{$section['umt']}', '{$section['cant']}',
            '{$section['idapendice4']}', '{$section['pod']}', '{$section['idpedimentoc']}'
        )";

        if ($conexion->query($sql) === TRUE) {
            // Los datos se han guardado correctamente
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Índice de sección no válido.";
    }
}

// Manejar la solicitud para guardar una sección en partida2
if (isset($_POST['save_section_desc'])) {
    $index = $_POST['index'] ?? null;
    if ($index !== null && isset($_SESSION['sections'][$index])) {
        $_SESSION['sections'][$index]['descripcion'] = $_POST['descripcion'] ?? '';

        // Sanitizar y validar datos
        $_SESSION['sections'][$index]['descripcion'] = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['descripcion']));

        $section = $_SESSION['sections'][$index];
        $sql = "INSERT INTO partida2 (descripcion, idpedimentoc) VALUES ('{$section['descripcion']}', '{$section['idpedimentoc']}')";

        if ($conexion->query($sql) === TRUE) {
            // Los datos se han guardado correctamente
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Índice de sección no válido.";
    }
}

// Manejar la solicitud para guardar una sección en partida3
if (isset($_POST['save_section_partida3'])) {
    $index = $_POST['index'] ?? null;
    if ($index !== null && isset($_SESSION['sections'][$index])) {
        $_SESSION['sections'][$index]['valaduusd'] = $_POST['valaduusd'] ?? '';
        $_SESSION['sections'][$index]['imppreciopag'] = $_POST['imppreciopag'] ?? '';
        $_SESSION['sections'][$index]['preciounitario'] = $_POST['preciounitario'] ?? '';
        $_SESSION['sections'][$index]['valoragregado'] = $_POST['valoragregado'] ?? '';

        // Sanitizar y validar datos
        foreach (['valaduusd', 'imppreciopag', 'preciounitario', 'valoragregado'] as $field) {
            $_SESSION['sections'][$index][$field] = $conexion->real_escape_string(trim($_SESSION['sections'][$index][$field]));
        }

        $section = $_SESSION['sections'][$index];
        $sql = "INSERT INTO partida3 (valaduusd, imppreciopag, preciounitario, valoragregado, idpedimentoc) VALUES (
            '{$section['valaduusd']}', '{$section['imppreciopag']}', '{$section['preciounitario']}', '{$section['valoragregado']}', '{$section['idpedimentoc']}')";

        if ($conexion->query($sql) === TRUE) {
            // Los datos se han guardado correctamente
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Índice de sección no válido.";
    }
}


if (isset($_POST['permisos-nivel-partida'])) {
    $index = $_POST['index'] ?? null;
    if ($index !== null && isset($_SESSION['sections'][$index])) {
        // Obtener y sanitizar los datos del formulario
        $idapendice9 = $conexion->real_escape_string(trim($_POST['idapendice9'] ?? ''));
        $numpermiso = $conexion->real_escape_string(trim($_POST['numpermiso'] ?? ''));
        $firmapermiso = $conexion->real_escape_string(trim($_POST['firmapermiso'] ?? ''));
        $valcomdls = $conexion->real_escape_string(trim($_POST['valcomdls'] ?? ''));
        $cantidadumt = $conexion->real_escape_string(trim($_POST['cantidadumt'] ?? ''));

        // Actualizar los datos en la sesión
        $_SESSION['sections'][$index]['idapendice9'] = $idapendice9;
        $_SESSION['sections'][$index]['numpermiso'] = $numpermiso;
        $_SESSION['sections'][$index]['firmapermiso'] = $firmapermiso;
        $_SESSION['sections'][$index]['valcomdls'] = $valcomdls;
        $_SESSION['sections'][$index]['cantidadumt'] = $cantidadumt;

        // Obtener el idpedimentoc de la sesión o un valor por defecto si no existe
        $idpedimentoc = $_SESSION['sections'][$index]['idpedimentoc'] ?? '';

        // Preparar la consulta SQL
        $sql = "INSERT INTO permisop (
            idapendice9, numpermiso, firmapermiso, valcomdls, cantidadumt, idpedimentoc
        ) VALUES (
            '$idapendice9', '$numpermiso', '$firmapermiso', '$valcomdls', '$cantidadumt', '$idpedimentoc'
        )";

        // Ejecutar la consulta SQL
        if ($conexion->query($sql) === TRUE) {
            // Los datos se han guardado correctamente
            echo "Datos guardados correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Índice de sección no válido.";
    }
}

if (isset($_POST['complementosp-nivel-partida'])) {
    $index = $_POST['index'] ?? null;
    if ($index !== null && isset($_SESSION['sections'][$index])) {
        // Obtener y sanitizar los datos del formulario
        $idapendice8 = $conexion->real_escape_string(trim($_POST['idapendice8'] ?? ''));
        $complemento1 = $conexion->real_escape_string(trim($_POST['complemento1'] ?? ''));
        $complemento2 = $conexion->real_escape_string(trim($_POST['complemento2'] ?? ''));
        $complemento3 = $conexion->real_escape_string(trim($_POST['complemento3'] ?? ''));

        // Actualizar los datos en la sesión
        $_SESSION['sections'][$index]['idapendice8'] = $idapendice8;
        $_SESSION['sections'][$index]['complemento1'] = $complemento1;
        $_SESSION['sections'][$index]['complemento2'] = $complemento2;
        $_SESSION['sections'][$index]['complemento3'] = $complemento3;

        // Obtener el idpedimentoc de la sesión o un valor por defecto si no existe
        $idpedimentoc = $_SESSION['sections'][$index]['idpedimentoc'] ?? '';

        // Preparar la consulta SQL
        $sql = "INSERT INTO complementosp (
            idapendice8, complemento1, complemento2, complemento3, idpedimentoc
        ) VALUES (
            '$idapendice8', '$complemento1', '$complemento2', '$complemento3', '$idpedimentoc'
        )";

        // Ejecutar la consulta SQL
        if ($conexion->query($sql) === TRUE) {
            // Los datos se han guardado correctamente
            echo "Datos guardados correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Índice de sección no válido.";
    }
}


if (isset($_POST['observaciones-nivel-p'])) {
    $index = $_POST['index'] ?? null;
    if ($index !== null && isset($_SESSION['sections'][$index])) {
        $_SESSION['sections'][$index]['descripcionnp'] = $_POST['descripcionnp'] ?? '';

        // Sanitizar y validar datos
        $_SESSION['sections'][$index]['descripcionnp'] = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['descripcionnp']));

        $section = $_SESSION['sections'][$index];
        $sql = "INSERT INTO observacionesnp (descripcionnp, idpedimentoc) VALUES ('{$section['descripcionnp']}', '{$section['idpedimentoc']}')";

        if ($conexion->query($sql) === TRUE) {
            // Los datos se han guardado correctamente
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Índice de sección no válido.";
    }
}
if (isset($_POST['contribuciones-form'])) {
    $index = $_POST['index'] ?? null;
    if ($index !== null && isset($_SESSION['sections'][$index])) {
        $_SESSION['sections'][$index]['idapendice12'] = $_POST['idapendice12'] ?? null;
        $_SESSION['sections'][$index]['tasa'] = $_POST['tasa'] ?? '';
        $_SESSION['sections'][$index]['idapendice18'] = $_POST['idapendice18'] ?? null;
        $_SESSION['sections'][$index]['idapendice13'] = $_POST['idapendice13'] ?? null;
        $_SESSION['sections'][$index]['importe'] = $_POST['importe'] ?? '';
        $_SESSION['sections'][$index]['idpedimentoc'] = $_POST['idpedimentoc'] ?? null;

        // Sanitizar y validar datos
        $idapendice12 = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['idapendice12']));
        $tasa = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['tasa']));
        $idapendice18 = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['idapendice18']));
        $idapendice13 = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['idapendice13']));
        $importe = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['importe']));
        $idpedimentoc = $conexion->real_escape_string(trim($_SESSION['sections'][$index]['idpedimentoc']));

        $sql = "INSERT INTO contribuciones (idapendice12, tasa, idapendice18, idapendice13, importe, idpedimentoc) 
                VALUES ('$idapendice12', '$tasa', '$idapendice18', '$idapendice13', '$importe', '$idpedimentoc')";

        if ($conexion->query($sql) === TRUE) {
            // Los datos se han guardado correctamente
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Error: Índice de sección no válido.";
    }
}

// Manejar la solicitud para agregar una nueva sección
if (isset($_POST['add_section'])) {
    $newIndex = count($_SESSION['sections']);
    $_SESSION['sections'][$newIndex] = [
        'fraccionA' => '',
        'nico' => '',
        'vinc' => '',
        'idapendice11' => '',
        'umc' => '',
        'cantumc' => '',
        'umt' => '',
        'cant' => '',
        'idapendice4' => '',
        'pod' => '',
        'idpedimentoc' => '',
        'descripcion' => '',
        'valaduusd' => '',
        'imppreciopag' => '',
        'preciounitario' => '',
        'valoragregado' => '',
        'idapendice9' => '',
        'numpermiso' => '',
        'firmapermiso' => '',
        'valcomdls' => '',
        'cantidadumt' => '',
        'idapendice8' => '',
        'complemento1' => '',
        'complemento2' => '',
        'complemento3' => '',
        'observacionesnp' => '',
        'idapendice12' => '',
        'tasa' => '',
        'idapendice18' => '',
        'idapendice13' => '',
        'importe' => ''


    ];
}

?>

<body>

    <?php foreach ($_SESSION['sections'] as $index => $section) : ?>
        <div class="duplicate-container" id="section-<?php echo $index; ?>">
            <div class="row row-cols-auto">
                <div class="col-md-1">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SECCION.</th>
                            </tr>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-sm-8">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>FRACCION</th>
                                <th>SUBD./NICO</th>
                                <th>VINC</th>
                                <th>MET VAL</th>
                                <th>UMC</th>
                                <th>CANT UMC</th>
                                <th>UMT</th>
                                <th>CANT UMT</th>
                                <th>P.V/C</th>
                                <th>P.O/D</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            <tr>
                                <th class="text-center" colspan="11">IDENTIF</th>
                            </tr>
                            <tr>
                                <th colspan="2">VAL.ADU./USD</th>
                                <th colspan="3">IMP.PRECIO PAG.</th>
                                <th colspan="3">PRECIO UNIT.</th>
                                <th colspan="3">VAL. AGREG.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form action="" method="POST" id="form-section-<?php echo $index; ?>">
                                    <input type="hidden" name="save_section" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">

                                    <td><input type="text" name="fraccionA" value="<?php echo htmlspecialchars($section['fraccionA']); ?>" class="form-control"></td>
                                    <td><input type="text" name="nico" value="<?php echo htmlspecialchars($section['nico']); ?>" class="form-control"></td>
                                    <td><input type="text" name="vinc" value="<?php echo htmlspecialchars($section['vinc']); ?>" class="form-control"></td>
                                    <td>
                                        <div class="form-group">
                                            <?php
                                            // Consulta para obtener los valores del select
                                            $apendice11Result = $conexion->query("SELECT idapendice11, clave as clave11 FROM apendice11");

                                            if ($conexion->connect_error) {
                                                die("Conexión fallida: " . $conexion->connect_error);
                                            }
                                            ?>
                                            <select class="form-control" name="idapendice11">
                                                <?php while ($apendice11 = $apendice11Result->fetch_assoc()) : ?>
                                                    <option value="<?= htmlspecialchars($apendice11['idapendice11']) ?>" <?= ($section['idapendice11'] == $apendice11['idapendice11']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($apendice11['clave11']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td><input type="text" name="umc" value="<?php echo htmlspecialchars($section['umc']); ?>" class="form-control"></td>
                                    <td><input type="text" name="cantumc" value="<?php echo htmlspecialchars($section['cantumc']); ?>" class="form-control"></td>
                                    <td><input type="text" name="umt" value="<?php echo htmlspecialchars($section['umt']); ?>" class="form-control"></td>
                                    <td><input type="text" name="cant" value="<?php echo htmlspecialchars($section['cant']); ?>" class="form-control"></td>

                                    <td>
                                        <div class="form-group">
                                            <?php
                                            // Consulta para obtener los valores del select
                                            $apendice4Result = $conexion->query("SELECT idapendice4, clave2 as clave4 FROM apendice4");

                                            if ($conexion->connect_error) {
                                                die("Conexión fallida: " . $conexion->connect_error);
                                            }
                                            ?>
                                            <select class="form-control" name="idapendice4">
                                                <?php while ($apendice4 = $apendice4Result->fetch_assoc()) : ?>
                                                    <option value="<?= htmlspecialchars($apendice4['idapendice4']) ?>" <?= ($section['idapendice4'] == $apendice4['idapendice4']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($apendice4['clave4']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </td>

                                    <td><input type="text" name="pod" value="<?php echo htmlspecialchars($section['pod']); ?>" class="form-control"></td>
                                    <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">

                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <form action="" method="POST" id="form-section-desc-<?php echo $index; ?>">
                                    <input type="hidden" name="save_section_desc" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">

                                    <td colspan="10">
                                        <input type="text" name="descripcion" value="<?php echo htmlspecialchars($section['descripcion']); ?>" class="form-control">
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <form action="" method="POST" id="form-section-partida3-<?php echo $index; ?>">
                                    <input type="hidden" name="save_section_partida3" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                                    <td colspan="2">
                                        <input type="text" id="valaduusd-<?php echo $index; ?>" name="valaduusd" value="<?php echo htmlspecialchars($section['valaduusd']); ?>" class="form-control valaduusd" oninput="calculateImporte(<?php echo $index; ?>)">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" name="imppreciopag" value="<?php echo htmlspecialchars($section['imppreciopag']); ?>" class="form-control">
                                    </td>
                                    <td colspan="3">
                                        <input type="text" name="preciounitario" value="<?php echo htmlspecialchars($section['preciounitario']); ?>" class="form-control">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" name="valoragregado" value="<?php echo htmlspecialchars($section['valoragregado']); ?>" class="form-control">
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </td>

                                </form>
                            </tr>
                            <tr>
                                <th>PERMISO</th>
                                <th colspan="3">NUMERO DE PERMISO</th>
                                <th colspan="2">FIRMA DE PERMISO</th>
                                <th colspan="2">VAL. COM. DLS</th>
                                <th colspan="3">CANTIDAD UMT</th>
                            </tr>
                            <tr>
                                <form action="" method="POST" id="permisos-nivel-partida-<?php echo $index; ?>">
                                    <input type="hidden" name="permisos-nivel-partida" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                                    <td>
                                        <div class="form-group">
                                            <?php
                                            // Consulta para obtener los valores del select
                                            $apendice9Result = $conexion->query("SELECT idapendice9, clave as clave9 FROM apendice9");

                                            if ($conexion->connect_error) {
                                                die("Conexión fallida: " . $conexion->connect_error);
                                            }
                                            ?>
                                            <select class="form-control" name="idapendice9">
                                                <?php while ($apendice9 = $apendice9Result->fetch_assoc()) : ?>
                                                    <option value="<?= htmlspecialchars($apendice9['idapendice9']) ?>" <?= ($section['idapendice9'] == $apendice9['idapendice9']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($apendice9['clave9']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td colspan="3">
                                        <input type="text" name="numpermiso" value="<?php echo htmlspecialchars($section['numpermiso']); ?>" class="form-control">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" name="firmapermiso" value="<?php echo htmlspecialchars($section['firmapermiso']); ?>" class="form-control">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" name="valcomdls" value="<?php echo htmlspecialchars($section['valcomdls']); ?>" class="form-control">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" name="cantidadumt" value="<?php echo htmlspecialchars($section['cantidadumt']); ?>" class="form-control">
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </td>
                                </form>
                            </tr>

                            <tr>
                                <th>IDENTIF</th>
                                <th colspan="3">COMPLEMENTO 1</th>
                                <th colspan="3">COMPLEMENTO 2</th>
                                <th colspan="4">COMPLEMENTO 3</th>


                            </tr>

                            <tr>
                                <form action="" method="POST" id="form-section-complementosp-<?php echo $index; ?>">
                                    <input type="hidden" name="complementosp-nivel-partida" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">

                                    <td>
                                        <select class="form-control" id="idapendice8-<?php echo $index; ?>" name="idapendice8">
                                            <option value="">Seleccionar...</option>
                                            <?php
                                            include('../conexion.php');
                                            $apendice8Result = $conexion->query("SELECT idapendice8, clave as clave8, descripcion as descripciona8, Complemento1, Complemento2, Complemento3, nivel FROM apendice8 WHERE nivel = 'P'");
                                            while ($apendice8 = $apendice8Result->fetch_assoc()) :
                                            ?>
                                                <option value="<?= $apendice8['idapendice8'] ?>" data-complemento1="<?= htmlspecialchars($apendice8['Complemento1']) ?>" data-complemento2="<?= htmlspecialchars($apendice8['Complemento2']) ?>" data-complemento3="<?= htmlspecialchars($apendice8['Complemento3']) ?>">
                                                    <?= $apendice8['clave8'] . ' - ' . $apendice8['descripciona8'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </td>
                                    <td colspan="3">
                                        <div class="mb-3">
                                            <textarea class="form-control complemento1" id="complemento1-<?php echo $index; ?>" name="complemento1" rows="3"><?php echo htmlspecialchars($section['complemento1'] ?? ''); ?></textarea>
                                        </div>
                                    </td>
                                    <td colspan="3">
                                        <div class="mb-3">
                                            <textarea class="form-control complemento2" id="complemento2-<?php echo $index; ?>" name="complemento2" rows="3"><?php echo htmlspecialchars($section['complemento2'] ?? ''); ?></textarea>
                                        </div>
                                    </td>
                                    <td colspan="3">
                                        <div class="mb-3">
                                            <textarea class="form-control complemento3" id="complemento3-<?php echo $index; ?>" name="complemento3" rows="3"><?php echo htmlspecialchars($section['complemento3'] ?? ''); ?></textarea>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </td>
                                </form>
                            </tr>




                            <tr>
                                <th colspan="11" class="text-center table-dark">OBSERVACIONES A NIVEL PARTIDA
                                </th>

                            </tr>
                            <tr>
                                <form action="" method="POST" id="observaciones-nivel-p-<?php echo $index; ?>">
                                    <input type="hidden" name="observaciones-nivel-p" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">

                                    <td colspan="10">
                                        <input type="text" name="descripcionnp" value="<?php echo htmlspecialchars($section['descripcionnp'] ?? ''); ?>" class="form-control">
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </td>
                                </form>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>CON</th>
                                <th>TASA</th>
                                <th>T.T.</th>
                                <th>F.P.</th>
                                <th>IMPORTE</th>

                            </tr>
                        </thead>
                        <tbody>

                            <form action="" method="POST" id="contribuciones-form-<?php echo $index; ?>">
                                <tr> <input type="hidden" name="contribuciones-form" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">

                                    <td>
                                        <div class="form-group">
                                            <?php
                                            // Consulta para obtener los valores del select para idapendice12
                                            $apendice12Result = $conexion->query("SELECT idapendice12, clave AS descripcion12 FROM apendice12");

                                            if ($conexion->connect_error) {
                                                die("Conexión fallida: " . $conexion->connect_error);
                                            }
                                            ?>
                                            <select class="form-control" name="idapendice12">
                                                <?php while ($apendice12 = $apendice12Result->fetch_assoc()) : ?>
                                                    <option value="<?= htmlspecialchars($apendice12['idapendice12']) ?>" <?= ($section['idapendice12'] == $apendice12['idapendice12']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($apendice12['descripcion12']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </td>

                                    <td>
                                        <input type="text" id="tasa-<?php echo $index; ?>" name="tasa" value="<?php echo htmlspecialchars($section['tasa']); ?>" class="form-control tasa" oninput="calculateImporte(<?php echo $index; ?>)">
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <?php
                                            // Consulta para obtener los valores del select para idapendice18
                                            $apendice18Result = $conexion->query("SELECT idapendice18, clave AS descripcion18 FROM apendice18");

                                            if ($conexion->connect_error) {
                                                die("Conexión fallida: " . $conexion->connect_error);
                                            }
                                            ?>
                                            <select class="form-control" name="idapendice18">
                                                <?php while ($apendice18 = $apendice18Result->fetch_assoc()) : ?>
                                                    <option value="<?= htmlspecialchars($apendice18['idapendice18']) ?>" <?= ($section['idapendice18'] == $apendice18['idapendice18']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($apendice18['descripcion18']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <?php
                                            // Consulta para obtener los valores del select para idapendice13
                                            $apendice13Result = $conexion->query("SELECT idapendice13, clave AS descripcion13 FROM apendice13");

                                            if ($conexion->connect_error) {
                                                die("Conexión fallida: " . $conexion->connect_error);
                                            }
                                            ?>
                                            <select class="form-control" name="idapendice13">
                                                <?php while ($apendice13 = $apendice13Result->fetch_assoc()) : ?>
                                                    <option value="<?= htmlspecialchars($apendice13['idapendice13']) ?>" <?= ($section['idapendice13'] == $apendice13['idapendice13']) ? 'selected' : '' ?>>
                                                        <?= htmlspecialchars($apendice13['descripcion13']) ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </td>

                                    <td>
                                        <input type="text" id="importe-<?php echo $index; ?>" name="importe" value="<?php echo htmlspecialchars($section['importe']); ?>" class="form-control importe">
                                    </td>
                                    <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">


                                </tr>
                                <tr>
                                    <td class="text-center" colspan="5">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </td>
                                </tr>
                            </form>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <form action="" method="POST">
        <input type="hidden" name="add_section" value="1">
        <button type="submit" class="btn btn-primary">Agregar Sección</button>
    </form>

    <script>
        document.getElementById('add-section').addEventListener('click', function() {
            const form = document.createElement('form');
            form.method = 'POST';
            form.innerHTML = '<input type="hidden" name="add_section" value="1">';
            document.body.appendChild(form);
            form.submit();
        });

        function calculateImporte(index) {
            const valaduusdInput = document.querySelector(`#valaduusd-${index}`);
            const tasaInput = document.querySelector(`#tasa-${index}`);
            const importeInput = document.querySelector(`#importe-${index}`);

            const valaduusd = parseFloat(valaduusdInput.value) || 0;
            const tasa = parseFloat(tasaInput.value) || 0;

            const importe = valaduusd * tasa;

            importeInput.value = importe.toFixed(2);
        }
    </script>
</body>

</html>