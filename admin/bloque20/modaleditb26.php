<div class="modal fade" id="modaeditlB26-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel-<?php echo $idSeccion; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel-<?php echo $idSeccion; ?>">
                    <img src="../media/locenca.png" width="40px" alt="Logo"> EDITAR INFORMACION
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../admin/bloque26/editardatosb26.php" method="post">
                    <?php foreach ($data['contribuciones'] as $rowContribuciones): ?>
                        <div class="row mb-3 contribucion-row" id="contribucion-row-<?php echo $rowContribuciones['idcontribuciones']; ?>">
                            <div class="col-md-2" style="display: none;">
                                <span class="valaduusd-value" id="valaduusd-<?php echo $rowContribuciones['idcontribuciones']; ?>" data-valaduusd="<?= htmlspecialchars($rowPart3['valaduusd']); ?>"></span>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice12Result = $conexion->query("SELECT idapendice12, descripcion AS descripcion12 FROM apendice12");
                                    if ($conexion->error) {
                                        die("Conexión fallida: " . $conexion->error);
                                    }
                                    ?>
                                    <label for="CON-<?php echo $rowContribuciones['idcontribuciones']; ?>">CON</label>
                                    <select class="form-control apendice12-select" id="apendice12-<?php echo $rowContribuciones['idcontribuciones']; ?>" name="idapendice12[]">
                                        <?php while ($apendice12 = $apendice12Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice12['idapendice12']) ?>"
                                                <?= ($apendice12['idapendice12'] == $rowContribuciones['idapendice12']) ? 'selected' : '' ?>
                                                data-descripcion12="<?= htmlspecialchars($apendice12['descripcion12']) ?>">
                                                <?= htmlspecialchars($apendice12['descripcion12']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="TASA-<?php echo $rowContribuciones['idcontribuciones']; ?>">TASA</label>
                                <input type="number" class="form-control tasa" id="tasa-<?php echo $rowContribuciones['idcontribuciones']; ?>" name="tasa[]" value="<?= htmlspecialchars($rowContribuciones['tasa']); ?>" oninput="calcularPorcentajeEdit(this)">
                            </div>

                            <!-- Campo de selección para idapendice18 -->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice18Result = $conexion->query("SELECT idapendice18, clave AS descripcion18 FROM apendice18");
                                    if ($conexion->error) {
                                        die("Conexión fallida: " . $conexion->error);
                                    }
                                    ?>
                                    <label for="T.T.-<?php echo $rowContribuciones['idcontribuciones']; ?>">T.T.</label>
                                    <select class="form-control" id="apendice18-<?php echo $rowContribuciones['idcontribuciones']; ?>" name="idapendice18[]">
                                        <?php while ($apendice18 = $apendice18Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice18['idapendice18']) ?>"
                                                <?= ($apendice18['idapendice18'] == $rowContribuciones['idapendice18']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($apendice18['descripcion18']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo de selección para idapendice13 -->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice13Result = $conexion->query("SELECT idapendice13, clave AS descripcion13 FROM apendice13");
                                    if ($conexion->error) {
                                        die("Conexión fallida: " . $conexion->error);
                                    }
                                    ?>
                                    <label for="F.P.-<?php echo $rowContribuciones['idcontribuciones']; ?>">F.P.</label>
                                    <select class="form-control" id="apendice13-<?php echo $rowContribuciones['idcontribuciones']; ?>" name="idapendice13[]">
                                        <?php while ($apendice13 = $apendice13Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice13['idapendice13']) ?>"
                                                <?= ($apendice13['idapendice13'] == $rowContribuciones['idapendice13']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($apendice13['descripcion13']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="IMPORTE-<?php echo $rowContribuciones['idcontribuciones']; ?>">IMPORTE</label>
                                <input type="text" class="form-control importe" id="importe-<?php echo $rowContribuciones['idcontribuciones']; ?>" name="importe[]" value="<?= htmlspecialchars($rowContribuciones['importe']); ?>" readonly>
                            </div>
                            <input type="hidden" name="idpedimentoc[]" value="<?= htmlspecialchars($rowContribuciones['idpedimentoc']); ?>">
                            <input type="hidden" name="section_id[]" value="<?= htmlspecialchars($rowContribuciones['section_id']); ?>">
                            <input type="hidden" name="idcontribuciones[]" value="<?= htmlspecialchars($rowContribuciones['idcontribuciones']); ?>">
                        </div>
                    <?php endforeach; ?>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Actualizar Bloque</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function calcularPorcentajeEdit(inputElement) {
        var row = inputElement.closest('.contribucion-row');
        var valaduusd = parseFloat(row.querySelector('.valaduusd-value').getAttribute('data-valaduusd')) || 0;
        var tasa = parseFloat(inputElement.value) || 0;
        var descripcion12 = row.querySelector('.apendice12-select').selectedOptions[0].getAttribute('data-descripcion12');

        var rows = document.querySelectorAll('.contribucion-row');
        var igiValue = 0;
        rows.forEach(function(r) {
            var descripcion = r.querySelector('.apendice12-select').selectedOptions[0].getAttribute('data-descripcion12');
            if (descripcion === 'IGI') {
                var igiInput = r.querySelector('input[name="importe[]"]');
                igiValue = parseFloat(igiInput.value) || 0;
            }
        });

        if (!isNaN(tasa) && !isNaN(valaduusd)) {
            var dta = valaduusd * 0.008;
            var tasav = tasa / 100;

            if (descripcion12 === 'IGI') {
                var igiImporte = valaduusd * tasav;
                row.querySelector('input[name="importe[]"]').value = igiImporte.toFixed(2);
                row.querySelector('input[name="importe[]"]').setAttribute('data-igi-added', 'true');
                console.log('IGI calculado:', igiImporte);
            } else if (descripcion12 === 'IVA') {
                if (igiValue >= 0) {
                    var ivaImporte = (valaduusd + igiValue + dta) * tasav;
                    row.querySelector('input[name="importe[]"]').value = ivaImporte.toFixed(2);
                    console.log('IVA calculado:', ivaImporte);
                } else {
                    alert('Debe declarar el IGI antes de calcular el IVA.');
                    row.querySelector('input[name="importe[]"]').value = '';
                }
            }
        } else {
            row.querySelector('input[name="importe[]"]').value = '';
        }
    }
</script>