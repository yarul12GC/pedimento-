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
                                        <option>---SELECCIONE UNA OPCION---</option>
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
                                    <label for="calle">CALLE</label>
                                    <input type="text" class="form-control" id="calle" name="calle">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="noexterior">NUMERO EXTERIOR</label>
                                    <input type="text" class="form-control" id="noexterior" name="noexterior">
                                </div>
                                <div class="form-group">
                                    <label for="nointerior">MUMERO INTERIOR</label>
                                    <input type="text" class="form-control" id="nointerior" name="nointerior">
                                </div>
                                <div class="form-group">
                                    <label for="codigo_postal">CODIGO POSTAL</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal">
                                </div>
                                <div class="form-group">
                                    <label for="localidad">CIUDAD</label>
                                    <input type="text" class="form-control" id="localidad" name="localidad">
                                </div>

                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="entidadF">ENTIDAD FEDERATIVA</label>
                                    <input type="text" class="form-control" id="entidadF" name="entidadF">
                                </div>
                                <div class="form-group">
                                    <label for="pais">PAIS</label>
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



    <div class="modal fade" id="editarBloque14_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        EDITAR BLOQUE 14</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../admin/bloque14/editardatosb14.php" method="post">
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="tipopoc">PROVEEDOR O COMPRADOR</label>
                                    <select class="form-control" id="tipopoc" name="tipopoc">
                                        <option value="" disabled>---SELECCIONE UNA OPCION---</option>
                                        <option value="PROVEEDOR" <?php echo ($rowpro['tipopoc'] == 'PROVEEDOR') ? 'selected' : ''; ?>>PROVEEDOR</option>
                                        <option value="COMPRADOR" <?php echo ($rowpro['tipopoc'] == 'COMPRADOR') ? 'selected' : ''; ?>>COMPRADOR</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="idfiscal">ID FISCAL</label>
                                    <input type="text" class="form-control" id="idfiscal" name="idfiscal" value="<?php echo htmlspecialchars($rowpro['idfiscal']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombreDORS">NOMBRE,DENOMINACION O RAZON SOCIAL</label>
                                    <input type="text" class="form-control" id="nombreDORS" name="nombreDORS" value="<?php echo htmlspecialchars($rowpro['nombreDORS']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="calle">CALLE</label>
                                    <input type="text" class="form-control" id="calle" name="calle" value="<?php echo htmlspecialchars($rowpro['calle']); ?>">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="noexterior">NUMERO EXTERIOR</label>
                                    <input type="text" class="form-control" id="noexterior" name="noexterior" value="<?php echo htmlspecialchars($rowpro['noexterior']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nointerior">MUMERO INTERIOR</label>
                                    <input type="text" class="form-control" id="nointerior" name="nointerior" value="<?php echo htmlspecialchars($rowpro['nointerior']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="codigo_postal">CODIGO POSTAL</label>
                                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?php echo htmlspecialchars($rowpro['codigo_postal']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="localidad">CIUDAD</label>
                                    <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo htmlspecialchars($rowpro['localidad']); ?>">
                                </div>

                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="entidadF">ENTIDAD FEDERATIVA</label>
                                    <input type="text" class="form-control" id="entidadF" name="entidadF" value="<?php echo htmlspecialchars($rowpro['entidadF']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pais">PAIS</label>
                                    <input type="text" class="form-control" id="pais" name="pais" value="<?php echo htmlspecialchars($rowpro['pais']); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="vinculacion">VINCULACION</label>
                                    <input type="text" class="form-control" id="vinculacion" name="vinculacion" value="<?php echo htmlspecialchars($rowpro['vinculacion']); ?>">
                                </div>
                            </div>

                        </div>


                        <input type="hidden" name="idproveedor" value="<?php echo htmlspecialchars($rowpro['idproveedor']); ?>">

                        <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>