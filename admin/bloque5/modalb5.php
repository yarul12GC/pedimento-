<body>
    <div class="modal fade" id="bloque5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 5</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque5/insertardatosb5.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipoIE">INPORTADOR / EXPORTADOR</label>
                                    <select class="form-control" id="tipoIE" name="tipoIE" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="Importador">Importador</option>
                                        <option value="Exportador">Exportador</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nombreE">Nombre / Razón Social</label>
                                    <input type="text" class="form-control" id="nombreE" name="nombreE" required>
                                </div>
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" required>
                                </div>
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Calle">Calle</label>
                                    <input type="text" class="form-control" id="Calle" name="Calle" required>
                                </div>
                                <div class="form-group">
                                    <label for="numeroInterior">Número Interior</label>
                                    <input type="text" class="form-control" id="numeroInterior" name="numeroInterior"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="numeroExterior">Número Exterior</label>
                                    <input type="text" class="form-control" id="numeroExterior" name="numeroExterior"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="codigoPostal">Código Postal</label>
                                    <input type="text" class="form-control" id="codigoPostal" name="codigoPostal"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="municipio">Municipio</label>
                                    <input type="text" class="form-control" id="municipio" name="municipio" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="entidadfederativa">Entidad Federativa</label>
                                    <input type="text" class="form-control" id="entidadfederativa"
                                        name="entidadfederativa" required>
                                </div>
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="pais" name="pais" required>
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



    <div class="modal fade" id="editarBloque5_<?php echo $pedimento_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <img src="../media/locenca.png" width="40px"> EDITAR BLOQUE 5
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bloque-b-edit-form" action="../admin/bloque5/editardatosb5.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipoIE">IMPORTADOR / EXPORTADOR</label>
                                    <select class="form-control" id="tipoIE" name="tipoIE" required>
                                        <option value="Importador" <?php if ($datosimport['tipoIE'] == 'Importador') echo 'selected'; ?>>Importador</option>
                                        <option value="Exportador" <?php if ($datosimport['tipoIE'] == 'Exportador') echo 'selected'; ?>>Exportador</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nombreE">Nombre / Razón Social</label>
                                    <input type="text" class="form-control" id="nombreE" name="nombreE" value="<?php echo htmlspecialchars($datosimport['nombreE']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="curp">CURP</label>
                                    <input type="text" class="form-control" id="curp" name="curp" value="<?php echo htmlspecialchars($datosimport['curp']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo htmlspecialchars($datosimport['rfc']); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Calle">Calle</label>
                                    <input type="text" class="form-control" id="Calle" name="Calle" value="<?php echo htmlspecialchars($datosimport['Calle']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="numeroInterior">Número Interior</label>
                                    <input type="text" class="form-control" id="numeroInterior" name="numeroInterior" value="<?php echo htmlspecialchars($datosimport['numeroInterior']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="numeroExterior">Número Exterior</label>
                                    <input type="text" class="form-control" id="numeroExterior" name="numeroExterior" value="<?php echo htmlspecialchars($datosimport['numeroExterior']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="codigoPostal">Código Postal</label>
                                    <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" value="<?php echo htmlspecialchars($datosimport['codigoPostal']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="municipio">Municipio</label>
                                    <input type="text" class="form-control" id="municipio" name="municipio" value="<?php echo htmlspecialchars($datosimport['municipio']); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="entidadfederativa">Entidad Federativa</label>
                                    <input type="text" class="form-control" id="entidadfederativa" name="entidadfederativa" value="<?php echo htmlspecialchars($datosimport['entidadfederativa']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <input type="text" class="form-control" id="pais" name="pais" value="<?php echo htmlspecialchars($datosimport['pais']); ?>" required>
                                </div>
                                <input type="hidden" name="idpedimentoc" value="<?php echo $pedimento_id; ?>">
                                <input type="hidden" name="idExportador" value="<?php echo htmlspecialchars($datosimport['idExportador']); ?>">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Actualizar Bloque</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>