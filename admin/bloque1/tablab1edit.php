<?php
$pedimento_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para obtener los datos del pedimento relacionado
$querydpm = "SELECT dp.*, 
                    a2.clave AS clave_apendice2,
                    a16.clave AS clave_apendice16
            FROM dpedimento dp
            INNER JOIN apendice2 a2 ON dp.idapendice2 = a2.idapendice2
            INNER JOIN apendice16 a16 ON dp.idapendice16 = a16.idapendice16
            WHERE idpedimentoc = ?";
$stmtdpm = $conexion->prepare($querydpm);
$stmtdpm->bind_param("i", $pedimento_id);
$stmtdpm->execute();
$resultdpm = $stmtdpm->get_result();

if ($resultdpm->num_rows > 0) {
    $datodpm = $resultdpm->fetch_assoc();
?>
    <table class="table table-bordered table-hover">
        <tr>
            <th>NUM.PEDIMENTO</th>
            <td><?php echo htmlspecialchars($datodpm['Nopedimento']); ?></td>
            <th>T.OPER</th>
            <td><?php echo htmlspecialchars($datodpm['Toper']); ?></td>
            <th>CVE PEDIMENTO</th>
            <td><?php echo htmlspecialchars($datodpm['clave_apendice2']); ?></td>
            <th>REGIMEN</th>
            <td><?php echo htmlspecialchars($datodpm['clave_apendice16']); ?></td>
        </tr>
    </table>
    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarBloque1_<?php echo $pedimento_id; ?>">
        Editar Bloque 1
    </button>
<?php
} else {
?>
    <table class="table table-bordered table-hover">
        <tr>
            <th>NUM.PEDIMENTO</th>
            <td></td>
            <th>T.OPER</th>
            <td></td>
            <th>CVE PEDIMENTO</th>
            <td></td>
            <th>REGIMEN</th>
            <td></td>
        </tr>
    </table>
    <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-database"></i>
    </button>
<?php
}
?>

<!-- Modal para editar Bloque 1 -->
<div class="modal fade" id="editarBloque1_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="editarBloque1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editarBloque1Label">
                    <img src="../media/locenca.png" width="40px"> EDITAR BLOQUE 1
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-a-edit-form" action="../admin/bloque1/actualizar_datos.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-anio_validacion">AÑO DE VALIDACIÓN (2 DÍGITOS)</label>
                                <input type="text" class="form-control" id="edit-num-pedimento-1" name="anio_validacion" maxlength="2"
                                    oninput="concatenarPedimentoEdit()" value="<?php echo htmlspecialchars($datodpm['anio_validacion']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit-clave_aduana">CLAVE DE LA ADUANA DE DESPACHO (APENDICE 1)</label>
                                <input type="text" class="form-control" id="edit-num-pedimento-2" name="clave_aduana" maxlength="2"
                                    oninput="concatenarPedimentoEdit()" value="<?php echo htmlspecialchars($datodpm['clave_aduana']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit-patente">CLAVE DE LA PATENTE DEL AGENTE ADUANAL (4 DÍGITOS)</label>
                                <input type="text" class="form-control" id="edit-num-pedimento-3" name="patente" maxlength="4"
                                    oninput="concatenarPedimentoEdit()" value="<?php echo htmlspecialchars($datodpm['patente']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit-ultimo_digito_anio">EL ÚLTIMO DÍGITO DEL AÑO EN CURSO (1 DÍGITO)</label>
                                <input type="text" class="form-control" id="edit-num-pedimento-4" name="ultimo_digito_anio" maxlength="1"
                                    oninput="concatenarPedimentoEdit()" value="<?php echo htmlspecialchars($datodpm['ultimo_digito_anio']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit-numeracion_progresiva">NUMERACIÓN PROGRESIVA (6 DÍGITOS)</label>
                                <input type="text" class="form-control" id="edit-num-pedimento-5" name="numeracion_progresiva" maxlength="6"
                                    oninput="concatenarPedimentoEdit()" value="<?php echo htmlspecialchars($datodpm['numeracion_progresiva']); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-num-pedimento-completo">NUM. PEDIMENTO COMPLETO</label>
                                <input type="text" class="form-control" id="edit-num-pedimento-completo" name="Nopedimento" readonly
                                    value="<?php echo htmlspecialchars($datodpm['Nopedimento']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="edit-toper">T.OPER</label>
                                <input type="text" class="form-control" id="edit-toper" name="Toper" value="<?php echo htmlspecialchars($datodpm['Toper']); ?>" required>
                            </div>
                            <div class="form-group">
                                <?php
                                // Consulta para obtener los datos de apendice2
                                $apendice2Result = $conexion->query("SELECT idapendice2, clave FROM apendice2");

                                // Consulta para obtener los datos de apendice16
                                $apendice16Result = $conexion->query("SELECT idapendice16, clave AS clave16 FROM apendice16");
                                ?>
                                <label for="edit-idapendice2">CVE PEDIMENTO (APENDICE2)</label><br>
                                <select class="form-control" name="idapendice2">
                                    <?php while ($apendice2 = $apendice2Result->fetch_assoc()): ?>
                                        <option value="<?= $apendice2['idapendice2'] ?>" <?= $datodpm['idapendice2'] == $apendice2['idapendice2'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($apendice2['clave']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit-idapendice16">REGIMEN (APENDICE16)</label><br>
                                <select class="form-control" name="idapendice16">
                                    <?php while ($apendice16 = $apendice16Result->fetch_assoc()): ?>
                                        <option value="<?= $apendice16['idapendice16'] ?>" <?= $datodpm['idapendice16'] == $apendice16['idapendice16'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($apendice16['clave16']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <input type="hidden" name="idpedimento" value="<?php echo htmlspecialchars($datodpm['idpedimento']); ?>">
                            <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Actualizar Bloque 1</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function concatenarPedimentoEdit() {
        var campo1 = document.getElementById('edit-num-pedimento-1').value;
        var campo2 = document.getElementById('edit-num-pedimento-2').value;
        var campo3 = document.getElementById('edit-num-pedimento-3').value;
        var campo4 = document.getElementById('edit-num-pedimento-4').value;
        var campo5 = document.getElementById('edit-num-pedimento-5').value;

        var resultado = campo1 + campo2 + campo3 + campo4 + campo5;
        document.getElementById('edit-num-pedimento-completo').value = resultado;
    }
</script>