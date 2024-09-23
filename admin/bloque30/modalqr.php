<div class="modal fade" id="qrpago_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                    GENERA EL CODIGO QR</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <form action="../admin/bloque30/qr.php" method="POST">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="patente">Patente:</label>
                                <input type="text" class="form-control" name="patente" id="patente" value="<?php echo htmlspecialchars($datodpm['patente']); ?>" maxlength="4">
                            </div>
                            <div class="form-group">
                                <label for="pedimento">Pedimento:</label>
                                <input type="text" class="form-control" name="pedimento" id="pedimento" value="<?php echo htmlspecialchars($datodpm['ultimo_digito_anio'] . $datodpm['numeracion_progresiva']); ?>" maxlength="7">
                            </div>
                            <div class="form-group">
                                <label for="aduana">Aduana:</label>
                                <input type="text" class="form-control" name="aduana" id="aduana" value="<?php echo htmlspecialchars($datotransac['clavea1'] . $datotransac['seccion']); ?>">
                            </div>

                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banco">Banco:</label>
                                <?php $banco_seleccionado = $rowpe['banco']; // Asume que este es el valor que viene de la base de datos o del formulario 
                                ?>
                                <select class="form-control" name="banco" id="banco" required>
                                    <option value="" disabled>--SELECCIONA UN BANCO--</option>
                                    <option value="BBVA" <?php echo ($banco_seleccionado == 'BBVA') ? 'selected' : ''; ?>>BBVA</option>
                                    <option value="Santander" <?php echo ($banco_seleccionado == 'Santander') ? 'selected' : ''; ?>>Santander</option>
                                    <option value="Banorte" <?php echo ($banco_seleccionado == 'Banorte') ? 'selected' : ''; ?>>Banorte</option>
                                    <option value="HSBC" <?php echo ($banco_seleccionado == 'HSBC') ? 'selected' : ''; ?>>HSBC</option>
                                    <option value="Citibanamex" <?php echo ($banco_seleccionado == 'Citibanamex') ? 'selected' : ''; ?>>Citibanamex</option>
                                    <option value="Inbursa" <?php echo ($banco_seleccionado == 'Inbursa') ? 'selected' : ''; ?>>Inbursa</option>
                                    <option value="Scotiabank" <?php echo ($banco_seleccionado == 'Scotiabank') ? 'selected' : ''; ?>>Scotiabank</option>
                                    <option value="Banco Azteca" <?php echo ($banco_seleccionado == 'Banco Azteca') ? 'selected' : ''; ?>>Banco Azteca</option>
                                    <option value="BanCoppel" <?php echo ($banco_seleccionado == 'BanCoppel') ? 'selected' : ''; ?>>BanCoppel</option>
                                    <option value="BanBajío" <?php echo ($banco_seleccionado == 'BanBajío') ? 'selected' : ''; ?>>BanBajío</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="importePago">Importe Pago:</label>
                                <input type="text" class="form-control" name="importePago" id="importePago" value="<?php echo htmlspecialchars($rowt['total']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="fechapago">Fecha Pago:</label>
                                <input type="date" class="form-control" name="fechapago" id="fechapago" value="<?php echo $rowfech['pago']; ?>">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="lineaC" id="lineaC" value="<?php echo htmlspecialchars($rowpe['lineaC']); ?>" required>
                        <input type="hidden" class="form-control" name="noperacionbancar" id="noperacionbancar" value="<?php echo htmlspecialchars($rowpe['noperacionbancar']); ?>">
                        <input type="hidden" class="form-control" name="ntransaccionS" id="ntransaccionS" value="<?php echo htmlspecialchars($rowpe['ntransaccionS']); ?>">
                        <input type="hidden" class="form-control" name="mPresentacion" id="mPresentacion" value="<?php echo htmlspecialchars($rowpe['mPresentacion']); ?>">
                        <input type="hidden" class="form-control" name="MedioRecepcion" id="MedioRecepcion" value="<?php echo htmlspecialchars($rowpe['MedioRecepcion']); ?>">
                        <input type="hidden" class="form-control" name="idpago" id="idpago" value="<?php echo htmlspecialchars($rowpe['idpago']); ?>">
                        <input type="hidden" class="form-control" name="barcode_image" id="barcode_image" value="<?php echo htmlspecialchars($rowpe['barcode_image']); ?>">


                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">GENERAR QR</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>