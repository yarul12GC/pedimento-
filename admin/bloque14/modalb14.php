<body>
    <div class="modal fade" id="bloque14" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 14</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin/bloque14/insertardatosb14.php" method="post">
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="tipopoc">PROVEEDOR O COMPRADOR</label>
                                    <select class="form-control" id="tipopoc" name="tipopoc">
                                        <option value="">---Seleccione una opción---</option>
                                        <option value="PROVEEDOR">PROVEEDOR</option>
                                        <option value="COMPRADOR">COMPRADOR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="idfiscal">ID FISCAL</label>
                                    <input type="text" class="form-control" id="idfiscal" name="idfiscal">
                                </div>
                                <div class="form-group">
                                    <label for="nombreDORS">NOMBRE,DENOMINACION O RAZON SOCIAL</label>
                                    <input type="text" class="form-control" id="nombreDORS" name="nombreDORS">
                                </div>
                                <div class="form-group">
                                    <label for="calle">Calle</label>
                                    <input type="text" class="form-control" id="calle" name="calle">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="noexterior">Número Exterior</label>
                                    <input type="text" class="form-control" id="noexterior" name="noexterior">
                                </div>
                                <div class="form-group">
                                    <label for="nointerior">Número Interior</label>
                                    <input type="text" class="form-control" id="nointerior" name="nointerior">
                                </div>
                                <div class="form-group">
                                    <label for="codigo_postal">Código Postal</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal">
                                </div>
                                <div class="form-group">
                                    <label for="localidad">Ciudad</label>
                                    <input type="text" class="form-control" id="localidad" name="localidad">
                                </div>

                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="entidadF">Entidad Federativa</label>
                                    <input type="text" class="form-control" id="entidadF" name="entidadF">
                                </div>
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="pais" name="pais">
                                </div>

                                <div class="form-group">
                                    <label for="vinculacion">VINCULACION</label>
                                    <input type="text" class="form-control" id="vinculacion" name="vinculacion">
                                </div>
                            </div>

                        </div>



                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 14</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>