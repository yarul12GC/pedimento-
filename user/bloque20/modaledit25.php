<div class="modal fade" id="modaeditlB25-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> EDITAR INFORMACION
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../user/bloque25/editarB25.php" method="post">
                    <div id="observaciones-container-<?php echo $idSeccion; ?>">
                        <div class="row">
                            <?php foreach ($data['observaciones'] as $rowObservaciones): ?>
                                <div class="form-group">
                                    <label for="descripcionnp">Observación</label>
                                    <input type="text" class="form-control" name="descripcionnp[]" value="<?php echo htmlspecialchars($rowObservaciones['descripcionnp']); ?>">
                                </div>
                                <input type="hidden" name="section_id[]" value="<?php echo htmlspecialchars($rowObservaciones['section_id']); ?>">
                                <input type="hidden" name="idpedimentoc[]" value="<?php echo htmlspecialchars($rowObservaciones['idpedimentoc']); ?>">
                                <input type="hidden" name="idobservacionesnp[]" value="<?php echo htmlspecialchars($rowObservaciones['idobservacionesnp']); ?>">

                            <?php endforeach; ?>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Actualizar Bloque</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>