<body>
    <div class="modal fade" id="bloque10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <img src="../media/locenca.png" width="40px"> CAPTURA DEL BLOQUE 10
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../user/bloque10/insertardatosb10.php" method="post">
                        <div id="tasa-container">
                            <div class="row tasa-entry">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                        include('../conexion.php');
                                        $apendice12Result = $conexion->query("SELECT idapendice12, clave as clave12, descripcion AS descripcionAP12 FROM apendice12");
                                        if ($conexion->connect_error) {
                                            die("Conexión fallida: " . $conexion->connect_error);
                                        }
                                        ?>
                                        <label for="agenteSelect">CONTRIB (APENDICE 12)</label><br>
                                        <select class="form-control" name="idapendice12[]">
                                            <?php while ($apendice12 = $apendice12Result->fetch_assoc()): ?>
                                                <option value="<?= $apendice12['idapendice12'] ?>"><?= $apendice12['clave12'].$apendice12['descripcionAP12'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <?php
                                        $apendice18Result = $conexion->query("SELECT idapendice18, clave as clave18 FROM apendice18");
                                        if ($conexion->connect_error) {
                                            die("Conexión fallida: " . $conexion->connect_error);
                                        }
                                        ?>
                                        <label for="agenteSelect">CVE. T.TASA (APENDICE 18)</label><br>
                                        <select class="form-control" name="idapendice18[]">
                                            <?php while ($apendice18 = $apendice18Result->fetch_assoc()): ?>
                                                <option value="<?= $apendice18['idapendice18'] ?>"><?= $apendice18['clave18'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bloque-b-campo1">TASA</label>
                                        <input type="text" class="form-control" name="tasa[]" required>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="agregar-tasa-btn">Agregar Tasa</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Bloque 10 -->
    <div class="modal fade" id="editarBloque10_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="editarBloque10Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarBloque10Label">
                        <img src="../media/locenca.png" width="40px"> EDITAR BLOQUE 10
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editar-bloque-b-form" action="../user/bloque10/editarDatosb10.php" method="post">
                        <div id="editar-tasa-container">
                            <?php foreach ($cuadrotasasp as $index => $rowtsp): ?>
                                <div class="row tasa-entry">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contribEdit_<?php echo $index; ?>">CONTRIB (APENDICE 12)</label><br>
                                            <select class="form-control" id="contribEdit_<?php echo $index; ?>" name="idapendice12[]">
                                                <?php
                                                $apendice12Result = $conexion->query("SELECT idapendice12, clave as clave12 FROM apendice12");
                                                while ($apendice12 = $apendice12Result->fetch_assoc()): ?>
                                                    <option value="<?= $apendice12['idapendice12']; ?>" <?= $apendice12['idapendice12'] == $rowtsp['idapendice12'] ? 'selected' : ''; ?>>
                                                        <?= $apendice12['clave12']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="cveTasaEdit_<?php echo $index; ?>">CVE. T.TASA (APENDICE 18)</label><br>
                                            <select class="form-control" id="cveTasaEdit_<?php echo $index; ?>" name="idapendice18[]">
                                                <?php
                                                $apendice18Result = $conexion->query("SELECT idapendice18, clave as clave18 FROM apendice18");
                                                while ($apendice18 = $apendice18Result->fetch_assoc()): ?>
                                                    <option value="<?= $apendice18['idapendice18']; ?>" <?= $apendice18['idapendice18'] == $rowtsp['idapendice18'] ? 'selected' : ''; ?>>
                                                        <?= $apendice18['clave18']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tasaEdit_<?php echo $index; ?>">TASA</label>
                                            <input type="text" class="form-control" id="tasaEdit_<?php echo $index; ?>" name="tasa[]" value="<?= htmlspecialchars($rowtsp['tasa']); ?>" required>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="idpedimentoc[]" value="<?php echo $pedimento_id; ?>">
                                <input type="hidden" name="idtasap[]" value="<?php echo $rowtsp['idtasap']; ?>">
                            <?php endforeach; ?>
                        </div>

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
        document.getElementById('agregar-tasa-btn').addEventListener('click', function() {
            // Clonar la primera fila de tasa
            var tasaContainer = document.getElementById('tasa-container');
            var newTasaEntry = tasaContainer.querySelector('.tasa-entry').cloneNode(true);

            // Limpiar los campos de la nueva fila
            newTasaEntry.querySelectorAll('input').forEach(function(input) {
                input.value = '';
            });

            // Agregar la nueva fila al contenedor
            tasaContainer.appendChild(newTasaEntry);
        });
    </script>
</body>