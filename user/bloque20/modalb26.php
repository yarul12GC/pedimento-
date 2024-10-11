<div class="modal fade" id="modalB26-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> REGISTRAR BLOQUE 26
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-b26-form-<?php echo $idSeccion; ?>" action="../user/bloque26/insertardatosb26.php" method="post">
                    <div id="contribuciones-container-<?php echo $idSeccion; ?>">
                        <div class="row contribucion-row" data-seccion="<?php echo $idSeccion; ?>">
                            <!-- Campo de selección para idapendice12 -->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice12Result = $conexion->query("SELECT idapendice12, descripcion AS descripcion12 FROM apendice12");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="CON-<?php echo $idSeccion; ?>">CON</label>
                                    <select class="form-control apendice12-select" name="idapendice12[]" id="CON-<?php echo $idSeccion; ?>">
                                        <?php while ($apendice12 = $apendice12Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice12['idapendice12']) ?>" data-descripcion12="<?= htmlspecialchars($apendice12['descripcion12']) ?>">
                                                <?= htmlspecialchars($apendice12['descripcion12']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo de entrada para tasa -->
                            <div class="col-md-2">
                                <label for="TASA-<?php echo $idSeccion; ?>">TASA</label>
                                <input type="number" class="form-control tasa" name="tasa[]" id="TASA-<?php echo $idSeccion; ?>" value="" oninput="calcularPorcentaje(this)">
                            </div>

                            <!-- Contenedor oculto para valaduusd -->
                            <div class="col-md-2" style="display: none;">
                                <span class="valaduusd-value" data-valaduusd="<?= htmlspecialchars($rowPart3['valaduusd']); ?>"></span>
                            </div>

                            <!-- Campo de selección para idapendice18 -->
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice18Result = $conexion->query("SELECT idapendice18, clave AS descripcion18 FROM apendice18");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="T.T.-<?php echo $idSeccion; ?>">T.T.</label>
                                    <select class="form-control" name="idapendice18[]" id="T.T.-<?php echo $idSeccion; ?>">
                                        <?php while ($apendice18 = $apendice18Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice18['idapendice18']) ?>">
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
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="F.P.-<?php echo $idSeccion; ?>">F.P.</label>
                                    <select class="form-control" name="idapendice13[]" id="F.P.-<?php echo $idSeccion; ?>">
                                        <?php while ($apendice13 = $apendice13Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice13['idapendice13']) ?>">
                                                <?= htmlspecialchars($apendice13['descripcion13']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo de entrada para importe -->
                            <div class="col-md-2">
                                <label for="IMPORTE-<?php echo $idSeccion; ?>">IMPORTE</label>
                                <input type="text" class="form-control importe" name="importe[]" id="IMPORTE-<?php echo $idSeccion; ?>" value="" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Campo oculto para idpedimentoc -->
                    <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">
                    <input type="hidden" name="section_id" value="<?php echo $idSeccion; ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="add-contribucion-btn-<?php echo $idSeccion; ?>">Agregar Contribución</button>
                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function calcularPorcentaje(inputElement) {
        var row = inputElement.closest('.contribucion-row');
        var valaduusd = parseFloat(row.querySelector('.valaduusd-value').getAttribute('data-valaduusd')) || 0;
        var tasa = parseFloat(row.querySelector('input[name="tasa[]"]').value) || 0;
        var descripcion12 = row.querySelector('.apendice12-select').selectedOptions[0].getAttribute('data-descripcion12');

        var rows = document.querySelectorAll('.contribucion-row[data-seccion="' + row.getAttribute('data-seccion') + '"]');

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

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('add-contribucion-btn-<?php echo $idSeccion; ?>').addEventListener('click', function() {
            var originalRow = document.querySelector('.contribucion-row[data-seccion="<?php echo $idSeccion; ?>"]');
            var clonedRow = originalRow.cloneNode(true);

            clonedRow.querySelectorAll('input').forEach(input => {
                input.value = '';
                input.setAttribute('data-igi-added', 'false');
            });

            document.getElementById('contribuciones-container-<?php echo $idSeccion; ?>').appendChild(clonedRow);
        });
    });
</script>