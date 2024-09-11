<div class="modal fade" id="modaeditlB24-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> EDITAR INFORMACION
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../admin/bloque24/editardatosb24.php" method="post">
                    <div class="row">
                        <?php foreach ($data['complementos'] as $rowcomplementos): ?>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                    include('../conexion.php');

                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }

                                    $apendice8Result = $conexion->query("SELECT idapendice8, clave as clave8, descripcion as descripciona8, Complemento1, Complemento2, Complemento3, nivel FROM apendice8 WHERE nivel = 'P'");
                                    ?>
                                    <label for="idapendice8">Complemento:</label>
                                    <select class="form-control complemento-select-<?php echo $idSeccion; ?>" name="idapendice8[]">
                                        <option value="">Seleccionar...</option>
                                        <?php while ($apendice8 = $apendice8Result->fetch_assoc()) : ?>
                                            <option
                                                value="<?= $apendice8['idapendice8'] ?>"
                                                data-complemento1="<?= htmlspecialchars($apendice8['Complemento1']) ?>"
                                                data-complemento2="<?= htmlspecialchars($apendice8['Complemento2']) ?>"
                                                data-complemento3="<?= htmlspecialchars($apendice8['Complemento3']) ?>"
                                                <?= $rowcomplementos['idapendice8'] == $apendice8['idapendice8'] ? 'selected' : '' ?>>
                                                <?= $apendice8['clave8'] . ' - ' . $apendice8['descripciona8'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento">Complemento 1:</label>
                                    <textarea class="form-control complemento1-<?php echo $idSeccion; ?>" name="complemento[]" rows="1" oninput="adjustHeight(this)"><?= htmlspecialchars($rowcomplementos['complemento1']) ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento2">Complemento 2:</label>
                                    <textarea class="form-control complemento2-<?php echo $idSeccion; ?>" name="complemento2[]" rows="1" oninput="adjustHeight(this)"><?= htmlspecialchars($rowcomplementos['complemento2']) ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento3">Complemento 3:</label>
                                    <textarea class="form-control complemento3-<?php echo $idSeccion; ?>" name="complemento3[]" rows="1" oninput="adjustHeight(this)"><?= htmlspecialchars($rowcomplementos['complemento3']) ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="idpedimentoc[]" value="<?php echo htmlspecialchars($rowcomplementos['idpedimentoc']); ?>">
                            <input type="hidden" name="section_id[]" value="<?php echo htmlspecialchars($rowcomplementos['section_id']); ?>">
                            <input type="hidden" name="idcomplementop[]" value="<?php echo htmlspecialchars($rowcomplementos['idcomplementop']); ?>">
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