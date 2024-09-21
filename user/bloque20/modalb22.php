<div class="modal fade" id="modalB22-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $idSeccion; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px">
                    CAPTURA DEL BLOQUE 22
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-nuevo-form" action="../user/bloque22/insaertardatosb22.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descripcion">VAL.ADU./USD</label>
                                <input type="text" class="form-control" id="descripcion" name="valaduusd" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">IMP.PRECIO PAG.</label>
                                <input type="text" class="form-control" id="descripcion" name="imppreciopag" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="descripcion">PRECIO UNIT.</label>
                                <input type="text" class="form-control" id="descripcion" name="preciounitario" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">VAL. AGREG.</label>
                                <input type="text" class="form-control" id="descripcion" name="valoragregado" required>
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
