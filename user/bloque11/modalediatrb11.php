<div class="modal fade" id="editarBloque11_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px"> ACTUALIZAR BLOQUE 11
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarBloque11" action="../user/bloque11/actualizarbloque11.php" method="post">
                    <div id="contribuciones-container-update" class="row">
                        <!-- Aquí se mostrarán los datos existentes para editar -->
                        <?php foreach ($cuadroLiquidacion as $row) : ?>
                            <div class="row contribucion-form-update">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idapendice12">CONCEPTO (APÉNDICE 12)</label>
                                        <select class="form-control" name="idapendice12[]" onchange="calculateSumUpdate()">
                                            <?php
                                            $apendice12Result = $conexion->query("SELECT idapendice12, clave as clave12, descripcion AS descrip12ap FROM apendice12");
                                            while ($apendice12 = $apendice12Result->fetch_assoc()) :
                                                $selected = ($apendice12['idapendice12'] == $row['id_apendice12_cl']) ? 'selected' : '';
                                            ?>
                                                <option value="<?= htmlspecialchars($apendice12['idapendice12']); ?>" <?= $selected; ?>>
                                                    <?= htmlspecialchars($apendice12['clave12'] . ' ' . $apendice12['descrip12ap']); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="idapendice13">FORMA DE PAGO (APÉNDICE 13)</label>
                                        <select class="form-control" name="idapendice13[]" onchange="calculateSumUpdate()">
                                            <?php
                                            $apendice13Result = $conexion->query("SELECT idapendice13, clave AS clave13, descripcion AS descripcion13 FROM apendice13");
                                            while ($apendice13 = $apendice13Result->fetch_assoc()) :
                                                $selected = ($apendice13['idapendice13'] == $row['id_apendice13_cl']) ? 'selected' : '';
                                            ?>
                                                <option value="<?= htmlspecialchars($apendice13['idapendice13']); ?>" <?= $selected; ?>>
                                                    <?= htmlspecialchars($apendice13['clave13']) . ' - ' . htmlspecialchars($apendice13['descripcion13']); ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="importe">IMPORTE</label>
                                        <input type="text" class="form-control" name="importe[]" value="<?php echo htmlspecialchars($row['importe']); ?>" onchange="calculateSumUpdate()" required>
                                    </div>
                                </div>
                                <input type="hidden" name="idpedimentoc[]" value="<?php echo $pedimento_id; ?>">
                                <input type="hidden" name="idliquidacion[]" value="<?php echo htmlspecialchars($row['idliquidacion']); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>

                </form>

                <br>
                <form id="form7edit" action="../admin/bloque12/actualizardatosb12.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="efectivoUpdate">EFECTIVO:</label>
                                <input type="number" class="form-control" name="efectivo" id="efectivoUpdate" value="<?php echo htmlspecialchars($rowt['efectivo']); ?>" required readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="otrosUpdate">OTROS:</label>
                                <input type="number" class="form-control" name="otros" id="otrosUpdate" value="<?php echo htmlspecialchars($rowt['otros']); ?>" required readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="totalUpdate">TOTAL:</label>
                                <input type="number" step="0.01" class="form-control" name="total" id="totalUpdate" value="<?php echo htmlspecialchars($rowt['total']); ?>" required readonly>
                            </div>
                        </div>
                        <input type="hidden" name="idtotales" value="<?php echo htmlspecialchars($rowt['idtotales']); ?>">
                        <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">

                    </div>

                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" id="editb12SubmitAllFormsedit" class="btn btn-success">Actualizar Bloque</button>
                </div>
            </div>
        </div>
    </div>
</div>

<SCRipt>
    function calculateSumUpdate() {
        const forms = document.querySelectorAll('.contribucion-form-update');
        let efectivoSum = 0;
        let otrosSum = 0;

        forms.forEach(form => {
            const formaPagoSelect = form.querySelector('select[name="idapendice13[]"]');
            const importeInput = form.querySelector('input[name="importe[]"]');
            const importe = parseFloat(importeInput.value) || 0;

            if (formaPagoSelect.options[formaPagoSelect.selectedIndex].text.startsWith('0')) {
                efectivoSum += importe;
            } else {
                otrosSum += importe;
            }
        });

        const totalSum = efectivoSum + otrosSum;

        document.getElementById('efectivoUpdate').value = efectivoSum.toFixed(2);
        document.getElementById('otrosUpdate').value = otrosSum.toFixed(2);
        document.getElementById('totalUpdate').value = totalSum.toFixed(2);
    }



    async function submitFormeditb12(formId) {
        const form = document.getElementById(formId);
        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });

            if (!response.ok) {
                throw new Error('Error en la solicitud');
            }

            const data = await response.text();
            console.log(`Formulario ${formId} enviado con éxito: `, data);
            return true;
        } catch (error) {
            console.error(`Error al enviar el formulario ${formId}: `, error);
            return false;
        }
    }

    document.getElementById('editb12SubmitAllFormsedit').addEventListener('click', async function() {
        const forms = ['formEditarBloque11', 'form7edit'];
        let allFormsSubmitted = true;

        for (const formId of forms) {
            const success = await submitFormeditb12(formId);
            if (!success) {
                allFormsSubmitted = false;
                break;
            }
        }

        if (allFormsSubmitted) {
            location.reload();
        }
    });
</SCRipt>