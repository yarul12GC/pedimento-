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
            'valoragregado' => $_POST['valoragregado'] ?? ''

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
        'valoragregado' => ''
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
                                        <button type="submit" class="btn btn-success"></button>
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <form action="" method="POST" id="form-section-partida3-<?php echo $index; ?>">
                                    <input type="hidden" name="save_section_partida3" value="1">
                                    <input type="hidden" name="index" value="<?php echo $index; ?>">
                                    <td colspan="2">
                                        <input type="text" name="valaduusd" value="<?php echo htmlspecialchars($section['valaduusd']); ?>" class="form-control">
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
                                        <button type="submit" class="btn btn-success"></button>
                                    </td>

                                </form>
                            </tr>
                            <tr>
                                <th colspan="2">PERMISO</th>
                                <th colspan="2">NUMERO DE PERMISO</th>
                                <th colspan="2">FIRMA DE PERMISO</th>
                                <th colspan="2">VAL. COM. DLS</th>
                                <th colspan="3">CANTIDAD UMT</th>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-success"></button>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">IDENTIF</th>
                                <th colspan="3">COMPLEMENTO 1</th>
                                <th colspan="3">COMPLEMENTO 2</th>
                                <th colspan="3">COMPLEMENTO 3</th>


                            </tr>

                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-success"></button>
                                </td>
                            </tr>

                            <tr>
                                <th colspan="11" class="text-center table-dark">OBSERVACIONES A NIVEL PARTIDA
                                </th>

                            </tr>
                            <tr>
                                <td colspan="10"></td>
                                <td class="text-center">
                                    <button type="submit" class="btn btn-success"></button>
                                </td>
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
                                <th>IMP.</th>
                                <td><button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#bloque2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0" />
                                            <path d="M12.096 6.223A5 5 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.5 4.5 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-.813-.927Q8.378 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.6 4.6 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10q.393 0 .774-.024a4.5 4.5 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777M3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4" />
                                        </svg>
                                    </button></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="11"></td>

                            </tr>
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
    </script>
</body>

</html>