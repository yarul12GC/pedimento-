<div class="modal fade" id="bloque020" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                    CAPTURA DEL BLOQUE 20 </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-nuevo-form" action="../user/bloque20/insertardatosb20.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fraccionA">FRACCION A.</label>
                                <input type="text" class="form-control" id="fraccionA" name="fraccionA" required>
                            </div>
                            <div class="form-group">
                                <label for="nico">NICO</label>
                                <input type="text" class="form-control" id="nico" name="nico" required>
                            </div>
                            <div class="form-group">
                                <label for="vinc">VINC</label>
                                <input type="text" class="form-control" id="vinc" name="vinc" required>
                            </div>
                            <div class="form-group">
                                <?php
                                include('../conexion.php');

                                $apendice11Result = $conexion->query("SELECT idapendice11, clave as clave11 FROM apendice11");

                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">MET VAL</label><br>
                                <select class="form-control" name="idapendice11">
                                    <?php while ($apendice11 = $apendice11Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice11['idapendice11'] ?>"><?= $apendice11['clave11'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                include('../conexion.php');

                                $apendice7Result = $conexion->query("SELECT idapendice7, clave as clave7 FROM apendice7");

                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">UMC</label><br>
                                <select class="form-control" name="umc">
                                    <?php while ($apendice7 = $apendice7Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice7['clave7'] ?>"><?= $apendice7['clave7'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cantumc">CANTIDAD UMC</label>
                                <input type="text" class="form-control" id="cantumc" name="cantumc" required>
                            </div>
                            <div class="form-group">
                                <label for="umt">UMT</label>
                                <input type="text" class="form-control" id="umt" name="umt" required>
                            </div>
                            <div class="form-group">
                                <label for="cant">CANTIDAD</label>
                                <input type="text" class="form-control" id="cant" name="cant" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                include('../conexion.php');
                                $apendice4Result = $conexion->query("SELECT idapendice4, clave2 as clave4 FROM apendice4");
                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">P.V/C</label><br>
                                <select class="form-control" name="idapendice4">
                                    <?php while ($apendice4 = $apendice4Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice4['idapendice4'] ?>"><?= $apendice4['clave4'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <?php
                                include('../conexion.php');
                                $apendice4Result = $conexion->query("SELECT idapendice4, clave2 as clave4 FROM apendice4");
                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">POD</label><br>
                                <select class="form-control" name="pod">
                                    <?php while ($apendice4 = $apendice4Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice4['clave4'] ?>"><?= $apendice4['clave4'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                            <input type="hidden" name="section_id" value="<?php echo $newSectionId; ?>">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>