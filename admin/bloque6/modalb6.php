<body>
    <div class="modal fade" id="bloque6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"> <img src="../media/locenca.png" width="40px">
                        CAPTURA DEL BLOQUE 6</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="bloque-b-form" action="../admin/bloque6/insetardatosb6.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">VAL.SEGUROS</label>
                                    <input type="text" class="form-control" id="bloque-b-campo1" name="Vseguros"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">SEGUROS</label>
                                    <input type="text" class="form-control" id="bloque-b-campo2" name="seguros"
                                        required>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">FLETES</label>
                                    <input type="text" class="form-control" id="bloque-b-campo1" name="fletes" required>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bloque-b-campo1">EMBALAJES</label>
                                    <input type="text" class="form-control" id="bloque-b-campo1" name="embalajes"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="bloque-b-campo2">OTROS INCREMENTABLES</label>
                                    <input type="text" class="form-control" id="bloque-b-campo2" name="otrosincrement"
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

</html>