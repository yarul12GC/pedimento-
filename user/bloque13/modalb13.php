<body>
    <div class="modal fade" id="bloque13" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 13</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="../user/bloque13/insertardatosb13.php" method="POST">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="patente">Patente:</label>
                                    <input type="text" class="form-control" name="patente" id="patente" value="<?php echo isset($_SESSION['bloques']['PATENTE']) ? $_SESSION['bloques']['PATENTE'] : ''; ?>" readonly maxlength="4">
                                </div>
                                <div class="form-group">
                                    <label for="pedimento">Pedimento:</label>
                                    <input type="text" class="form-control" name="pedimento" id="pedimento" value="<?php echo isset($_SESSION['bloques']['pedimento_completo']) ? $_SESSION['bloques']['pedimento_completo'] : ''; ?>" readonly maxlength="7">
                                </div>
                                <div class="form-group">
                                    <label for="aduana">Aduana:</label>
                                    <input type="text" class="form-control" name="aduana" id="aduana" value="<?php echo isset($_SESSION['bloques']['idapendice1']) ? $_SESSION['bloques']['idapendice1'] : ''; ?>" readonly>
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banco">Banco:</label>
                                    <select class="form-control" name="banco" id="banco" required>
                                        <option value="" selected disabled>--SELECCIONA UN BANCO--</option>
                                        <option value="BBVA">BBVA</option>
                                        <option value="Santander">Santander</option>
                                        <option value="Banorte">Banorte</option>
                                        <option value="HSBC">HSBC</option>
                                        <option value="Citibanamex">Citibanamex</option>
                                        <option value="Inbursa">Inbursa</option>
                                        <option value="Scotiabank">Scotiabank</option>
                                        <option value="Banco Azteca">Banco Azteca</option>
                                        <option value="BanCoppel">BanCoppel</option>
                                        <option value="BanBajío">BanBajío</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="importePago">Importe Pago:</label>
                                    <input type="text" class="form-control" name="importePago" id="importePago" value="<?php echo isset($_SESSION['bloques']['total']) ? $_SESSION['bloques']['total'] : ''; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="fechapago">Fecha Pago:</label>
                                    <input type="date" class="form-control" name="fechapago" id="fechapago" value="<?php echo isset($_SESSION['bloques']['pago']) ? $_SESSION['bloques']['pago'] : ''; ?>" readonly>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="lineaC" id="lineaC" required>
                            <input type="hidden" class="form-control" name="noperacionbancar" id="noperacionbancar" required>
                            <input type="hidden" class="form-control" name="ntransaccionS" id="ntransaccionS" required>
                            <input type="hidden" class="form-control" name="mPresentacion" id="mPresentacion" value="Pago Electrónico" required readonly>
                            <input type="hidden" class="form-control" name="MedioRecepcion" id="MedioRecepcion" value="Efectivo - Cargo a Cuenta" required readonly>
                            <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</body>