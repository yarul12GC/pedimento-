
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

                    <form id="bloque-b-form">
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
                                <div class="form-group">
                                    <label for="idpedimentoc">ID Pedimento</label>
                                    <input type="number" class="form-control" id="idpedimentoc" name="idpedimentoc"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Guardar Bloque 5</button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
</body>
