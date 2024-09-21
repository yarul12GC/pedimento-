<div class="modal fade" id="modalB21-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $idSeccion; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px">
                    CAPTURA DEL BLOQUE 21
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-nuevo-form" action="../admin/bloque21/insertardatosb21.php" method="post">
                    <div class="row">
                        <div class="form-group">
                            <label for="descripcion">IDENTIF</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>

                        <!-- Agregar el section_id generado dinámicamente -->
                        <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">
                        <input type="hidden" name="section_id" value="<?php echo $idSeccion; ?>">
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