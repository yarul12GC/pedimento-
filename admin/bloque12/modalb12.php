<body>
    <div class="modal fade" id="bloque12" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 10</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="../admin/bloque12/insertardatosb12.php" method="POST">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">EFECTIVO: </label>
                                    <input type="number" class="form-control" name="efectivo" id="efectivo" required>


                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="bloque-b-campo2">OTROS: </label>
                                    <input type="number" class="form-control" name="otros" id="otros" required>


                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="bloque-b-campo3">TOTAL: </label>
                                    <input type="number" step="0.01" class="form-control" name="total" id="total" required>


                                </div>

                            </div>

                            <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Guardar Bloque</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</body>