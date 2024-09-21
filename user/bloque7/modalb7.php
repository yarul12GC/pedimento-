<body>
    <div class="modal fade" id="bloque7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 7</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../user/bloque7/insertardatosb7.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">TRANSPORTE DECREMENTABLE</label>
                                    <input type="number" class="form-control" id="bloque-b-campo1" name="VsegurosD"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">SEGURO DECREMENTABLE</label>
                                    <input type="number" class="form-control" id="bloque-b-campo2" name="segurosD"
                                        required>
                                </div>

                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">CARGA</label>
                                    <input type="number" class="form-control" id="bloque-b-campo3" name="fletesD"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo1">CAMBIO(MXN)</label>
                                    <input type="number" id="hidden-tipo-cambio" name="tipoCambioMXN" value="">
                                    required>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">DESCARGA</label>
                                    <input type="number" class="form-control" id="bloque-b-campo4" name="embalajesD"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">OTROS DECREMENTABLES</label>
                                    <input type="number" class="form-control" id="bloque-b-campo5" name="otrosDecrement"
                                        required>
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">


                            </div>
                        </div>
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