<?php
function fetchData($conexion, $query, $pedimento_id, $sectionKey, &$secciones)
{
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $pedimento_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $secciones[$row['section_id']][$sectionKey][] = $row;
        }
    }
}

$secciones = [];

$queries = [
    'partida1' => "SELECT p.*, 
    a11.clave AS claveapp11, 
    a4.clave2 AS claveapp4 
FROM partida1 p
INNER JOIN apendice11 a11 ON p.idapendice11 = a11.idapendice11
INNER JOIN apendice4 a4 ON p.idapendice4 = a4.idapendice4
WHERE p.idpedimentoc = ? ORDER BY section_id",
    'partida2' => "SELECT * FROM partida2 WHERE idpedimentoc = ? ORDER BY section_id",
    'partida3' => "SELECT * FROM partida3 WHERE idpedimentoc = ? ORDER BY section_id",
    'permisos' => "SELECT per.*, 
           ap9.clave AS claveapendice9 
    FROM permisop per 
    INNER JOIN apendice9 ap9 ON per.idapendice9 = ap9.idapendice9 
    WHERE per.idpedimentoc = ? 
    ORDER BY per.section_id
",
    'complementos' => "SELECT compl.*,
       ap8.clave AS claveapendice8p 
        FROM complementosp compl
        INNER JOIN apendice8 ap8 ON compl.idapendice8 = ap8.idapendice8 
         WHERE compl.idpedimentoc = ? 
         ORDER BY compl.section_id",
    'observaciones' => "SELECT * FROM observacionesnp WHERE idpedimentoc = ? ORDER BY section_id",
    'contribuciones' => "SELECT cont.*,
            ap12.descripcion AS claveapendice12p, 
             ap13.clave AS claveapendice13p,
             ap18.clave AS claveapendice18p 
FROM contribuciones cont
INNER JOIN apendice12 ap12 ON cont.idapendice12 = ap12.idapendice12
INNER JOIN apendice13 ap13 ON cont.idapendice13 = ap13.idapendice13
INNER JOIN apendice18 ap18 on cont.idapendice18 = ap18.idapendice18
WHERE cont.idpedimentoc = ? ORDER BY cont.section_id"
];

// Ejecutar las consultas
foreach ($queries as $key => $query) {
    fetchData($conexion, $query, $pedimento_id, $key, $secciones);
}

$lastSectionId = !empty($secciones) ? max(array_keys($secciones)) : 0;
$newSectionId = $lastSectionId + 1;
?>

<div id="sections-container">
    <?php foreach ($secciones as $idSeccion => $data): ?>
        <div class="duplicate-container" data-section-id="<?php echo $idSeccion; ?>">
            <div class="row row-cols-auto table-section">
                <div class="col-md-1">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SECCION.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="15" class="text-center"><?php echo htmlspecialchars($idSeccion); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-8">
                    <!-- Tabla para partida1 -->
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="table-primary text-center">
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
                            </tr>
                            <tr class="table-secondary text-center">
                                <th class="text-center" colspan="11">IDENTIF</th>
                            </tr>
                            <tr class="table-info text-center">
                                <th colspan="3">VAL.ADU./USD</th>
                                <th colspan="2">IMP.PRECIO PAG.</th>
                                <th colspan="2">PRECIO UNIT.</th>
                                <th colspan="3">VAL. AGREG.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cuadropart1 = $data['partida1'] ?? [];
                            foreach ($cuadropart1 as $sectionData):
                            ?>
                                <tr class="table-primary text-center">
                                    <td><?php echo htmlspecialchars($sectionData['fraccionA']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['nico']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['vinc']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['claveapp11']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['umc']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['cantumc']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['umt']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['cant']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['claveapp4']); ?></td>
                                    <td><?php echo htmlspecialchars($sectionData['pod']); ?> <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalB20-<?php echo $idSeccion; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button></td>

                                </tr>


                            <?php endforeach; ?>

                            <?php if (!empty($data['partida2'])): ?>
                                <?php foreach ($data['partida2'] as $rowPart2): ?>
                                    <tr class="table-secondary text-center">
                                        <td colspan="9" class="text-center"><?php echo htmlspecialchars($rowPart2['descripcion']); ?></td>
                                        <td class="text-center"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaeditlB21-<?php echo $idSeccion; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="10" class="text-left">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalB21-<?php echo $idSeccion; ?>">
                                            <i class="fas fa-database"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php if (!empty($data['partida3'])): ?>
                                <?php foreach ($data['partida3'] as $rowPart3): ?>
                                    <tr class="table-info text-center">
                                        <td colspan="2"><?php echo htmlspecialchars($rowPart3['valaduusd']); ?></td>
                                        <td colspan="2"><?php echo htmlspecialchars($rowPart3['imppreciopag']); ?></td>
                                        <td colspan="2"><?php echo htmlspecialchars($rowPart3['preciounitario']); ?></td>
                                        <td colspan="3"><?php echo htmlspecialchars($rowPart3['valoragregado']); ?></td>
                                        <td class="text-center"> <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaeditlB22-<?php echo $idSeccion; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button> </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <td colspan="10" class="text-left">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalB22-<?php echo $idSeccion; ?>">
                                        <i class="fas fa-database"></i>
                                    </button>
                                </td>
                            <?php endif; ?>

                            <tr>
                                <th colspan="1">PERMISO</th>
                                <th colspan="3">NUMERO DE PERMISO</th>
                                <th colspan="2">FIRMA DE PERMISO</th>
                                <th colspan="2">VAL. COM. DLS</th>
                                <th colspan="2">CANTIDAD UMT</th>
                            </tr>

                            <?php if (!empty($data['permisos'])): ?>
                                <?php foreach ($data['permisos'] as $rowPermisos): ?>
                                    <tr>
                                        <td colspan="1"><?php echo htmlspecialchars($rowPermisos['claveapendice9']); ?></td>
                                        <td colspan="2"><?php echo htmlspecialchars($rowPermisos['numpermiso']); ?></td>
                                        <td colspan="2"><?php echo htmlspecialchars($rowPermisos['firmapermiso']); ?></td>
                                        <td colspan="2"><?php echo htmlspecialchars($rowPermisos['valcomdls']); ?></td>
                                        <td colspan="2"><?php echo htmlspecialchars($rowPermisos['cantidadumt']); ?></td>
                                        <td class="text-center"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaeditlB23-<?php echo $idSeccion; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <td colspan="10" class="text-left">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalB23-<?php echo $idSeccion; ?>">
                                        <i class="fas fa-database"></i>
                                    </button>
                                </td>
                            <?php endif; ?>

                            <tr>
                                <th colspan="2" class="text-center">IDENTIF</th>
                                <th colspan="3" class="text-center">COMPLEMENTO 1</th>
                                <th colspan="2" class="text-center">COMPLEMENTO 2</th>
                                <th colspan="3" class="text-center">COMPLEMENTO 3</th>
                            </tr>

                            <?php if (!empty($data['complementos'])): ?>
                                <?php foreach ($data['complementos'] as $rowcomplementos): ?>
                                    <tr>
                                        <td colspan="2" class="text-center"><?php echo htmlspecialchars($rowcomplementos['claveapendice8p']); ?></td>
                                        <td colspan="3" class="text-center"><?php echo htmlspecialchars($rowcomplementos['complemento1']); ?></td>
                                        <td colspan="2" class="text-center"><?php echo htmlspecialchars($rowcomplementos['complemento2']); ?></td>
                                        <td colspan="3" class="text-center"><?php echo htmlspecialchars($rowcomplementos['complemento3']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="9"></td>

                                    <td class="text-center"> <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaeditlB24-<?php echo $idSeccion; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button></td>

                                </tr>
                            <?php else: ?>
                                <td colspan="10" class="text-left">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalB24-<?php echo $idSeccion; ?>">
                                        <i class="fas fa-database"></i>
                                    </button>
                                </td>
                            <?php endif; ?>

                            <tr>
                                <td colspan="10" class="text-center table-dark">OBSERVACIONES A NIVEL PARTIDA</td>
                            </tr>

                            <?php if (!empty($data['observaciones'])): ?>
                                <?php foreach ($data['observaciones'] as $rowObservaciones): ?>
                                    <tr>
                                        <td colspan="10"><?php echo htmlspecialchars($rowObservaciones['descripcionnp']); ?></td>

                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="9"></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaeditlB25-<?php echo $idSeccion; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <td colspan="10" class="text-left">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalB25-<?php echo $idSeccion; ?>">
                                        <i class="fas fa-database"></i>
                                    </button>
                                </td>
                            <?php endif; ?>

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
                            <?php if (!empty($data['contribuciones'])): ?>
                                <?php foreach ($data['contribuciones'] as $rowContribuciones): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($rowContribuciones['claveapendice12p']); ?></td>
                                        <td><?php echo htmlspecialchars($rowContribuciones['tasa']); ?></td>
                                        <td><?php echo htmlspecialchars($rowContribuciones['claveapendice18p']); ?></td>
                                        <td><?php echo htmlspecialchars($rowContribuciones['claveapendice13p']); ?></td>
                                        <td><?php echo htmlspecialchars($rowContribuciones['importe']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="5" class="text-end">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaeditlB26-<?php echo $idSeccion; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <td colspan="10" class="text-left">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalB26-<?php echo $idSeccion; ?>">
                                        <i class="fas fa-database"></i>
                                    </button>
                                </td>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        include 'bloque20/modalb21.php';
        include 'bloque20/modalb22.php';
        include 'bloque20/modalb23.php';
        include 'bloque20/modalb24.php';
        include 'bloque20/modalb25.php';
        include 'bloque20/modalb26.php';
        include 'bloque20/modaleditb20.php';
        include 'bloque20/modaleditb21.php';
        include 'bloque20/modaleditb22.php';
        include 'bloque20/modalb23edit.php';
        include 'bloque20/modaleditb24.php';
        include 'bloque20/modaledit25.php';
        include 'bloque20/modaleditb26.php';








        ?>
    <?php endforeach; ?>
</div>

<button id="add-section-button" class="btn btn-primary">Agregar Sección</button>

<script>
    document.getElementById('add-section-button').addEventListener('click', function() {
        const container = document.getElementById('sections-container');
        const newSectionId = <?php echo json_encode($newSectionId); ?>;

        const sectionHTML = `
        <div class="duplicate-container" data-section-id="${newSectionId}">
            <div class="row row-cols-auto table-section">
                <div class="col-md-1">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SECCION.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="15" class="text-center">${newSectionId}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-8">
                    <!-- Tabla para partida1 vacía -->
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
                            </tr>
                            <tr>
                                <th class="text-center" colspan="10">IDENTIF</th>
                            </tr>
                            <tr>
                                <th colspan="3">VAL.ADU./USD</th>
                                <th colspan="2">IMP.PRECIO PAG.</th>
                                <th colspan="2">PRECIO UNIT.</th>
                                <th colspan="3">VAL. AGREG.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left" colspan="10"><button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#bloque020">
                                    <i class="fas fa-database"></i></button>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center" colspan="10">
                                </td>
                            </tr>
                            <tr>
                               <td class="text-center" colspan="10">
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">PERMISO</th>
                                <th colspan="2">NUMERO DE PERMISO</th>
                                <th colspan="2">FIRMA DE PERMISO</th>
                                <th colspan="2">VAL. COM. DLS</th>
                                <th colspan="2">CANTIDAD UMT</th>
                                
                            </tr>

                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                            </tr>

                            <tr>
                                <th colspan="2">IDENTIF</th>
                                <th colspan="3">COMPLEMENTO 1</th>
                                <th colspan="2">COMPLEMENTO 2</th>
                                <th colspan="3">COMPLEMENTO 3</th>
                            </tr>

                            <tr>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                                <td colspan="2"></td>
                                <td colspan="3"></td>
                            </tr>
                              <tr>
                                <td colspan="10" class="text-center table-dark">OBSERVACIONES A NIVEL PARTIDA</td>
                            </tr>
                            <tr>
                                <td colspan="10"></td>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    `;

        container.insertAdjacentHTML('beforeend', sectionHTML);
    });
</script>


<?php
include 'bloque20/modalb20.php';
?>