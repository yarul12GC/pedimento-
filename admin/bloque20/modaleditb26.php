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
                        <div class="row mb-3 contribucion-row" id="contribucion-row-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>">
                            <div class="col-md-2 text-center">
                                <span class="valaduusd-value" id="valaduusd-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>" data-valaduusdedit="<?= htmlspecialchars($rowPart3['valaduusd']); ?>">
                                    <?= htmlspecialchars($rowPart3['valaduusd']); ?>
                                </span>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice12Result = $conexion->query("SELECT idapendice12, descripcion AS descripcion12 FROM apendice12");
                                    if ($conexion->error) {
                                        die("Conexión fallida: " . $conexion->error);
                                    }
                                    ?>
                                    <label for="CON-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>">CON</label>
                                    <select class="form-control apendice12-select" id="apendice12-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>" name="idapendice12[]" onchange="toggleDtaSelectVisibility(this)">
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
                                <label for="TASA-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>">TASA</label>
                                <input type="number" class="form-control tasa" id="tasa-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>" name="tasa[]" value="<?= htmlspecialchars($rowContribuciones['tasa']); ?>" oninput="calcularContribucionedit(this)">
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice18Result = $conexion->query("SELECT idapendice18, clave AS descripcion18 FROM apendice18");
                                    if ($conexion->error) {
                                        die("Conexión fallida: " . $conexion->error);
                                    }
                                    ?>
                                    <label for="T.T.-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>">T.T.</label>
                                    <select class="form-control" id="apendice18-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>" name="idapendice18[]">
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
                                    <label for="F.P.-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>">F.P.</label>
                                    <select class="form-control" id="apendice13-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>" name="idapendice13[]">
                                        <?php while ($apendice13 = $apendice13Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice13['idapendice13']) ?>"
                                                <?= ($apendice13['idapendice13'] == $rowContribuciones['idapendice13']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($apendice13['descripcion13']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 dta-container" style="display:none;">
                                <div class="form-group">
                                    <label for="DTA-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>">DTA</label>
                                    <select class="form-control dta-select" name="dta[]" id="DTA-<?php echo $idSeccion; ?>">
                                        <option value="1" <?= ($rowContribuciones['dta'] == 1) ? 'selected' : ''; ?>>8 al millar para bienes sujetos a impuesto general de importación</option>
                                        <option value="2" <?= ($rowContribuciones['dta'] == 2) ? 'selected' : ''; ?>>1.76 al millar para bienes de activo fijo en maquiladoras</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="IMPORTE-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>">IMPORTE</label>
                                <input type="text" class="form-control importe" id="importe-<?php echo $rowContribuciones['idcontribuciones']; ?>-<?php echo $idSeccion; ?>" name="importe[]" value="<?= htmlspecialchars($rowContribuciones['importe']); ?>" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="idpedimentoc[]" value="<?= htmlspecialchars($rowContribuciones['idpedimentoc']); ?>">
                        <input type="hidden" name="section_id[]" value="<?= htmlspecialchars($rowContribuciones['section_id']); ?>">
                        <input type="hidden" name="idcontribuciones[]" value="<?= htmlspecialchars($rowContribuciones['idcontribuciones']); ?>">

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
    // Mostrar/Ocultar el select DTA al abrir el modal según la descripción
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.apendice12-select').forEach(function(selectElement) {
            toggleDtaSelectVisibility(selectElement);
        });
    });

    function toggleDtaSelectVisibility(selectElement) {
        var row = selectElement.closest('.contribucion-row');
        var descripcion12 = selectElement.selectedOptions[0].getAttribute('data-descripcion12');
        var dtaContainer = row.querySelector('.dta-container');

        // Mostrar el select DTA solo si la descripción es IVA
        if (descripcion12 === 'IVA') {
            dtaContainer.style.display = 'block';
        } else {
            dtaContainer.style.display = 'none';
        }
    }

    function calcularContribucionedit(inputElement) {
        var row = inputElement.closest('.contribucion-row');
        var valaduusd = parseFloat(row.querySelector('.valaduusd-value').getAttribute('data-valaduusdedit')) || 0;
        var tasa = parseFloat(row.querySelector('input[name="tasa[]"]').value) || 0;
        var descripcion12 = row.querySelector('.apendice12-select').selectedOptions[0].getAttribute('data-descripcion12');
        var dtaSelect = row.querySelector('.dta-select');
        var dtaValue = parseFloat(dtaSelect ? dtaSelect.value : 0) || 0;

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

            if (dtaValue === 1) {
                var dta = valaduusd * 0.008;
            } else if (dtaValue === 2) {
                var dta = valaduusd * 0.00176;
            } else if (dtaValue === 3) {
                var dta = 425.44;
            } else if (dtaValue === 4) {
                var dta = 425.44;
            } else if (dtaValue === 5) {
                var dta = 426.59;
            } else if (dtaValue === 6) {
                var dta = 417.19;
            } else if (dtaValue === 7) {
                var dta = 425.44;
            } else if (dtaValue === 71) {
                var dta = 404.01;
            } else if (dtaValue === 72) {
                var dta = 425.44;
            } else if (dtaValue === 73) {
                var dta = 409.59;
            } else if (dtaValue === 8) {
                var dta = Math.min(valaduusd * 0.008, 4508.07);
            }

            var tasav = tasa / 100;

            if (descripcion12 === 'IGI') {
                var igiImporte = valaduusd * tasav;
                row.querySelector('input[name="importe[]"]').value = igiImporte.toFixed(2);
            } else if (descripcion12 === 'IVA') {
                if (igiValue >= 0) {
                    var ivaImporte = (valaduusd + igiValue + dta) * tasav;
                    row.querySelector('input[name="importe[]"]').value = ivaImporte.toFixed(2);
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