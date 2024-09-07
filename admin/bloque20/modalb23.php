<div class="modal fade" id="modalB23-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $idSeccion; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px">
                    CAPTURA DEL BLOQUE 23
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-nuevo-form" action="../admin/bloque23/insaertardatosb23.php" method="post">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <?php
                                include('../conexion.php');
                                $apendice9Result = $conexion->query("SELECT idapendice9, clave AS claveap9, descripcion AS descripcionapn9 FROM apendice9");
                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">PERMISO (APENDICE9)</label><br>
                                <select class="form-control" name="idapendice9">
                                    <?php while ($apendice9 = $apendice9Result->fetch_assoc()): ?>
                                        <option value="<?= $apendice9['idapendice9'] ?>"><?= $apendice9['claveap9']?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">NUMERO DE PERMISO</label>
                                <input type="text" class="form-control" id="numpermiso" name="numpermiso" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="descripcion">FIRMA DE PERMISO</label>
                                <input type="text" class="form-control" id="firmapermiso" name="firmapermiso" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">VAL. COM. DLS</label>
                                <input type="text" class="form-control" id="valcomdls" name="valcomdls" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="descripcion">CANTIDAD UMT</label>
                                <input type="text" class="form-control" id="cantidadumt" name="cantidadumt" required>
                            </div>

                        </div>
                    </div>

                    <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">
                    <input type="hidden" name="section_id" value="<?php echo $idSeccion; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>