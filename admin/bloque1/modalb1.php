
<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 1 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-a-form" action="../admin/bloque1/insertar_datos.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bloque-a-campo1">AÑO DE VALIDACIÓN (2 DÍGITOS ) </label>
                                    <input type="text" class="form-control" id="num-pedimento-1" name="anio_validacion" maxlength="2"
                                        oninput="concatenarPedimento()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-a-campo2">(2 DÍGITOS) CLAVE DE LA ADUANA DE DESPACHO (APENDICE 1)</label>
                                    <input type="text" class="form-control" id="num-pedimento-2" name="clave_aduana" maxlength="2"
                                        oninput="concatenarPedimento()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-a-campo3">CLAVE DE LA PATENTE DEL AGENTE ADUANAL (4 DÍGITOS ) </label>
                                    <input type="text" class="form-control" id="num-pedimento-3" name="PATENTE" maxlength="4"
                                        oninput="concatenarPedimento()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-a-campo4">EL ULTIMO DIGITO DEL AÑO EN CURSO (1 DÍGITO ) </label>
                                    <input type="text" class="form-control" id="num-pedimento-4" name="ultimo_digito_anio" maxlength="1"
                                        oninput="concatenarPedimento()">
                                </div>
                                <div class="form-group">
                                    <label for="bloque-a-campo5">NUMERACIÓN PROGRESIVA (6 DÍGITOS) </label>
                                    <input type="text" class="form-control" id="num-pedimento-5" name="numeracion_progresiva" maxlength="6"
                                        oninput="concatenarPedimento()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="num-pedimento-completo">NUM. PEDIMENTO COMPLETO</label>
                                    <input type="text" class="form-control" id="num-pedimento-completo"
                                        name="Nopedimento" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-a-campo2">T.OPER</label>
                                    <input type="text" class="form-control" id="bloque-a-campo2" name="Toper" required>
                                </div>
                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');
                                    $apendice2Result = $conexion->query("SELECT idapendice2, clave FROM apendice2");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">CVE PEDIMENTO (APENDICE2)</label><br>
                                    <select class="form-control" name="idapendice2">
                                        <?php while ($apendice2 = $apendice2Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice2['idapendice2'] ?>"><?= $apendice2['clave'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php
                                    include ('../conexion.php');
                                    $apendice16Result = $conexion->query("SELECT idapendice16, clave as clave16 FROM apendice16");
                                    if ($conexion->connect_error) {
                                        die("Conexión fallida: " . $conexion->connect_error);
                                    }
                                    ?>
                                    <label for="agenteSelect">REGIMEN (APENDICE16)</label><br>
                                    <select class="form-control" name="idapendice16">
                                        <?php while ($apendice16 = $apendice16Result->fetch_assoc()): ?>
                                            <option value="<?= $apendice16['idapendice16'] ?>"><?= $apendice16['clave16'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 1</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 

    <script>
        function concatenarPedimento() {
            var campo1 = document.getElementById('num-pedimento-1').value;
            var campo2 = document.getElementById('num-pedimento-2').value;
            var campo3 = document.getElementById('num-pedimento-3').value;
            var campo4 = document.getElementById('num-pedimento-4').value;
            var campo5 = document.getElementById('num-pedimento-5').value;

            var pedimentoCompleto = campo1 + campo2 + campo3 + campo4 + campo5;

            if (pedimentoCompleto.length === 15) {
                document.getElementById('num-pedimento-completo').value = pedimentoCompleto;
            } else {
                document.getElementById('num-pedimento-completo').value = '';
            }
        }
    </script>
</body>

