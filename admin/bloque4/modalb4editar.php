<div class="modal fade" id="editarBloque4_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    <img src="../media/locenca.png" width="40px">
                    EDITAR BLOQUE 4, 6 y 7
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="justify-content-center align-items-center flex-column">
                    <?php include '../admin/cambio/tipocambio.php'; ?>
                    <div class="alert alert-light text-center" style="color: green; font-weight: bold;">
                        HOY 1$ USD = $<span id="tipo-cambio"><?php echo $tipoCambioMXN; ?></span> MXN
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-precio-pagado"><strong>PRECIO PAGADO $(USD)</strong></label>
                            <input type="number" class="form-control" id="edit-precio-pagado" name="precioPagado" value="" required oninput="calcularValoresEdicion()">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-tipo-cambio-input"><strong>CAMBIO $(MXN)</strong></label>
                            <input type="number" class="form-control" id="edit-tipo-cambio-input" name="tipoCambioMXN" value="<?php echo $datosvp['tipoCambioMXN']; ?>" required oninput="calcularValoresEdicion()">
                            <button type="button" class="btn btn-link" onclick="window.open('https://www.dof.gob.mx/indicadores.php#gsc.tab=0')">Consultar Cambio en el Diario Oficial de la Federación</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <h5>TOTALES</h5>
                        <form id="edit-form1" action="../admin/bloque4/editarDatosb4.php" method="post">
                            <div class="form-group">
                                <label for="edit-valor-dolares">VALOR EN DÓLARES</label>
                                <input type="number" class="form-control" id="edit-valor-dolares" name="valorDolares" value="<?php echo $datosvp['valorDolares']; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="edit-valor-aduana">VALOR ADUANA</label>
                                <input type="number" class="form-control" id="edit-valor-aduana" name="valorAduna" value="<?php echo $datosvp['valorAduna']; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="edit-precio-pagado-mxn">PRECIO PAGADO/VALOR COMERCIAL</label>
                                <input type="number" class="form-control" id="edit-precio-pagado-mxn" name="precioPagado" value="<?php echo $datosvp['precioPagado']; ?>" required readonly>
                            </div>
                            <input type="hidden" name="idvalores" value="<?php echo $datosvp['idvalores']; ?>">

                            <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                            <input type="hidden" id="edit-hidden-tipo-cambio-form1" name="tipoCambioMXN" value="<?php echo $datosvp['tipoCambioMXN']; ?>">

                        </form>
                    </div>

                    <div class="col-md-4">
                        <h5>INCREMENTABLES</h5>
                        <?php
                        $consultar = "SELECT * FROM valorincrementable WHERE idpedimentoc = '$pedimento_id' ORDER BY idincrementable ASC";
                        $querydcre = mysqli_query($conexion, $consultar);
                        while ($datosb6 = mysqli_fetch_array($querydcre)) {
                        ?>
                            <form id="edit-form2" action="../admin/bloque6/editarDatosb6.php" method="post">
                                <input type="hidden" id="edit-hidden-tipo-cambio-form2" name="tipoCambioMXN" value="<?php echo $tipoCambioMXN; ?>">
                                <div class="form-group">
                                    <label for="edit-incrementables-flete">FLETES</label>
                                    <input type="number" class="form-control" id="edit-incrementables-flete" name="fletes" value="<?php echo $datosb6['fletes']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-incrementables-Vseguros">SEGUROS V</label>
                                    <input type="number" class="form-control" id="edit-incrementables-Vseguros" name="Vseguros" value="<?php echo $datosb6['Vseguros']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-incrementables-seguro">SEGUROS</label>
                                    <input type="number" class="form-control" id="edit-incrementables-seguro" name="seguros" value="<?php echo $datosb6['seguros']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-incrementables-embalajes">EMBALAJES</label>
                                    <input type="number" class="form-control" id="edit-incrementables-embalajes" name="embalajes" value="<?php echo $datosb6['embalajes']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-incrementables-otros">OTROS</label>
                                    <input type="number" class="form-control" id="edit-incrementables-otros" name="otrosincrement" value="<?php echo $datosb6['otrosincrement']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                                <input type="hidden" name="idincrementable" value="<?php echo $datosb6['idincrementable']; ?>">

                            </form>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-md-4">
                        <h5>DECREMENTABLES</h5>
                        <?php
                        $consultar = "SELECT * FROM valordecrementable WHERE idpedimentoc = '$pedimento_id' ORDER BY iddecrement ASC";
                        $querydcre = mysqli_query($conexion, $consultar);
                        while ($datosb7 = mysqli_fetch_array($querydcre)) {
                        ?>
                            <form id="edit-form3" action="../admin/bloque7/editarDatosb7.php" method="post">
                                <input type="hidden" id="edit-hidden-tipo-cambio-form3" name="tipoCambioMXN" value="<?php echo $tipoCambioMXN; ?>">
                                <div class="form-group">
                                    <label for="edit-decrementable-VsegurosD">TRANSPORTE DECREMENTABLE</label>
                                    <input type="number" class="form-control" id="edit-decrementable-VsegurosD" name="VsegurosD" value="<?php echo $datosb7['VsegurosD']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-decrementable-segurosD">SEGURO DECREMENTABLE</label>
                                    <input type="number" class="form-control" id="edit-decrementable-segurosD" name="segurosD" value="<?php echo $datosb7['segurosD']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-decrementable-fletesD">CARGA</label>
                                    <input type="number" class="form-control" id="edit-decrementable-fletesD" name="fletesD" value="<?php echo $datosb7['fletesD']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-decrementable-embalajesD">DESCARGA</label>
                                    <input type="number" class="form-control" id="edit-decrementable-embalajesD" name="embalajesD" value="<?php echo $datosb7['embalajesD']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <div class="form-group">
                                    <label for="edit-decrementable-otrosDecrement">OTROS DECREMENTABLES</label>
                                    <input type="number" class="form-control" id="edit-decrementable-otrosDecrement" name="otrosDecrement" value="<?php echo $datosb7['otrosDecrement']; ?>" required oninput="calcularValoresEdicion()">
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                                <input type="hidden" name="iddecrement" value="<?php echo $datosb7['iddecrement']; ?>">

                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="editSubmitAllFormsedit">Actualizar Bloque</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function submitFormedit(formId) {
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

        document.getElementById('editSubmitAllFormsedit').addEventListener('click', async function() {
            const forms = ['edit-form1', 'edit-form2', 'edit-form3'];
            let allFormsSubmitted = true;

            for (const formId of forms) {
                const success = await submitFormedit(formId);
                if (!success) {
                    allFormsSubmitted = false;
                    break;
                }
            }

            if (allFormsSubmitted) {
                location.reload();
            }
        });

        function calcularValoresEdicion() {
            var tipoCambioMXN = parseFloat(document.getElementById('edit-tipo-cambio-input').value) || 0;
            document.getElementById('edit-hidden-tipo-cambio-form1').value = tipoCambioMXN.toFixed(2);
            document.getElementById('edit-hidden-tipo-cambio-form2').value = tipoCambioMXN.toFixed(2);
            document.getElementById('edit-hidden-tipo-cambio-form3').value = tipoCambioMXN.toFixed(2);



            var precioPagado = parseFloat(document.getElementById('edit-precio-pagado').value) || 0;

            var Vseguros = parseFloat(document.getElementById('edit-incrementables-Vseguros').value) || 0;
            var flete = parseFloat(document.getElementById('edit-incrementables-flete').value) || 0;
            var seguro = parseFloat(document.getElementById('edit-incrementables-seguro').value) || 0;
            var embalajes = parseFloat(document.getElementById('edit-incrementables-embalajes').value) || 0;
            var otros = parseFloat(document.getElementById('edit-incrementables-otros').value) || 0;

            var segurosD = parseFloat(document.getElementById('edit-decrementable-VsegurosD').value) || 0;
            var segurosD2 = parseFloat(document.getElementById('edit-decrementable-segurosD').value) || 0;
            var fletesD = parseFloat(document.getElementById('edit-decrementable-fletesD').value) || 0;
            var embalajesD = parseFloat(document.getElementById('edit-decrementable-embalajesD').value) || 0;
            var otrosDecrement = parseFloat(document.getElementById('edit-decrementable-otrosDecrement').value) || 0;

            // Calcula valores incrementables y decrementables
            var valorDolares = (precioPagado + flete + seguro + embalajes + otros) - (segurosD + segurosD2 + fletesD + embalajesD + otrosDecrement);
            var valorAduana = valorDolares * tipoCambioMXN;
            var precioPagadoMXN = precioPagado * tipoCambioMXN;

            // Asignar valores calculados
            document.getElementById('edit-valor-dolares').value = valorDolares.toFixed(2);
            document.getElementById('edit-valor-aduana').value = valorAduana.toFixed(2);
            document.getElementById('edit-precio-pagado-mxn').value = precioPagadoMXN.toFixed(2);
        }
    </script>