<div class="modal fade" id="modaeditlB26-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px" alt="Logo"> EDITAR INFORMACION
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../user/bloque26/editardatosb26.php" method="post">
                    <?php foreach ($data['contribuciones'] as $rowContribuciones): ?>
                        <div class="row mb-3 contribucion-row">
                            <div class="col-md-2" style="display: none;">
                                <span class="valaduusd-value" data-valaduusd="<?= htmlspecialchars($rowPart3['valaduusd']); ?>"></span>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php
                                    $apendice12Result = $conexion->query("SELECT idapendice12, clave AS descripcion12, descripcion AS descripap12 FROM apendice12");
                                    if ($conexion->error) {
                                        die("Conexión fallida: " . $conexion->error);
                                    }
                                    ?>
                                    <label for="CON">CON</label>
                                    <select class="form-control" name="idapendice12[]">
                                        <?php while ($apendice12 = $apendice12Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice12['idapendice12']) ?>"
                                                <?= ($apendice12['idapendice12'] == $rowContribuciones['idapendice12']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($apendice12['descripcion12'].$apendice12['descripap12']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="TASA">TASA</label>
                                <input type="number" class="form-control tasa" name="tasa[]" value="<?= htmlspecialchars($rowContribuciones['tasa']); ?>" oninput="calcularPorcentaje(this)">
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
                                    <label for="T.T.">T.T.</label>
                                    <select class="form-control" name="idapendice18[]">
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
                                    <label for="F.P.">F.P.</label>
                                    <select class="form-control" name="idapendice13[]">
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
                                <label for="IMPORTE">IMPORTE</label>
                                <input type="text" class="form-control importe" name="importe[]" value="<?= htmlspecialchars($rowContribuciones['importe']); ?>" readonly>
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
    function calcularPorcentaje(inputElement) {
        // Obtener la fila en la que está el input actual
        var row = inputElement.closest('.contribucion-row');

        // Obtener el valor de valaduusd desde el span oculto en la misma fila
        var valaduusd = parseFloat(row.querySelector('.valaduusd-value').getAttribute('data-valaduusd')) || 0;

        // Obtener el valor del input de tasa
        var tasa = parseFloat(inputElement.value) || 0;

        // Verificar si ambos valores son válidos
        if (!isNaN(tasa) && !isNaN(valaduusd)) {
            // Calcular el porcentaje
            var importe = (valaduusd * tasa) / 100;

            // Colocar el valor en el campo de importe correspondiente
            row.querySelector('input[name="importe[]"]').value = importe.toFixed(2); // Dos decimales
        } else {
            // Si no son válidos, limpiar el campo importe
            row.querySelector('input[name="importe[]"]').value = '';
        }
    }
</script>