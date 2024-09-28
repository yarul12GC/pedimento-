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
                <form id="bloque-b26-form-<?php echo $idSeccion; ?>" action="../admin/bloque26/insertardatosb26.php" method="post">
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
                                    <label for="CON">CON</label>
                                    <select class="form-control" name="idapendice12[]">
                                        <?php while ($apendice12 = $apendice12Result->fetch_assoc()) : ?>
                                            <option value="<?= htmlspecialchars($apendice12['idapendice12']) ?>">
                                                <?= htmlspecialchars($apendice12['descripcion12']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo de entrada para tasa -->
                            <div class="col-md-2">
                                <label for="TASA">TASA</label>

                                <input type="number" class="form-control tasa" name="tasa[]" value="" oninput="calcularPorcentaje(this)">
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
                                    <label for="T.T.">T.T.</label>

                                    <select class="form-control" name="idapendice18[]">
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
                                    <label for="F.P.">F.P.</label>

                                    <select class="form-control" name="idapendice13[]">
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
                                <label for="IMPORTE">IMPORTE</label>

                                <input type="text" class="form-control importe" name="importe[]" value="" readonly>
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
        // Obtener la fila en la que está el input actual
        var row = inputElement.closest('.contribucion-row');

        // Obtener el id de la sección
        var idSeccion = row.getAttribute('data-seccion');

        // Obtener el valor de valaduusd de los atributos data
        var valaduusd = parseFloat(row.querySelector('.valaduusd-value').getAttribute('data-valaduusd')) || 0;

        // Obtener el valor de tasa del input
        var tasa = parseFloat(row.querySelector('input[name="tasa[]"]').value) || 0;

        // Verificar que ambos campos tengan valores válidos
        if (!isNaN(tasa) && !isNaN(valaduusd)) {
            // Calcular el porcentaje y asignar el resultado al campo de importe dentro de la misma fila
            var importe = (valaduusd * tasa) / 100;
            row.querySelector('input[name="importe[]"]').value = importe.toFixed(2); // Formatear el resultado a dos decimales
        } else {
            row.querySelector('input[name="importe[]"]').value = ''; // Limpiar el campo si los valores no son válidos
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('add-contribucion-btn-<?php echo $idSeccion; ?>').addEventListener('click', function() {
            // Clonar la fila de contribución original
            var originalRow = document.querySelector('.contribucion-row[data-seccion="<?php echo $idSeccion; ?>"]');
            var clonedRow = originalRow.cloneNode(true);

            // Limpiar los valores de los inputs en la fila clonada
            clonedRow.querySelectorAll('input').forEach(input => input.value = '');

            // Añadir la nueva fila al contenedor
            document.getElementById('contribuciones-container-<?php echo $idSeccion; ?>').appendChild(clonedRow);

            // Añadir evento para los nuevos inputs clonados
            clonedRow.querySelectorAll('input').forEach(input => {
                input.addEventListener('input', function() {
                    calcularPorcentaje(this);
                });
            });
        });
    });
</script>