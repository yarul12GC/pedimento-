<div class="modal fade" id="modalB20-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px"> EDITAR INFORMACION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-nuevo-form" action="../admin/bloque20/editartardatosb20.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fraccionA">FRACCION A.</label>
                                <input type="text" class="form-control" id="fraccionA" name="fraccionA" value="<?php echo htmlspecialchars($sectionData['fraccionA']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nico">NICO</label>
                                <input type="text" class="form-control" id="nico" name="nico" value="<?php echo htmlspecialchars($sectionData['nico']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="vinc">VINC</label>
                                <input type="text" class="form-control" id="vinc" name="vinc" value="<?php echo htmlspecialchars($sectionData['vinc']); ?>" required>
                            </div>
                            <div class="form-group">
                                <?php
                                include('../conexion.php');

                                $apendice11Result = $conexion->query("SELECT idapendice11, clave as clave11 FROM apendice11");

                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">DESTINO O ORIGEN (APENDICE11)</label><br>
                                <select class="form-control" name="idapendice11">
                                    <?php while ($apendice11 = $apendice11Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice11['idapendice11'] ?>"
                                            <?= ($apendice11['idapendice11'] == $sectionData['idapendice11']) ? 'selected' : '' ?>>
                                            <?= $apendice11['clave11'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="umc">UMC</label>
                                <input type="text" class="form-control" id="umc" name="umc" value="<?php echo htmlspecialchars($sectionData['umc']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="cantumc">CANTIDAD UMC</label>
                                <input type="text" class="form-control" id="cantumc" name="cantumc" value="<?php echo htmlspecialchars($sectionData['cantumc']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="umt">UMT</label>
                                <input type="text" class="form-control" id="umt" name="umt" value="<?php echo htmlspecialchars($sectionData['umt']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="cant">CANTIDAD</label>
                                <input type="text" class="form-control" id="cant" name="cant" value="<?php echo htmlspecialchars($sectionData['cant']); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <?php
                                $apendice4Result = $conexion->query("SELECT idapendice4, clave as clave4 FROM apendice4");

                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <label for="agenteSelect">DESTINO O ORIGEN (APENDICE4)</label><br>
                                <select class="form-control" name="idapendice4">
                                    <?php while ($apendice4 = $apendice4Result->fetch_assoc()) : ?>
                                        <option value="<?= $apendice4['idapendice4'] ?>"
                                            <?= ($apendice4['idapendice4'] == $sectionData['idapendice4']) ? 'selected' : '' ?>>
                                            <?= $apendice4['clave4'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pod">POD</label>
                                <input type="text" class="form-control" id="pod" name="pod" value="<?php echo htmlspecialchars($sectionData['pod']); ?>" required>
                            </div>
                            <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($sectionData['idpedimentoc']); ?>">
                            <input type="hidden" name="section_id" value="<?php echo htmlspecialchars($sectionData['section_id']); ?>">
                            <input type="hidden" name="idpartida1" value="<?php echo htmlspecialchars($sectionData['idpartida1']); ?>">

                        </div>
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