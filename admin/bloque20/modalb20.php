<body>
    <div class="modal fade" id="bloque20" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 20 </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-nuevo-form" action="../admin/bloque20/insertardatosb20.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fraccionA">Fracción A</label>
                                    <input type="text" class="form-control" id="fraccionA" name="fraccionA" required>
                                </div>
                                <div class="form-group">
                                    <label for="nico">NICO</label>
                                    <input type="text" class="form-control" id="nico" name="nico" required>
                                </div>
                                <div class="form-group">
                                    <label for="vinc">VINC</label>
                                    <input type="text" class="form-control" id="vinc" name="vinc" required>
                                </div>
                                <div class="form-group">
                                    <label for="metval">Método de Valoración</label>
                                    <input type="text" class="form-control" id="metval" name="metval" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="umc">UMC</label>
                                    <input type="text" class="form-control" id="umc" name="umc" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantumc">Cantidad UMC</label>
                                    <input type="text" class="form-control" id="cantumc" name="cantumc" required>
                                </div>
                                <div class="form-group">
                                    <label for="umt">UMT</label>
                                    <input type="text" class="form-control" id="umt" name="umt" required>
                                </div>
                                <div class="form-group">
                                    <label for="cant">Cantidad</label>
                                    <input type="text" class="form-control" id="cant" name="cant" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="idapendice4">ID Apendice 4</label>
                                    <input type="text" class="form-control" id="idapendice4" name="idapendice4" required>
                                </div>
                                <div class="form-group">
                                    <label for="pod">POD</label>
                                    <input type="text" class="form-control" id="pod" name="pod" required>
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Guardar Datos</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</body>