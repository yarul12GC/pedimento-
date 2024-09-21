<div class="modal fade" id="modaeditlB21-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $idSeccion; ?>" aria-hidden="true">
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
                <form id="bloque-nuevo-form" action="../user/bloque21/editardatosb21.php" method="post">
                    <div class="row">
                        <div class="form-group">
                            <label for="descripcion">IDENTIF</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo htmlspecialchars($rowPart2['descripcion']); ?>" required>
                        </div>

                        <!-- Campos ocultos para enviar los IDs necesarios -->
                        <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($rowPart2['idpedimentoc']); ?>">
                        <input type="hidden" name="section_id" value="<?php echo htmlspecialchars($rowPart2['section_id']); ?>">
                        <input type="hidden" name="idpartida2" value="<?php echo htmlspecialchars($rowPart2['idpartida2']); ?>">
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