<body>
    <div class="modal fade" id="bloque10" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 10</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque10/insertardatosb10.php" method="post">
                        <div class="row">

                            <div class="col-md-4">
                            <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice12Result = $conexion->query("SELECT idapendice12, clave as clave12 FROM apendice12");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">CONTRIB (APENDICE 12)
                                    </label><br>
                                    <select class="form-control" name="idapendice12">
                                        <?php while ($apendice12 = $apendice12Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice12['idapendice12'] ?>"><?= $apendice12['clave12'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                            <div class="form-group">
                                    <?php
                                    include ('../conexion.php');

                                    $apendice18Result = $conexion->query("SELECT idapendice18, clave as clave18 FROM apendice18");

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">CVE. T.TASA (APENDICE 18)
                                    </label><br>
                                    <select class="form-control" name="idapendice18">
                                        <?php while ($apendice18 = $apendice18Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice18['idapendice18'] ?>"><?= $apendice18['clave18'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">TASA</label>
                                    <input type="tex" class="form-control" id="bloque-b-campo1" name="tasa" required>
                                </div>
                            </div>



                            <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 10</button>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </div>
</body>