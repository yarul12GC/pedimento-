<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="modal fade" id="bloque11" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <img src="../media/locenca.png" width="40px"> CAPTURA DEL BLOQUE 11
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form4" action="../admin/bloque11/insertardatosb11.php" method="post">
                        <div id="contribuciones-container" class="row">
                            <!-- Aquí se agregarán los formularios dinámicamente -->
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary" id="agregarContribucion">
                            <i class="bi bi-plus"></i> Contribución
                        </button>
                        <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">

                    </form>
                    <br>


                    <form id="form5" action="../admin/bloque12/insertardatosb12.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="efectivo">EFECTIVO:</label>
                                    <input type="number" class="form-control" name="efectivo" id="efectivo" required readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="otros">OTROS:</label>
                                    <input type="number" class="form-control" name="otros" id="otros" required readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total">TOTAL:</label>
                                    <input type="number" step="0.01" class="form-control" name="total" id="total" required readonly>
                                </div>
                            </div>
                            <input type="hidden" name="idpedimentoc" value="<?php echo htmlspecialchars($pedimento_id); ?>">

                        </div>
                    </form>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" id="submitAllForms2" class="btn btn-success">Guardar Bloques</button>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('agregarContribucion').addEventListener('click', function() {
            addContribucionForm();
        });

        function addContribucionForm() {
            const container = document.getElementById('contribuciones-container');

            const formHtml = `
                <div class="row contribucion-form">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="agenteSelect">CONCEPTO (APÉNDICE 12)</label>
                            <select class="form-control" name="idapendice12[]" onchange="calculateSum()">
                                <?php
                                include_once('../conexion.php');
                                $apendice12Result = $conexion->query("SELECT idapendice12, descripcion as clave12, descripcion AS descripcionAP FROM apendice12");
                                if ($conexion->connect_error) {
                                    die("Conexión fallida: " . $conexion->connect_error);
                                }
                                ?>
                                <?php while ($apendice12 = $apendice12Result->fetch_assoc()) : ?>
                                    <option value="<?= htmlspecialchars($apendice12['idapendice12']); ?>"><?= htmlspecialchars($apendice12['descripcionAP']); ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="agenteSelect">FORMA DE PAGO (APÉNDICE 13)</label>
                            <select class="form-control" name="idapendice13[]" onchange="calculateSum()">
                                <?php
                                $apendice13Result = $conexion->query("SELECT idapendice13, clave AS clave13, descripcion AS descripcion13 FROM apendice13");
                                ?>
                                <?php while ($apendice13 = $apendice13Result->fetch_assoc()) : ?>
                                    <option value="<?= htmlspecialchars($apendice13['idapendice13']); ?>"><?= htmlspecialchars($apendice13['clave13']) . ' - ' . htmlspecialchars($apendice13['descripcion13']); ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="importe">IMPORTE</label>
                            <input type="text" class="form-control" name="importe[]" onchange="calculateSum()" required>
                        </div>
                    </div>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', formHtml);
        }

        function calculateSum() {
            const forms = document.querySelectorAll('.contribucion-form');
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

            document.getElementById('efectivo').value = efectivoSum.toFixed(2);
            document.getElementById('otros').value = otrosSum.toFixed(2);
            document.getElementById('total').value = totalSum.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function() {
            addContribucionForm();
        });


        //metodo para enviar los dos formularios al mismo tiempo 


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

        document.getElementById('submitAllForms2').addEventListener('click', async function() {
            const forms = ['form4', 'form5'];
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


        document.getElementById('submitAllForms2').addEventListener('click', function() {
            submitForm('form5');
            submitForm('form6');
        });
    </script>


</body>