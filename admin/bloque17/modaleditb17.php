<div class="modal fade" id="editarBloque17_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 93vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> Editar Bloque 17
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <form id="complementos-form" action="../admin/bloque17/editartardatosb17.php" method="post">
                    <div id="complementos-container">
                        <?php
                        $querycomplementoM = "
            SELECT c.*, a.clave AS claveap8
            FROM complementos c
            INNER JOIN apendice8 a ON c.idapendice8 = a.idapendice8
            WHERE c.idpedimentoc = ?
        ";

                        $stmtcomplemento = $conexion->prepare($querycomplementoM);
                        $stmtcomplemento->bind_param("i", $pedimento_id);
                        $stmtcomplemento->execute();
                        $resultcomplemento = $stmtcomplemento->get_result();

                        if ($resultcomplemento->num_rows > 0) {
                            while ($rowcomp = $resultcomplemento->fetch_assoc()) {
                        ?>
                                <div class="row complemento-item">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="idapendice8">Complemento:</label>
                                            <select class="form-control complemento-select" name="idapendice8[]">
                                                <option value="">Seleccionar...</option>
                                                <?php
                                                // Obtener opciones del apéndice 8
                                                $apendice8Result = $conexion->query("SELECT idapendice8, clave as clave8, descripcion as descripciona8 FROM apendice8 WHERE nivel = 'G'");
                                                while ($apendice8 = $apendice8Result->fetch_assoc()) :
                                                    $selected = ($apendice8['idapendice8'] == $rowcomp['idapendice8']) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $apendice8['idapendice8'] ?>" <?= $selected ?>>
                                                        <?= $apendice8['clave8'] . ' - ' . $apendice8['descripciona8'] ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="complemento">Complemento 1:</label>
                                            <textarea class="form-control complemento1" name="complemento[]" rows="1" oninput="adjustHeight(this)"><?= htmlspecialchars($rowcomp['complemento']) ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="complemento2">Complemento 2:</label>
                                            <textarea class="form-control complemento2" name="complemento2[]" rows="1" oninput="adjustHeight(this)"><?= htmlspecialchars($rowcomp['Complemento2']) ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="complemento3">Complemento 3:</label>
                                            <textarea class="form-control complemento3" name="complemento3[]" rows="1" oninput="adjustHeight(this)"><?= htmlspecialchars($rowcomp['Complemento3']) ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="idpedimentoc[]" value="<?php echo htmlspecialchars($pedimento_id); ?>">
                                <input type="hidden" name="idcomplemento[]" value="<?php echo htmlspecialchars($rowcomp['idcomplemento']); ?>">


                        <?php
                            }
                        } else {
                            echo '<p>No se encontraron complementos.</p>';
                        }
                        ?>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>