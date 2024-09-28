<body>
    <div class="modal fade" id="bloque18" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <img src="../media/locenca.png" width="40px"> CAPTURA DEL BLOQUE 18
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bloque-b-form" action="../admin/bloque18/insertardatosb18.php" method="post">
                        <div class="row" id="observaciones-container">
                            <!-- Se agregarán campos aquí -->
                        </div>
                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="add-observacion">Agregar Observación</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let container = document.getElementById('observaciones-container');
            let addButton = document.getElementById('add-observacion');
            let counter = 0; // Contador para IDs únicos

            addButton.addEventListener('click', function() {
                counter++;
                let inputGroup = document.createElement('div');
                inputGroup.classList.add('form-group', 'mb-3');
                inputGroup.innerHTML = `
                <label for="descripcion-${counter}">Observación ${counter}:</label>
                <input type="text" class="form-control" id="descripcion-${counter}" name="descripcion[]" required>
            `;
                container.appendChild(inputGroup);
            });
        });
    </script>

</body>