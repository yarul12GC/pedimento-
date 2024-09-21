<div class="modal fade" id="modaeditlB22-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $idSeccion; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px">
                    EDITAR INFORMACION
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-nuevo-form" action="../user/bloque22/editardatosb22.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valaduusd">VAL.ADU./USD</label>
                                <input type="text" class="form-control" id="valaduusd" name="valaduusd" value="<?php echo htmlspecialchars($rowPart3['valaduusd']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="imppreciopag">IMP.PRECIO PAG.</label>
                                <input type="text" class="form-control" id="imppreciopag" name="imppreciopag" value="<?php echo htmlspecialchars($rowPart3['imppreciopag']); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="preciounitario">PRECIO UNIT.</label>
                                <input type="text" class="form-control" id="preciounitario" name="preciounitario" value="<?php echo htmlspecialchars($rowPart3['preciounitario']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="valoragregado">VAL. AGREG.</label>
                                <input type="text" class="form-control" id="valoragregado" name="valoragregado" value="<?php echo htmlspecialchars($rowPart3['valoragregado']); ?>" required>
                            </div>
                        </div>
                    </div>
                    <!-- Campos ocultos -->
                    <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($rowPart3['idpedimentoc']); ?>">
                    <input type="hidden" name="section_id" value="<?php echo htmlspecialchars($rowPart3['section_id']); ?>">
                    <input type="hidden" name="idpartida3" value="<?php echo htmlspecialchars($rowPart3['idpartida3']); ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Actualizar Bloque</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>