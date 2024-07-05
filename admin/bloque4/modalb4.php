
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

                    <form id="bloque-b-form" action="../admin/bloque4/insertardatosb4.php" method="post">
                        <div class=" justify-content-center align-items-center flex-column">
                            <?php include '../admin/cambio/tipocambio.php'; ?>
                            <div class="alert alert-light text-center" style="color: green; font-weight: bold;">
                                1$ USD = $<span id="tipo-cambio"><?php echo $tipoCambioMXN; ?></span> MXN
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group">
                                <label for="precio-pagado"><strong>PRECIO PAGADO (USD)</strong></label>
                                <input type="number" class="form-control" id="precio-pagado" name="precioPagado"
                                    required oninput="calcularValores()">
                            </div>
                            <br>
                            
                            <div class="col-md-6">
                            <br>
                                <h5>INCREMENTABLES</h5>
                                <div class="form-group">
                                    <label for="incrementables-flete">FLETES</label>
                                    <input type="number" class="form-control" id="incrementables-flete" name="" required
                                        oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="incrementables-seguro">SEGUROS</label>
                                    <input type="number" class="form-control" id="incrementables-seguro" name=""
                                        required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="incrementables-embalajes">EMBALAJES</label>
                                    <input type="number" class="form-control" id="incrementables-embalajes" name=""
                                        required oninput="calcularValores()">
                                </div>
                                <div class="form-group">
                                    <label for="incrementables-otros">OTROS</label>
                                    <input type="number" class="form-control" id="incrementables-otros" name="" required
                                        oninput="calcularValores()">
                                </div>
                            </div>

                            <div class="col-md-6">
                            <br>
                                <h5>TOTALES</h5>
                                <div class="form-group">
                                    <label for="valor-dolares">VALOR EN DOLARES</label>
                                    <input type="number" class="form-control" id="valor-dolares" name="valorDolares"
                                        required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="valor-aduana">VALOR ADUANA</label>
                                    <input type="number" class="form-control" id="valor-aduana" name="valorAduna"
                                        required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="precio-pagado-mxn">PRECIO PAGADO/VALOR COMERCIAL</label>
                                    <input type="number" class="form-control" id="precio-pagado-mxn" name="precioPagado"
                                        required readonly>
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                            </div>
                        </div>
                        <br>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 4</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>


    <script>
        function calcularValores() {
            var tipoCambioMXN = parseFloat(document.getElementById('tipo-cambio').innerText);
            var precioPagado = parseFloat(document.getElementById('precio-pagado').value) || 0;
            var flete = parseFloat(document.getElementById('incrementables-flete').value) || 0;
            var seguro = parseFloat(document.getElementById('incrementables-seguro').value) || 0;
            var embalajes = parseFloat(document.getElementById('incrementables-embalajes').value) || 0;
            var otros = parseFloat(document.getElementById('incrementables-otros').value) || 0;

            var valorDolares = precioPagado + flete + seguro + embalajes + otros;
            var valorAduana = valorDolares * tipoCambioMXN;
            var precioPagadoMXN = precioPagado * tipoCambioMXN;

            document.getElementById('valor-dolares').value = valorDolares.toFixed(2);
            document.getElementById('valor-aduana').value = valorAduana.toFixed(2);
            document.getElementById('precio-pagado-mxn').value = precioPagadoMXN.toFixed(2);
        }
    </script>
</body>

