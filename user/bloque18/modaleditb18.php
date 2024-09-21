<div class="modal fade" id="editarBloque18_<?php echo htmlspecialchars($pedimento_id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> CAPTURA DEL BLOQUE 18
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-b-form" action="../user/bloque18/editardatosb18.php" method="post">
                    <div class="row" id="observaciones-container">
                        <?php
                        if (!empty($cuadroObservaciones)) {
                            foreach ($cuadroObservaciones as $row) {
                        ?>
                                <div class="col-12 mb-3">
                                    <input type="text" class="form-control" id="descripcion" name="descripcion[]" value="<?php echo htmlspecialchars($row['descripcion']); ?>" required>
                                    <input type="hidden" name="idobservacion[]" value="<?php echo htmlspecialchars($row['idobservacion']); ?>">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Actualizar Bloque</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>