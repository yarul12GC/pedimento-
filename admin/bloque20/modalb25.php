<div class="modal fade" id="modalB25-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> REGISTRAR BLOQUE 25
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bloque-b25-form-<?php echo $idSeccion; ?>" action="../admin/bloque25/insertardatosb25.php" method="post">
                    <div id="observaciones-container-<?php echo $idSeccion; ?>">
                        <div class="row">
                            <div class="form-group">
                                <label for="descripcionnp">Observación</label>
                                <input type="text" class="form-control" name="descripcionnp[]">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="add-observacion-btn-<?php echo $idSeccion; ?>">Agregar Observación</button>

                    <input type="hidden" name="section_id" value="<?php echo $idSeccion; ?>">
                    <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('add-observacion-btn-<?php echo $idSeccion; ?>').addEventListener('click', function() {
            // Crear un nuevo div con la estructura de un nuevo input de observación
            var newObservacion = document.createElement('div');
            newObservacion.classList.add('row');
            newObservacion.innerHTML = `
                <div class="form-group">
                    <label for="descripcionnp">Observación</label>
                    <input type="text" class="form-control" name="descripcionnp[]">
                </div>
            `;

            // Añadir el nuevo input al contenedor de observaciones
            document.getElementById('observaciones-container-<?php echo $idSeccion; ?>').appendChild(newObservacion);
        });
    });
</script>