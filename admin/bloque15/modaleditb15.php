<body>
    <div class="modal fade" id="editarBloque15_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="editarBloque15Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editarBloque15Label"> <img src="../media/locenca.png" width="40px">
                        EDITAR BLOQUE 15</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editar-bloque-b-form" action="../admin/bloque15/actualizardatosb15.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="editNumFactura">NUM.FACTURA</label>
                                    <input type="text" class="form-control" id="editNumFactura" name="numfactura" value="<?php echo htmlspecialchars($rowdm['numfactura']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="editFecha">FECHA</label>
                                    <input type="date" class="form-control" id="editFecha" name="fecha" value="<?php echo htmlspecialchars($rowdm['fecha']); ?>" required>
                                </div>

                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');
                                    $apendice14Result = $conexion->query("SELECT idapendice14, clave AS clavea14, descripcion FROM apendice14");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    $selectedIncoterm = $rowdm['claveapn14']; // Este es el valor de la clave seleccionada
                                    ?>
                                    <label for="editIncoterm">INCOTERM</label><br>
                                    <select class="form-control" name="idapendice14" id="editIncoterm">
                                        <option value=""> --SELECCIONA INCOTERM-- </option>
                                        <?php while ($apendice14 = $apendice14Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice14['idapendice14'] ?>" <?php echo ($apendice14['clavea14'] == $selectedIncoterm) ? 'selected' : ''; ?>>
                                                <?= $apendice14['clavea14'] . ' - ' . $apendice14['descripcion'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                    $apendice5Result = $conexion->query("SELECT idapendice5, clave AS clavea5 , pais FROM apendice5");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    $selectedMoneda = $rowdm['claveapn5']; // Este es el valor de la clave seleccionada
                                    ?>
                                    <label for="editMoneda">MONEDA</label><br>
                                    <select class="form-control" name="idapendice5" id="editMoneda">
                                        <option value=""> --SELECCIONA UNA MONEDA-- </option>
                                        <?php while ($apendice5 = $apendice5Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice5['idapendice5'] ?>" <?php echo ($apendice5['clavea5'] == $selectedMoneda) ? 'selected' : ''; ?>>
                                                <?= $apendice5['clavea5'] . ' - ' . $apendice5['pais'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="editValMonFact">VAL.MON.FACT</label>
                                    <input type="text" class="form-control" id="editValMonFact" name="valmonfact" value="<?php echo htmlspecialchars($rowdm['valmonfact']); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php
                                    $apendice23Result = $conexion->query("SELECT * FROM apendice23");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    $selectedFactorMonFact = $rowdm['factormonfact']; // Suponiendo que este es el campo correcto
                                    ?>
                                    <label for="editFactorMonFact">FACTOR MON. FACT</label><br>
                                    <select class="form-control" name="factormonfact" id="editFactorMonFact">
                                        <option value=""> --SELECCIONA LA EQUIVALENCIA-- </option>
                                        <?php while ($apendice23 = $apendice23Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice23['equivalencias'] ?>" <?php echo ($apendice23['equivalencias'] == $selectedFactorMonFact) ? 'selected' : ''; ?>>
                                                <?= $apendice23['pais'] . ' - ' . $apendice23['equivalencias'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="editValDolares">VAL. DOLARES</label>
                                    <input type="text" class="form-control" id="editValDolares" name="valdolares" value="<?php echo htmlspecialchars($rowdm['valdolares']); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="iddmonetarios" name="iddmonetarios" value="<?php echo htmlspecialchars($rowdm['iddmonetarios']); ?>" readonly>

                        <input type="hidden" name="idpedimentoc" id="editIdPedimentoc" value="<?php echo $pedimento_id; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var valMonFactInput = document.getElementById('editValMonFact');
            var factorMonFactSelect = document.getElementById('editFactorMonFact');
            var valDolaresInput = document.getElementById('editValDolares');

            function calculateDollars() {
                var valMonFact = parseFloat(valMonFactInput.value);
                var factorMonFact = parseFloat(factorMonFactSelect.value);
                if (!isNaN(valMonFact) && !isNaN(factorMonFact) && factorMonFact !== 0) {
                    var valDolares = valMonFact / factorMonFact;
                    valDolaresInput.value = valDolares.toFixed(2);
                } else {
                    valDolaresInput.value = '';
                }
            }

            valMonFactInput.addEventListener('input', calculateDollars);
            factorMonFactSelect.addEventListener('change', calculateDollars);

            // Código para llenar el formulario con datos de edición, si es necesario
            // Aquí puedes agregar código para cargar datos específicos en el modal al hacer clic en el botón de editar
        });
    </script>
</body>