<body>
    <div class="modal fade" id="bloque2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <img src="../media/locenca.png" width="40px"> CAPTURA DEL BLOQUE 2
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bloque-b-form" action="../user/bloque2/insertardatosb2.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');

                                    $apendice15Result = $conexion->query("SELECT idapendice15, clave as clave15 FROM apendice15");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">DESTINO O ORIGEN (APENDICE15)</label><br>
                                    <select class="form-control" name="idapendice15">
                                        <?php while ($apendice15 = $apendice15Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice15['idapendice15'] ?>"><?= $apendice15['clave15'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">TIPO DE CAMBIO</label>
                                    <input type="text" class="form-control" id="bloque-b-campo2" name="tipoCambio" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloque-b-campo3">PESO BRUTO</label>
                                    <input type="text" class="form-control" id="bloque-b-campo3" name="peso_bruto" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                    include_once('../conexion.php');

                                    $apendice1Result = $conexion->query("SELECT idapendice1, clave as clave1, seccion, descripcion FROM apendice1");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">ADUANA (APENDICE1)</label><br>
                                    <select class="form-control" name="idapendice1" id="idapendice1">
                                        <option>---SELECCIONE ADUANA---</option>
                                        <?php while ($apendice1 = $apendice1Result->fetch_assoc()) : ?>
                                            <option value="<?= $apendice1['idapendice1'] ?>" data-clave="<?= $apendice1['clave1'] ?>" data-seccion="<?= $apendice1['seccion'] ?>">
                                                <?= $apendice1['clave1'] . ' ' . $apendice1['descripcion'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="concatenatedData" id="concatenatedData">

                            </div>
                            <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('idapendice1').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var clave = selectedOption.getAttribute('data-clave');
        var seccion = selectedOption.getAttribute('data-seccion');
        var concatenatedData = clave + seccion;

        // Guardar los datos concatenados en el campo oculto del formulario
        document.getElementById('concatenatedData').value = concatenatedData;
    });
</script>