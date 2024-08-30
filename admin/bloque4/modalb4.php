<body>
    <div class="modal fade" id="bloque4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 4
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class=" justify-content-center align-items-center flex-column">
                        <?php include '../admin/cambio/tipocambio.php'; ?>
                        <div class="alert alert-light text-center" style="color: green; font-weight: bold;">
                            HOY 1$ USD = $<span id="tipo-cambio"><?php echo $tipoCambioMXN; ?></span> MXN
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio-pagado"><strong>PRECIO PAGADO $(USD)</strong></label>
                                <input type="number" class="form-control" id="precio-pagado" name="precioPagado" required oninput="calcularValores()">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo-cambio-input"><strong>CAMBIO $(MXN)</strong></label>
                                <input type="decimal" class="form-control" id="tipo-cambio-input" name="tipoCambioMXN" required oninput="calcularValores()">
                                <button type="button" class="btn btn-link" onclick="window.open('https://www.dof.gob.mx/indicadores.php#gsc.tab=0')">Consultar
                                    Cambio en el Diario
                                    Oficial de la
                                    Federación</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h5>INCREMENTABLES</h5>
                            <form id="form1" action="../admin/bloque6/insetardatosb6.php" method="post">
                                <input type="hidden" id="hidden-tipo-cambio-form1" name="tipoCambioMXN" value="">
                                <div class="form-group">
                                    <label for="incrementables-flete">FLETES</label>
                                    <input type="number" class="form-control" id="incrementables-flete" name="fletes" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="incrementables-Vseguros">SEGUROS Vseguros</label>
                                    <input type="number" class="form-control" id="incrementables-Vseguros" name="Vseguros" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="incrementables-seguro">SEGUROS</label>
                                    <input type="number" class="form-control" id="incrementables-seguro" name="seguros" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="incrementables-embalajes">EMBALAJES</label>
                                    <input type="number" class="form-control" id="incrementables-embalajes" name="embalajes" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="incrementables-otros">OTROS</label>
                                    <input type="number" class="form-control" id="incrementables-otros" name="otrosincrement" required oninput="calcularValores()">
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                            </form>
                        </div>

                        <div class="col-md-4">
                            <h5>DECREMENTABLES</h5>
                            <form id="form2" action="../admin/bloque7/insertardatosb7.php" method="post">
                                <input type="hidden" id="hidden-tipo-cambio-form2" name="tipoCambioMXN" value="">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">TRANSPORTE DECREMENTABLE</label>
                                    <input type="number" class="form-control" id="decrementable-VsegurosD" name="VsegurosD" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">SEGURO DECREMENTABLE</label>
                                    <input type="number" class="form-control" id="decrementable-segurosD" name="segurosD" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo3">CARGA</label>
                                    <input type="number" class="form-control" id="decrementable-fletesD" name="fletesD" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo4">DESCARGA</label>
                                    <input type="number" class="form-control" id="decrementable-embalajesD" name="embalajesD" required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo5">OTROS DECREMENTABLES</label>
                                    <input type="number" class="form-control" id="decrementable-otrosDecrement" name="otrosDecrement" required oninput="calcularValores()">
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                            </form>
                        </div>

                        <div class="col-md-4">
                            <h5>TOTALES</h5>
                            <form id="form3" action="../admin/bloque4/insertardatosb4.php" method="post">
                                <div class="form-group">
                                    <label for="valor-dolares">VALOR EN DOLARES</label>
                                    <input type="number" class="form-control" id="valor-dolares" name="valorDolares" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="valor-aduana">VALOR ADUANA</label>
                                    <input type="number" class="form-control" id="valor-aduana" name="valorAduna" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="precio-pagado-mxn">PRECIO PAGADO/VALOR COMERCIAL</label>
                                    <input type="number" class="form-control" id="precio-pagado-mxn" name="precioPagado" required readonly>
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="submitAllForms" class="btn btn-success">Guardar Bloques</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calcularValores() {
            var tipoCambioMXN = parseFloat(document.getElementById('tipo-cambio-input').value) || 0;
            document.getElementById('hidden-tipo-cambio-form1').value = tipoCambioMXN.toFixed(2);
            document.getElementById('hidden-tipo-cambio-form2').value = tipoCambioMXN.toFixed(2);

            var precioPagado = parseFloat(document.getElementById('precio-pagado').value) || 0;
            var Vseguros = parseFloat(document.getElementById('incrementables-Vseguros').value) || 0;
            var flete = parseFloat(document.getElementById('incrementables-flete').value) || 0;
            var seguro = parseFloat(document.getElementById('incrementables-seguro').value) || 0;
            var embalajes = parseFloat(document.getElementById('incrementables-embalajes').value) || 0;
            var otros = parseFloat(document.getElementById('incrementables-otros').value) || 0;

            var VsegurosD = parseFloat(document.getElementById('decrementable-VsegurosD').value) || 0;
            var segurosD = parseFloat(document.getElementById('decrementable-segurosD').value) || 0;
            var fletesD = parseFloat(document.getElementById('decrementable-fletesD').value) || 0;
            var embalajesD = parseFloat(document.getElementById('decrementable-embalajesD').value) || 0;
            var otrosDecrement = parseFloat(document.getElementById('decrementable-otrosDecrement').value) || 0;

            var valorDolares = precioPagado + flete + seguro + embalajes + otros + Vseguros - VsegurosD - segurosD - fletesD - embalajesD - otrosDecrement;
            var valorAduana = valorDolares * tipoCambioMXN;
            var precioPagadoMXN = precioPagado * tipoCambioMXN;

            document.getElementById('valor-dolares').value = valorDolares.toFixed(2);
            document.getElementById('valor-aduana').value = valorAduana.toFixed(2);
            document.getElementById('precio-pagado-mxn').value = precioPagadoMXN.toFixed(2);
        }

        async function submitForm(formId) {
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

        document.getElementById('submitAllForms').addEventListener('click', async function() {
            const forms = ['form1', 'form2', 'form3'];
            let allFormsSubmitted = true;

            for (const formId of forms) {
                const success = await submitForm(formId);
                if (!success) {
                    allFormsSubmitted = false;
                    break;
                }
            }

            if (allFormsSubmitted) {
                location.reload(); // Recarga la página en lugar de redirigir
            }
        });
    </script>
</body>