<div class="modal fade" id="modalB24-<?php echo $idSeccion; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $idSeccion; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel-<?php echo $idSeccion; ?>">
                    <img src="../media/locenca.png" width="40px">
                    CAPTURA DEL BLOQUE 24
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="complementos-form-<?php echo $idSeccion; ?>" action="../user/bloque24/insertardatosb24.php" method="post">
                    <div id="complementos-container-<?php echo $idSeccion; ?>">
                        <div class="row complemento-item-<?php echo $idSeccion; ?>">
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
                                            <option value="<?= $apendice8['idapendice8'] ?>" data-complemento1="<?= htmlspecialchars($apendice8['Complemento1']) ?>" data-complemento2="<?= htmlspecialchars($apendice8['Complemento2']) ?>" data-complemento3="<?= htmlspecialchars($apendice8['Complemento3']) ?>">
                                                <?= $apendice8['clave8'] . ' - ' . $apendice8['descripciona8'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento">Complemento 1:</label>
                                    <textarea class="form-control complemento1-<?php echo $idSeccion; ?>" name="complemento[]" rows="1" oninput="adjustHeight(this)"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento2">Complemento 2:</label>
                                    <textarea class="form-control complemento2-<?php echo $idSeccion; ?>" name="complemento2[]" rows="1" oninput="adjustHeight(this)"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento3">Complemento 3:</label>
                                    <textarea class="form-control complemento3-<?php echo $idSeccion; ?>" name="complemento3[]" rows="1" oninput="adjustHeight(this)"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary" id="add-complemento-<?php echo $idSeccion; ?>">Añadir Complemento</button>
                    <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">
                    <input type="hidden" name="section_id" value="<?php echo $idSeccion; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener for adding new complemento
    document.getElementById('add-complemento-<?php echo $idSeccion; ?>').addEventListener('click', function() {
        var container = document.getElementById('complementos-container-<?php echo $idSeccion; ?>');
        var newComplemento = document.querySelector('.complemento-item-<?php echo $idSeccion; ?>').cloneNode(true);

        // Limpiar los campos de texto y select de la nueva fila clonada
        var selects = newComplemento.querySelectorAll('select');
        selects.forEach(function(select) {
            select.selectedIndex = 0; // Reinicia el select a su opción por defecto
        });

        var textareas = newComplemento.querySelectorAll('textarea');
        textareas.forEach(function(textarea) {
            textarea.value = ''; // Limpia el contenido del textarea
        });

        container.appendChild(newComplemento);
    });

    // Event delegation for handling changes in select elements
    document.getElementById('complementos-container-<?php echo $idSeccion; ?>').addEventListener('change', function(event) {
        if (event.target.classList.contains('complemento-select-<?php echo $idSeccion; ?>')) {
            var select = event.target;
            var selectedOption = select.options[select.selectedIndex];

            var complemento1 = selectedOption.getAttribute('data-complemento1') || '';
            var complemento2 = selectedOption.getAttribute('data-complemento2') || '';
            var complemento3 = selectedOption.getAttribute('data-complemento3') || '';

            // Find the corresponding input fields
            var row = select.closest('.complemento-item-<?php echo $idSeccion; ?>');
            row.querySelector('.complemento1-<?php echo $idSeccion; ?>').value = complemento1;
            row.querySelector('.complemento2-<?php echo $idSeccion; ?>').value = complemento2;
            row.querySelector('.complemento3-<?php echo $idSeccion; ?>').value = complemento3;
        }
    });

    function adjustHeight(element) {
        element.style.height = 'auto';
        element.style.height = (element.scrollHeight) + 'px';
    }
</script>